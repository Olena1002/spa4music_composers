<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TemplateRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=true)
 * @UniqueEntity({"ref"})
 */
class Template
{

    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * Hook SoftDeleteable behavior
     * updates deletedAt field
     */
    use SoftDeleteableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Gedmo\Slug(fields={"name"})
     * @ORM\Column(type="string", length=128)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=60)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resourcesPath;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $cssMods = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $jsMods = [];

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $extendedJson;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $isActive;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"title", "resourcesPath", "cssMods", "jsMods", "extendedJson", "isPublished"})
     */
    private $publishedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRef(): ?string
    {
        return $this->ref;
    }

    public function setRef(string $ref): self
    {
        $this->ref = $ref;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getResourcesPath(): ?string
    {
        return $this->resourcesPath;
    }

    public function setResourcesPath(string $resourcesPath): self
    {
        $this->resourcesPath = $resourcesPath;

        return $this;
    }

    public function getCssMods(): ?array
    {
        return $this->cssMods;
    }

    public function setCssMods(?array $cssMods): self
    {
        $this->cssMods = $cssMods;

        return $this;
    }

    public function getJsMods(): ?array
    {
        return $this->jsMods;
    }

    public function setJsMods(?array $jsMods): self
    {
        $this->jsMods = $jsMods;

        return $this;
    }

    public function getExtendedJson()
    {
        return $this->extendedJson;
    }

    public function setExtendedJson($extendedJson): self
    {
        $this->extendedJson = $extendedJson;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getIsPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $isPublished): self
    {
        $this->isPublished = $isPublished;

        return $this;
    }

    public function getPublishedAt(): ?DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }
}
