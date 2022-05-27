<?php

namespace App\Repository;

use App\Entity\OrganismeDeFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OrganismeDeFormation>
 *
 * @method OrganismeDeFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrganismeDeFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrganismeDeFormation[]    findAll()
 * @method OrganismeDeFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganismeDeFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrganismeDeFormation::class);
    }

    public function add(OrganismeDeFormation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(OrganismeDeFormation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return OrganismeDeFormation[] Returns an array of OrganismeDeFormation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OrganismeDeFormation
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
