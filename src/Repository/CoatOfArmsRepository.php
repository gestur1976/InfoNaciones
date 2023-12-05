<?php

namespace App\Repository;

use App\Entity\CoatOfArms;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CoatOfArms>
 *
 * @method CoatOfArms|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoatOfArms|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoatOfArms[]    findAll()
 * @method CoatOfArms[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoatOfArmsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoatOfArms::class);
    }

//    /**
//     * @return CoatOfArms[] Returns an array of CoatOfArms objects
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

//    public function findOneBySomeField($value): ?CoatOfArms
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
