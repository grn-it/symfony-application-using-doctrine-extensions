<?php

namespace App\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Tree\Entity\Repository\MaterializedPathRepository;

#[ORM\Entity(repositoryClass: MaterializedPathRepository::class)]
#[Gedmo\Tree(type: 'materializedPath')]
class CategoryMaterializedPath
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Gedmo\TreePath]
    private ?string $path = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\TreePathSource]
    private ?string $title = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'children')]
    #[Gedmo\TreeParent]
    private ?self $parent = null;

    #[ORM\Column(nullable: true)]
    #[Gedmo\TreeLevel]
    private ?int $level = null;

    #[ORM\OneToMany(mappedBy: 'parent', targetEntity: self::class)]
    private Collection $children;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(?string $path): self
    {
        $this->path = $path;

        return $this;
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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }
}
