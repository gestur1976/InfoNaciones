<?php

namespace App\Repository;

use App\Entity\CapitalCity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CapitalCity>
 *
 * @method CapitalCity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CapitalCity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CapitalCity[]    findAll()
 * @method CapitalCity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CapitalCityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CapitalCity::class);
    }

//    /**
//     * @return CapitalCity[] Returns an array of CapitalCity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CapitalCity
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
