<?php

namespace App\Repository;

use App\Entity\MerchantBilling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MerchantBilling|null find($id, $lockMode = null, $lockVersion = null)
 * @method MerchantBilling|null findOneBy(array $criteria, array $orderBy = null)
 * @method MerchantBilling[]    findAll()
 * @method MerchantBilling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MerchantBillingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MerchantBilling::class);
    }

    public function getOrderNameAndOrderPhoneNoByInvoiceAndTakeOrderBy($takeOrderBy, $paymentInvoice)
    {
        return $this->createQueryBuilder('mb')
            ->select('mb.ordername')
            ->where('mb.takeorderby = :takeorderby')
            ->andWhere('mb.paymentInvoice = :paymentInvoice')
            ->setParameter('takeorderby', $takeOrderBy)
            ->setParameter('paymentInvoice', $paymentInvoice)
            ->getQuery()
            ->getResult();
    }
}
