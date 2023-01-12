<?php

namespace App\Repository;

use App\Entity\CategoryTree;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryTree>
 *
 * @method CategoryTree|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryTree|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryTree[]    findAll()
 * @method CategoryTree[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryTreeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryTree::class);
    }

    public function save(CategoryTree $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoryTree $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
