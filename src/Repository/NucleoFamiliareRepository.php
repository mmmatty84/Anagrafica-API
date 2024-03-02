<?php

namespace App\Repository;

use App\Entity\NucleoFamiliare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NucleoFamiliare>
 *
 * @method NucleoFamiliare|null find($id, $lockMode = null, $lockVersion = null)
 * @method NucleoFamiliare|null findOneBy(array $criteria, array $orderBy = null)
 * @method NucleoFamiliare[]    findAll()
 * @method NucleoFamiliare[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NucleoFamiliareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NucleoFamiliare::class);
    }

    //    /**
    //     * @return FamigliaCittadino[] Returns an array of FamigliaCittadino objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FamigliaCittadino
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
