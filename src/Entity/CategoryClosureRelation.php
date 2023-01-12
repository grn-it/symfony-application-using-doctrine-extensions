<?php

namespace App\Entity;

use App\Repository\CategoryClosureRelationRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Tree\Entity\MappedSuperclass\AbstractClosure;

#[ORM\Entity(repositoryClass: CategoryClosureRelationRepository::class)]
//#[ORM\UniqueConstraint(name: 'closure_unique_idx', columns: ['ancestor', 'descendant'])]
#[ORM\Index(columns: ['depth'], name: 'closure_depth_idx')]
class CategoryClosureRelation extends AbstractClosure
{
    #[ORM\ManyToOne(targetEntity: CategoryClosure::class)]
    #[ORM\JoinColumn(name: 'ancestor', referencedColumnName: 'id')]
    protected $ancestor;

    #[ORM\ManyToOne(targetEntity: CategoryClosure::class)]
    #[ORM\JoinColumn(name: 'descendant', referencedColumnName: 'id')]
    protected $descendant;
}
