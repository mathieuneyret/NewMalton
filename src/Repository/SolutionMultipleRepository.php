<?php

namespace App\Repository;

use App\Entity\SolutionMultiple;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SolutionMultiple|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolutionMultiple|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolutionMultiple[]    findAll()
 * @method SolutionMultiple[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolutionMultipleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SolutionMultiple::class);
    }

    // /**
    //  * @return SolutionMultiple[] Returns an array of SolutionMultiple objects
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
    public function findOneBySomeField($value): ?SolutionMultiple
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
