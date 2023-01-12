<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Tree\Entity\Repository\NestedTreeRepository;
use Gedmo\Mapping\Annotation as Gedmo;

#[Gedmo\Tree(type: 'nested')]
#[ORM\Entity(repositoryClass: NestedTreeRepository::class)]
class CategoryTree
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    #[Gedmo\TreeLeft]
    private ?int $lft = null;

    #[ORM\Column]
    #[Gedmo\TreeLevel]
    private ?int $lvl = null;

    #[ORM\Column]
    #[Gedmo\TreeRight]
    private ?int $rgt = null;

    #[ORM\ManyToOne(targetEntity: self::class)]
    #[Gedmo\TreeRoot]
    private ?self $root = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[Gedmo\TreeParent]
    private ?self $parent = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    #[ORM\OrderBy(['lft' => 'ASC'])]
    private Collection $children;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getRoot(): ?self
    {
        return $this->root;
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }
}
