<?php

namespace App\Controller;

use App\Entity\CodReturn;
use App\Entity\MerchantConfig;
use App\Form\Report2Type;
use App\Form\ReportType;
use App\Form\ReturnItemType;
use App\Repository\CodReturnRepository;
use App\Repository\GlobelWarehouseRepository;
use App\Repository\MerchantBillingDeliveryRepository;
use App\Repository\MerchantBillingRepository;
use App\Repository\MerchantConfigRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ReturnItemController extends AbstractController
{
    protected $merchantConfigRepository;
    protected $globelWarehouseRepository;

    public function __construct(
        MerchantConfigRepository $merchantConfigRepository,
        GlobelWarehouseRepository $globelWarehouseRepository
    )
    {
        date_default_timezone_set("Asia/Bangkok");

        $this->merchantConfigRepository = $merchantConfigRepository;
        $this->globelWarehouseRepository = $globelWarehouseRepository;
    }

    /**
     * @Route("/scanbarcode", name="return_item")
     */
    public function mailInput(
        Request $request,
        EntityManagerInterface $entityManager,
        MerchantBillingDeliveryRepository $merchantBillingDeliveryRepository,
        MerchantConfigRepository $merchantConfigRepository,
        GlobelWarehouseRepository $globelWarehouseRepository,
        CodReturnRepository $codReturnRepository,
        MerchantBillingRepository $merchantBillingRepository
    )
    {
        $form = $this->createForm(ReturnItemType::class);
        $form->handleRequest($request);
        $testData = [];
        for ($i = 0; $i < 1; $i++) {
                $testData[] = [];
        }
        foreach ($testData as $key => $test) {
            for ($i = 0; $i < 4; $i++) {
                $testData[$key]['car'.$i] = [];
            }
        }
        foreach ($testData as $key => $test) {
            foreach ($test as $k => $v) {
                for ($i = 0; $i < 4; $i++) {
                    $testData[$key][$k][] = $i.'za';
                }
            }
        }
        dd($testData);
        if ($request->isMethod('POST')) {
            $requestData = $request->request->get('return_item');
            $merchantBillingDeliveryObj = $merchantBillingDeliveryRepository->getInvoiceAndTakeOrderByByEmailCode($requestData['mailCode']);
            if ($merchantBillingDeliveryObj != null) {
                $merchantBillingObj = $merchantBillingRepository->getOrderNameAndOrderPhoneNoByInvoiceAndTakeOrderBy($merchantBillingDeliveryObj[0]['takeorderby'],
                    $merchantBillingDeliveryObj[0]['paymentInvoice']);
                $merchantConfigObj = $merchantConfigRepository->getMerchantNameAndMerTypeByByTakeOrderBy($merchantBillingDeliveryObj[0]['takeorderby']);
                $checkMailCode = $codReturnRepository->count(array('mailcode' => $requestData['mailCode']));
                if ($merchantConfigObj[0]['merType'] == 'parcel') {
                    if ($checkMailCode == 0) {
                        $codReturn = new CodReturn();
                        $codReturn->setMailcode($requestData['mailCode']);
                        $codReturn->setRelationId($merchantBillingDeliveryObj[0]['takeorderby']);
                        $codReturn->setTypeId(1);
                        $codReturn->setTransporterId($merchantBillingDeliveryObj[0]['transporterId']);
                        $codReturn->setUserId($this->getUser()->getId());
                        $codReturn->setScanDate(new \DateTime("now", new \DateTimeZone('Asia/Bangkok')));
                        $codReturn->setTstamp(new \DateTime("now", new \DateTimeZone('Asia/Bangkok')));
                        $entityManager->persist($codReturn);
                        $entityManager->flush();
                        $this->addFlash('success', $requestData['mailCode']);
                        $this->addFlash('success', $merchantConfigObj[0]['merchantname']);
                        $this->addFlash('success', $merchantBillingObj[0]['ordername']);
                    } else {
                        $dateTimeCodReturn = $codReturnRepository->getCodReturnDataByMailCode($requestData['mailCode']);
                        $this->addFlash('error', $requestData['mailCode']);
                        $this->addFlash('error', $merchantConfigObj[0]['merchantname']);
                        $this->addFlash('error', $merchantBillingObj[0]['ordername']);
                        $this->addFlash('error', $dateTimeCodReturn[0]['datetime']);
                    }
                } elseif ($merchantConfigObj[0]['merType'] == 'holding' || $merchantConfigObj[0]['merType'] == 'hybrid') {
                    $warehouseObj = $globelWarehouseRepository->getWarehouseNameByByWarehouseId($merchantBillingDeliveryObj[0]['warehouseId']);
                    if ($checkMailCode == 0) {
                        $codReturn = new CodReturn();
                        $codReturn->setMailcode($requestData['mailCode']);
                        $codReturn->setRelationId($merchantBillingDeliveryObj[0]['warehouseId']);
                        $codReturn->setTypeId(2);
                        $codReturn->setTransporterId($merchantBillingDeliveryObj[0]['transporterId']);
                        $codReturn->setUserId($this->getUser()->getId());
                        $codReturn->setScanDate(new \DateTime("now", new \DateTimeZone('Asia/Bangkok')));
                        $codReturn->setTstamp(new \DateTime("now", new \DateTimeZone('Asia/Bangkok')));
                        $entityManager->persist($codReturn);
                        $entityManager->flush();
                        $this->addFlash('success', $requestData['mailCode']);
                        $this->addFlash('success', $warehouseObj[0]['warehouseName']);
                        $this->addFlash('success', $merchantBillingObj[0]['ordername']);
                    } else {
                        $dateTimeCodReturn = $codReturnRepository->getCodReturnDataByMailCode($requestData['mailCode']);
                        $this->addFlash('error', $requestData['mailCode']);
                        $this->addFlash('error', $warehouseObj[0]['warehouseName']);
                        $this->addFlash('error', $merchantBillingObj[0]['ordername']);
                        $this->addFlash('error', $dateTimeCodReturn[0]['datetime']);
                    }
                }
                return $this->redirect($this->generateUrl('return_item'));
            } else {
                $this->addFlash('noData', 'ไม่พบข้อมูล');
                return $this->redirect($this->generateUrl('return_item'));
            }
        }
        return $this->render('return_item/index.html.twig', [
            'street' => $testData,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/report1", name="report1")
     */
    public function Report(
        Request $request
    )
    {
        $form = $this->createForm(ReportType::class);
        $form->handleRequest($request);

        return $this->render('return_item/report.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/report2", name="report2")
     */
    public function Report2(
        Request $request
    )
    {
        $form = $this->createForm(Report2Type::class);
        $form->handleRequest($request);

        return $this->render('return_item/report2.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/print", name="print")
     */
    public function printData(
        Request $request,
        CodReturnRepository $codReturnRepository
    )
    {
        $datetime = (new \DateTime("now", new \DateTimeZone('Asia/Bangkok')))->format('d/m/Y');
        $result = array();
        $reportData = $request->query->get('report');

        if ($reportData['merType'] == 1) {
            $codReturnObj = array();
            if ($reportData['transporterName'] == 'ALPHA') {
                $codReturnObj = $codReturnRepository->getAllDataALPHAByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'DHL') {
                $codReturnObj = $codReturnRepository->getAllDataDHLByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'FLASH') {
                $codReturnObj = $codReturnRepository->getAllDataFLASHByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'KERRY') {
                $codReturnObj = $codReturnRepository->getAllDataKERRYByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'MY945') {
                $codReturnObj = $codReturnRepository->getAllDataMY945ByCurrentDate($reportData['merType']);
            }
            foreach ($codReturnObj as $key => $val) {
                foreach ($val as $k => $v) {
                    if ($k === 'relationId') {
                        $codReturnObj[$key]['relationId'] = $this->changeToMerchantName($v);
                    }
                }
            }
            foreach ($codReturnObj as $element) {
                $result[$element['relationId']][] = $element;
            }
        } else {
            $codReturnObj = array();
            if ($reportData['transporterName'] == 'ALPHA') {
                $codReturnObj = $codReturnRepository->getAllDataALPHAByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'DHL') {
                $codReturnObj = $codReturnRepository->getAllDataDHLByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'FLASH') {
                $codReturnObj = $codReturnRepository->getAllDataFLASHByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'KERRY') {
                $codReturnObj = $codReturnRepository->getAllDataKERRYByCurrentDate($reportData['merType']);
            } elseif ($reportData['transporterName'] == 'MY945') {
                $codReturnObj = $codReturnRepository->getAllDataMY945ByCurrentDate($reportData['merType']);
            }
            foreach ($codReturnObj as $key => $val) {
                foreach ($val as $k => $v) {
                    if ($k === 'relationId') {
                        $codReturnObj[$key]['relationId'] = $this->changeToWarehouseName($v);
                    }
                }
            }
            foreach ($codReturnObj as $element) {
                $result[$element['relationId']][] = $element;
            }
        }

        return $this->render('return_item/print.html.twig', [
            'codReturn' => $result,
            'dateTime' => $datetime,
            'merType' => $reportData['merType'],
            'transporterName' => $reportData['transporterName']
        ]);
    }

    /**
     * @Route("/print2", name="print2")
     */
    public function print2Data(
        Request $request,
        CodReturnRepository $codReturnRepository
    )
    {
        $datetime = (new \DateTime("now", new \DateTimeZone('Asia/Bangkok')))->format('d/m/Y');
        $result = array();
        $reportData = $request->query->get('report2');
        $codReturnObj = $codReturnRepository->getAllDataByCurrentDate($reportData['merType']);
        foreach ($codReturnObj as $key => $val) {
            foreach ($val as $k => $v) {
                if ($k === 'relationId') {
                    $codReturnObj[$key]['relationId'] = $this->changeToMerchantName($v);
                }
            }
        }
        foreach ($codReturnObj as $element) {
            $result[$element['relationId']][] = $element;
        }

        return $this->render('return_item/print2.html.twig', [
            'codReturn' => $result,
            'dateTime' => $datetime,
            'merType' => $reportData['merType']
        ]);
    }

    public function changeToWarehouseName($warehouseId)
    {
        $warehouseId = trim($warehouseId);
        $warehouseObj = $this->globelWarehouseRepository->getWarehouseNameByByWarehouseId($warehouseId);
        $warehouseId = $warehouseObj[0]['warehouseName'];
        return $warehouseId;
    }

    public function changeToMerchantName($takeOrderBy)
    {
        $takeOrderBy = trim($takeOrderBy);
        $merchantConfigObj = $this->merchantConfigRepository->getMerchantNameAndMerTypeByByTakeOrderBy($takeOrderBy);
        $takeOrderBy = $merchantConfigObj[0]['merchantname'];
        return $takeOrderBy;
    }
}
