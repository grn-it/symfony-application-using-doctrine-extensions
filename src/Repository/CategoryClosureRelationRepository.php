<?php

namespace App\Repository;

use App\Entity\CategoryClosureRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryClosureRelation>
 *
 * @method CategoryClosureRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryClosureRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryClosureRelation[]    findAll()
 * @method CategoryClosureRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryClosureRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryClosureRelation::class);
    }

    public function save(CategoryClosureRelation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoryClosureRelation $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return CategoryClosureRelation[] Returns an array of CategoryClosureRelation objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CategoryClosureRelation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
