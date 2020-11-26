<?php

namespace App\Repository;

use App\Entity\InfoSup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfoSup|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoSup|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoSup[]    findAll()
 * @method InfoSup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoSupRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfoSup::class);
    }

    // /**
    //  * @return InfoSup[] Returns an array of InfoSup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InfoSup
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
