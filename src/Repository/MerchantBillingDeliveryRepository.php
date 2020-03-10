<?php

namespace App\Repository;

use App\Entity\MerchantBillingDelivery;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MerchantBillingDelivery|null find($id, $lockMode = null, $lockVersion = null)
 * @method MerchantBillingDelivery|null findOneBy(array $criteria, array $orderBy = null)
 * @method MerchantBillingDelivery[]    findAll()
 * @method MerchantBillingDelivery[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MerchantBillingDeliveryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MerchantBillingDelivery::class);
    }

    // /**
    //  * @return MerchantBillingDelivery[] Returns an array of MerchantBillingDelivery objects
    //  */

    public function getInvoiceAndTakeOrderByByEmailCode($mailcode)
    {
        return $this->createQueryBuilder('m')
            ->select('m.takeorderby, m.warehouseId, m.paymentInvoice, m.transporterId, m.codPrice, m.expenseDiscount, m.sendmaildate, m.transactiondate')
            ->andWhere('m.mailcode = :val')
            ->setParameter('val', $mailcode)
            ->getQuery()
            ->getResult();
    }
}
