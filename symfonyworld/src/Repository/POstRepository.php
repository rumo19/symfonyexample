<?php

namespace App\Repository;

use App\Entity\POst;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method POst|null find($id, $lockMode = null, $lockVersion = null)
 * @method POst|null findOneBy(array $criteria, array $orderBy = null)
 * @method POst[]    findAll()
 * @method POst[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POstRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, POst::class);
    }

//    /**
//     * @return POst[] Returns an array of POst objects
//     */
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
    public function findOneBySomeField($value): ?POst
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
