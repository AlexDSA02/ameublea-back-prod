<?php

namespace App\Repository;

use App\Entity\PieceAmbianceMeubleGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PieceAmbianceMeubleGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method PieceAmbianceMeubleGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method PieceAmbianceMeubleGroupe[]    findAll()
 * @method PieceAmbianceMeubleGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PieceAmbianceMeubleGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PieceAmbianceMeubleGroupe::class);
    }

    // /**
    //  * @return PieceAmbianceMeubleGroupe[] Returns an array of PieceAmbianceMeubleGroupe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PieceAmbianceMeubleGroupe
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
