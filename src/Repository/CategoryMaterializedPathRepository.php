<?php

namespace App\Repository;

use App\Entity\CategoryMaterializedPath;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryMaterializedPath>
 *
 * @method CategoryMaterializedPath|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoryMaterializedPath|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoryMaterializedPath[]    findAll()
 * @method CategoryMaterializedPath[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoryMaterializedPathRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryMaterializedPath::class);
    }

    public function save(CategoryMaterializedPath $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(CategoryMaterializedPath $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
