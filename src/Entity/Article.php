<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\IpTraceable\Traits\IpTraceableEntity;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Gedmo\Translatable\Translatable;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
#[Gedmo\Loggable]
#[Gedmo\SoftDeleteable(fieldName: 'deletedAt', timeAware: false, hardDelete: true)]
class Article implements Translatable
{
    use TimestampableEntity;
    use IpTraceableEntity;
    use SoftDeleteableEntity;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Translatable]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Versioned]
    #[Gedmo\Translatable]
    private ?string $text = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    #[Gedmo\Blameable(on: 'create')]
    private ?User $createdBy = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\Slug(fields: ['title'])]
    private ?string $slug = null;

    #[Gedmo\Locale]
    private ?string $locale = null;

    #[ORM\Column(nullable: true)]
    #[Gedmo\SortablePosition]
    private ?int $sortablePosition = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Gedmo\SortableGroup]
    private ?string $sortableGroup = null;
    
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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function setTranslatableLocale(string $locale): self
    {
        $this->locale = $locale;
        
        return $this;
    }

    public function getSortablePosition(): ?int
    {
        return $this->sortablePosition;
    }

    public function setSortablePosition(?int $sortablePosition): self
    {
        $this->sortablePosition = $sortablePosition;

        return $this;
    }

    public function getSortableGroup(): ?string
    {
        return $this->sortableGroup;
    }

    public function setSortableGroup(?string $sortableGroup): self
    {
        $this->sortableGroup = $sortableGroup;

        return $this;
    }
}
