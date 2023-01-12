<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\Uploadable\Mapping\Validator;
use phpDocumentor\Reflection\Types\Boolean;

#[ORM\Entity(repositoryClass: FileRepository::class)]
#[Gedmo\Uploadable(
    allowOverwrite: true,
    appendNumber: true,
    path: 'public/uploads',
    filenameGenerator: Validator::FILENAME_GENERATOR_SHA1
)]
class File
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\UploadableFilePath]
    private ?string $path = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\UploadableFileName]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Gedmo\UploadableFileMimeType]
    private ?string $mimeType = null;

    #[ORM\Column(type: Types::DECIMAL)]
    #[Gedmo\UploadableFileSize]
    private ?string $size = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMimeType(): ?string
    {
        return $this->mimeType;
    }

    public function setMimeType(string $mimeType): self
    {
        $this->mimeType = $mimeType;

        return $this;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }
}
