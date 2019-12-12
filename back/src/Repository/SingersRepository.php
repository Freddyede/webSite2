<?php

namespace App\Repository;

use App\Entity\Singers;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Singers|null find($id, $lockMode = null, $lockVersion = null)
 * @method Singers|null findOneBy(array $criteria, array $orderBy = null)
 * @method Singers[]    findAll()
 * @method Singers[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SingersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Singers::class);
    }

    // /**
    //  * @return Singers[] Returns an array of Singers objects
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
    public function findOneBySomeField($value): ?Singers
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
