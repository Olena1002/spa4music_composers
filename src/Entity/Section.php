<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionRepository")
 * @UniqueEntity({"ref", "position"})
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
     * @ORM\JoinColumn(name="parent_id", nullable=true, referencedColumnName="id")
     */
    private $parent;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="sections")
     * @ORM\JoinColumn(name="publisher_id", referencedColumnName="id")
     */
    private $publisher;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, unique=true)
     */
    private $ref;

    /**
     * @ORM\Column(type="integer", nullable=false, unique=true, options={"default" : 0})
     */
    private $position;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     * @todo: Maybe is loss-making prop.
     */
    private $isParent;

    /**
     * @ORM\Column(type="array", nullable=false)
     */
    private $content = [];

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $metadata;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default" : false})
     */
    private $isPublished;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $customData = [];

    /**
     * @ORM\Column(type="datetime", nullable=true)
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
     * @ORM\Column(type="datetime", nullable=true)
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

    public function getParent(): ?Section
    {
        return $this->parent;
    }

    public function setParent(?Section $parent): Section
    {
        $this->parent = $parent;

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

    public function getPublished(): ?bool
    {
        return $this->isPublished;
    }

    public function setPublished(bool $isPublished): self
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
