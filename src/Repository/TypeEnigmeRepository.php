<?php

namespace App\Repository;

use App\Entity\TypeEnigme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeEnigme|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeEnigme|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeEnigme[]    findAll()
 * @method TypeEnigme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeEnigmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeEnigme::class);
    }

    // /**
    //  * @return TypeEnigme[] Returns an array of TypeEnigme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeEnigme
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
