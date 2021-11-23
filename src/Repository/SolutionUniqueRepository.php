<?php

namespace App\Repository;

use App\Entity\SolutionUnique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SolutionUnique|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolutionUnique|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolutionUnique[]    findAll()
 * @method SolutionUnique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolutionUniqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SolutionUnique::class);
    }

    // /**
    //  * @return SolutionUnique[] Returns an array of SolutionUnique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SolutionUnique
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
