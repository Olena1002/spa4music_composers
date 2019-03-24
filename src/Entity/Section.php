<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionRepository")
 */
class Section
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Section", cascade={"persist", "remove"})
     */
    private $parent_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="sections")
     * @ORM\JoinColumn(nullable=false)
     */
    private $publisher_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ref;

    /**
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isParent;

    /**
     * @ORM\Column(type="array")
     */
    private $content = [];

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $metadata;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPublished;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $customData = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deletedAt;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SectionType", inversedBy="sections")
     */
    private $sectionTypes;

    public function __construct()
    {
        $this->sectionTypes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParentId(): ?self
    {
        return $this->parent_id;
    }

    public function setParentId(?self $parent_id): self
    {
        $this->parent_id = $parent_id;

        return $this;
    }

    public function getPublisherId(): ?User
    {
        return $this->publisher_id;
    }

    public function setPublisherId(?User $publisher_id): self
    {
        $this->publisher_id = $publisher_id;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }

    public function getIsParent(): ?bool
    {
        return $this->isParent;
    }

    public function setIsParent(bool $isParent): self
    {
        $this->isParent = $isParent;

        return $this;
    }

    public function getContent(): ?array
    {
        return $this->content;
    }

    public function setContent(array $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getMetadata()
    {
        return $this->metadata;
    }

    public function setMetadata($metadata): self
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

    public function getCustomData(): ?array
    {
        return $this->customData;
    }

    public function setCustomData(?array $customData): self
    {
        $this->customData = $customData;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(\DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @return Collection|SectionType[]
     */
    public function getSectionTypes(): Collection
    {
        return $this->sectionTypes;
    }

    public function addSectionType(SectionType $sectionType): self
    {
        if (!$this->sectionTypes->contains($sectionType)) {
            $this->sectionTypes[] = $sectionType;
        }

        return $this;
    }

    public function removeSectionType(SectionType $sectionType): self
    {
        if ($this->sectionTypes->contains($sectionType)) {
            $this->sectionTypes->removeElement($sectionType);
        }

        return $this;
    }
}
