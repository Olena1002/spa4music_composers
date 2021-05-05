<?php

namespace App\Repository;

use App\Entity\MediaGroup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method MediaGroup|null find($id, $lockMode = null, $lockVersion = null)
 * @method MediaGroup|null findOneBy(array $criteria, array $orderBy = null)
 * @method MediaGroup[]    findAll()
 * @method MediaGroup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MediaGroupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, MediaGroup::class);
    }

    // /**
    //  * @return MediaGroup[] Returns an array of MediaGroup objects
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
    public function findOneBySomeField($value): ?MediaGroup
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
