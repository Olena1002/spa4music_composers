<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SectionRepository")
 * @Gedmo\SoftDeleteable(fieldName="deletedAt", timeAware=false, hardDelete=true)
 * @UniqueEntity({"ref"})
 */
class Section
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
     * @ORM\Column(type="array", nullable=true)
     */
    private $content = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $customData = [];

    /**
     * @ORM\Column(type="json_array", nullable=true)
     */
    private $metadata;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Section", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="parent_id", nullable=true, referencedColumnName="id")
     */
    private $parent;

    /**
     * @ORM\Column(type="integer", options={"default" : 0})
     */
    private $position;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\SectionType", inversedBy="sections")
     */
    private $sectionTypes;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="sections")
     * @ORM\JoinColumn(name="publisher_id", referencedColumnName="id")
     */
    private $publisher;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $isParent;

    /**
     * @ORM\Column(type="boolean", options={"default" : false})
     */
    private $isPublished;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="change", field={"title", "content", "customData", "isPublished"})
     */
    private $publishedAt;

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

    public function getPublishedAt(): ?DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }
}
