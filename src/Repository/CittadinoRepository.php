<?php

namespace App\Repository;

use App\Entity\Cittadino;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cittadino>
 *
 * @method Cittadino|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cittadino|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cittadino[]    findAll()
 * @method Cittadino[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CittadinoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cittadino::class);
    }

    /*
     *  Metodo utilizzato nella Factory Famiglia per generare il DB di test
     *  $famiglieResponsabile è stato generato nell'entità Cittadino per comodità
     *  nell'utilizzo all'interno di questa query
     */
    public function findNonResponsabili()
    {
        $qb = $this->createQueryBuilder('c')
            ->leftJoin('c.responsabileFamiglie', 'f')
            ->where('f.responsabile IS NULL')
            ->getQuery();

        return $qb->getResult();
    }

    /*
     *  Metodo utilizzato nel service FamigliaService per verificare che il cittadino
     *  appartenga a più di una famiglia. Ritorna true se il cittadino appartiene a più di una famiglia
     */
    public function haAltreFamiglie(int $cittadinoId): bool
    {
        $qb = $this->createQueryBuilder('c')
            ->select('count(distinct f.id) as numFamiglie') // Conta le famiglie distinte
            ->innerJoin('c.membri', 'm')
            ->innerJoin('m.famiglia', 'f')
            ->where('c.id = :id')
            ->setParameter('id', $cittadinoId)
            ->getQuery()
            ->getSingleScalarResult();

        return $qb > 1;
    }

}
