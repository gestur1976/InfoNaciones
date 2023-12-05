<?php

namespace App\Repository;

use App\Entity\CountryBorder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CountryBorder>
 *
 * @method CountryBorder|null find($id, $lockMode = null, $lockVersion = null)
 * @method CountryBorder|null findOneBy(array $criteria, array $orderBy = null)
 * @method CountryBorder[]    findAll()
 * @method CountryBorder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryBorderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CountryBorder::class);
    }

//    /**
//     * @return CountryBorder[] Returns an array of CountryBorder objects
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

//    public function findOneBySomeField($value): ?CountryBorder
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
