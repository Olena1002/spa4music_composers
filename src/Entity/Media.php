<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MediaRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=true)
 * @UniqueEntity({"ref"})
 */
class Media
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
     * @Gedmo\Slug(fields={"title"})
     * @ORM\Column(type="string", length=128)
     */
    private $ref;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $contentData = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $metadata = [];

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\MediaType", inversedBy="media")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="media")
     */
    private $publisher;

    /**
     * @ORM\Column(type="integer")
     * @todo: Media Group relation
     */
    private $group;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"title", "contentData", "isPublished"})
     */
    private $publishedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroup(): ?int
    {
        return $this->group;
    }

    public function setGroup(int $group): self
    {
        $this->group = $group;

        return $this;
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

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getContentData(): ?array
    {
        return $this->contentData;
    }

    public function setContentData(array $contentData): self
    {
        $this->contentData = $contentData;

        return $this;
    }

    public function getMetadata(): ?array
    {
        return $this->metadata;
    }

    public function setMetadata(array $metadata): self
    {
        $this->metadata = $metadata;

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

    public function getType(): ?MediaType
    {
        return $this->type;
    }

    public function setType(?MediaType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getPublisher(): ?User
    {
        return $this->publisher;
    }

    public function setPublisher(?User $publisher): self
    {
        $this->publisher = $publisher;

        return $this;
    }
}
