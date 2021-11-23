<?php

namespace App\Repository;

use App\Entity\Enigme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Enigme|null find($id, $lockMode = null, $lockVersion = null)
 * @method Enigme|null findOneBy(array $criteria, array $orderBy = null)
 * @method Enigme[]    findAll()
 * @method Enigme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnigmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Enigme::class);
    }

    // /**
    //  * @return Enigme[] Returns an array of Enigme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Enigme
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
