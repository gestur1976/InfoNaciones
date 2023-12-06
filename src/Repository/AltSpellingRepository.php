<?php

namespace App\Repository;

use App\Entity\AltSpelling;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AltSpelling>
 *
 * @method AltSpelling|null find($id, $lockMode = null, $lockVersion = null)
 * @method AltSpelling|null findOneBy(array $criteria, array $orderBy = null)
 * @method AltSpelling[]    findAll()
 * @method AltSpelling[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AltSpellingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AltSpelling::class);
    }

//    /**
//     * @return AltSpelling[] Returns an array of AltSpelling objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AltSpelling
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
