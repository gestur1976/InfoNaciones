<?php

namespace App\Repository;

use App\Entity\CapitalCities;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CapitalCities>
 *
 * @method CapitalCities|null find($id, $lockMode = null, $lockVersion = null)
 * @method CapitalCities|null findOneBy(array $criteria, array $orderBy = null)
 * @method CapitalCities[]    findAll()
 * @method CapitalCities[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CapitalCitiesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CapitalCities::class);
    }

//    /**
//     * @return CapitalCities[] Returns an array of CapitalCities objects
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

//    public function findOneBySomeField($value): ?CapitalCities
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
