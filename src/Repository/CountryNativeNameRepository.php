<?php

namespace App\Repository;

use App\Entity\CountryNativeNames;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CountryNativeNames>
 *
 * @method CountryNativeNames|null find($id, $lockMode = null, $lockVersion = null)
 * @method CountryNativeNames|null findOneBy(array $criteria, array $orderBy = null)
 * @method CountryNativeNames[]    findAll()
 * @method CountryNativeNames[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryNativeNamesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CountryNativeNames::class);
    }

//    /**
//     * @return CountryNativeNames[] Returns an array of CountryNativeNames objects
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

//    public function findOneBySomeField($value): ?CountryNativeNames
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
