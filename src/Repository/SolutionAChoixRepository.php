<?php

namespace App\Repository;

use App\Entity\SolutionAChoix;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SolutionAChoix|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolutionAChoix|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolutionAChoix[]    findAll()
 * @method SolutionAChoix[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolutionAChoixRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SolutionAChoix::class);
    }

    // /**
    //  * @return SolutionAChoix[] Returns an array of SolutionAChoix objects
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
    public function findOneBySomeField($value): ?SolutionAChoix
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
