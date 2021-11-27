<?php

namespace App\Repository;

use App\Entity\Note;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Note|null find($id, $lockMode = null, $lockVersion = null)
 * @method Note|null findOneBy(array $criteria, array $orderBy = null)
 * @method Note[]    findAll()
 * @method Note[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Note::class);
    }

    public function getEnigmesMieuxNotees()
    {
        return $this->createQueryBuilder('n')
            ->select('IDENTITY(n.enigme)')
            ->addGroupBy('n.enigme')
            ->orderBy('AVG(n.note)', 'DESC')
            ->setMax(10)
            ->getQuery()
            ->getResult()
        ;

        /*
         * ->select('IDENTITY(s.user) as user', 's.username', 'SUM(s.points) as points')
        ->leftJoin('s.user','user')
        ->groupBy('s.user')
        ->andWhere('s.tournament = :tournament')
        ->setParameter('tournament', $tournament)
        ->orderBy('points', 'DESC');
         */
    }

    // /**
    //  * @return Note[] Returns an array of Note objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Note
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
