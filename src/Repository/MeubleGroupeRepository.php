<?php

namespace App\Repository;

use App\Entity\MeubleGroupe;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MeubleGroupe|null find($id, $lockMode = null, $lockVersion = null)
 * @method MeubleGroupe|null findOneBy(array $criteria, array $orderBy = null)
 * @method MeubleGroupe[]    findAll()
 * @method MeubleGroupe[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MeubleGroupeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MeubleGroupe::class);
    }

    // /**
    //  * @return MeubleGroupe[] Returns an array of MeubleGroupe objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MeubleGroupe
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
