<?php

namespace App\Repository;

use App\Entity\GlobalWarehouse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method GlobalWarehouse|null find($id, $lockMode = null, $lockVersion = null)
 * @method GlobalWarehouse|null findOneBy(array $criteria, array $orderBy = null)
 * @method GlobalWarehouse[]    findAll()
 * @method GlobalWarehouse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GlobelWarehouseRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, GlobalWarehouse::class);
    }

    // /**
    //  * @return MerchantBillingDelivery[] Returns an array of MerchantBillingDelivery objects
    //  */

    public function getWarehouseNameByByWarehouseId($warehouseId)
    {
        return $this->createQueryBuilder('w')
            ->select('w.warehouseName')
            ->andWhere('w.id = :val')
            ->setParameter('val', $warehouseId)
            ->getQuery()
            ->getResult();
    }
}
