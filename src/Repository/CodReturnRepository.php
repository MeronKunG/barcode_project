<?php

namespace App\Repository;

use App\Entity\CodReturn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CodReturn|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodReturn|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodReturn[]    findAll()
 * @method CodReturn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodReturnRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CodReturn::class);
    }

    public function getCodReturnDataByMailCode($mailCode)
    {
        return $this->createQueryBuilder('c')
            ->select('c.mailcode, CAST(c.scanDate AS DATE) AS datetime, CAST(c.tstamp AS DATE) AS returned_date')
            ->where('c.mailcode = :mailcode')
            ->setParameter('mailcode', $mailCode)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllDataByCurrentDate($typeId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.relationId, c.mailcode, mb.ordername')
            ->join('App\Entity\MerchantBillingDelivery', 'mbd', 'WITH', 'c.mailcode = mbd.mailcode')
            ->join('App\Entity\MerchantBilling', 'mb', 'WITH', 'mbd.takeorderby = mb.takeorderby AND mbd.paymentInvoice = mb.paymentInvoice')
            ->where('c.typeId = :typeId')
            ->andWhere('c.scanDate = CURRENT_DATE()')
            ->setParameter('typeId', $typeId)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllDataALPHAByCurrentDate($typeId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.relationId')
            ->where('c.typeId = :typeId')
            ->andWhere('c.transporterId = \'1\' OR (c.transporterId = \'0\' AND c.mailcode LIKE \'SUN%\')')
            ->andWhere('c.scanDate = CURRENT_DATE()')
            ->setParameter('typeId', $typeId)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllDataDHLByCurrentDate($typeId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.relationId')
            ->where('c.typeId = :typeId')
            ->andWhere('c.transporterId = \'7\' OR (c.transporterId = \'0\' AND c.mailcode LIKE \'TDZ%\')')
            ->andWhere('c.scanDate = CURRENT_DATE()')
            ->setParameter('typeId', $typeId)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllDataFLASHByCurrentDate($typeId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.relationId')
            ->where('c.typeId = :typeId')
            ->andWhere('c.transporterId = \'9\'')
            ->andWhere('c.scanDate = CURRENT_DATE()')
            ->setParameter('typeId', $typeId)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllDataKERRYByCurrentDate($typeId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.relationId')
            ->where('c.typeId = :typeId')
            ->andWhere('(c.transporterId = \'0\' AND c.mailcode LIKE \'TLC%\')')
            ->andWhere('c.scanDate = CURRENT_DATE()')
            ->setParameter('typeId', $typeId)
            ->getQuery()
            ->getResult()
            ;
    }

    public function getAllDataMY945ByCurrentDate($typeId)
    {
        return $this->createQueryBuilder('c')
            ->select('c.relationId')
            ->where('c.typeId = :typeId')
            ->andWhere('(c.transporterId = \'0\' AND c.mailcode LIKE \'HOL%\')')
            ->andWhere('c.scanDate = CURRENT_DATE()')
            ->setParameter('typeId', $typeId)
            ->getQuery()
            ->getResult()
            ;
    }
}
