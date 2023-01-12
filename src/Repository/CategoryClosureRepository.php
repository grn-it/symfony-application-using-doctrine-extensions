<?php

namespace App\Repository;

use App\Entity\CategoryClosure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryClosure>
 *
 * @method CategoryClosure|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryClosure|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryClosure[]    findAll()
 * @method CategoryClosure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryClosureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryClosure::class);
    }

    public function save(CategoryClosure $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoryClosure $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
