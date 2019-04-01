<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="user")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=60, nullable=false)
     */
    private $username;

    /**
     * @ORM\Column(name="full_name", type="string", length=50, nullable=true)
     */
    private $fullName;

    /**
     * @ORM\Column(name="is_activated", type="boolean", options={"default" : false})
     */
    private $isActivated;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $userAgent = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $roles;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastLogin;

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
     * @ORM\OneToMany(targetEntity="App\Entity\Section", mappedBy="publisher")
     */
    private $sections;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MediaType", mappedBy="publisher")
     */
    private $mediaTypes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Message", mappedBy="user")
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="publisher")
     */
    private $media;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\SectionType", mappedBy="publisher")
     */
    private $sectionTypes;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MediaGroup", mappedBy="publisher")
     */
    private $mediaGroups;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Provider", inversedBy="users")
     */
    private $provider;

    public function __construct()
    {
        $this->sections = new ArrayCollection();
        $this->mediaTypes = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->media = new ArrayCollection();
        $this->sectionTypes = new ArrayCollection();
        $this->mediaGroups = new ArrayCollection();
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(?string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function getIsActivated(): ?bool
    {
        return $this->isActivated;
    }

    public function setIsActivated(bool $isActivated): self
    {
        $this->isActivated = $isActivated;

        return $this;
    }

    public function getUserAgent(): ?array
    {
        return $this->userAgent;
    }

    public function setUserAgent(array $userAgent): self
    {
        $this->userAgent = $userAgent;

        return $this;
    }

    public function getRoles(): ?string
    {
        return $this->roles;
    }

    public function setRoles(string $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getLastLogin(): ?DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getDeletedAt(): ?DateTimeInterface
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(DateTimeInterface $deletedAt): self
    {
        $this->deletedAt = $deletedAt;

        return $this;
    }

    /**
     * @return Collection|Section[]
     */
    public function getSections(): Collection
    {
        return $this->sections;
    }

    public function addSection(Section $section): self
    {
        if (!$this->sections->contains($section)) {
            $this->sections[] = $section;
            $section->setPublisher($this);
        }

        return $this;
    }

    public function removeSection(Section $section): self
    {
        if ($this->sections->contains($section)) {
            $this->sections->removeElement($section);
            // set the owning side to null (unless already changed)
            if ($section->getPublisher() === $this) {
                $section->setPublisher(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MediaType[]
     */
    public function getMediaTypes(): Collection
    {
        return $this->mediaTypes;
    }

    public function addMediaType(MediaType $mediaType): self
    {
        if (!$this->mediaTypes->contains($mediaType)) {
            $this->mediaTypes[] = $mediaType;
            $mediaType->setPublisher($this);
        }

        return $this;
    }

    public function removeMediaType(MediaType $mediaType): self
    {
        if ($this->mediaTypes->contains($mediaType)) {
            $this->mediaTypes->removeElement($mediaType);
            // set the owning side to null (unless already changed)
            if ($mediaType->getPublisher() === $this) {
                $mediaType->setPublisher(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setUser($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
            // set the owning side to null (unless already changed)
            if ($message->getUser() === $this) {
                $message->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setPublisher($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getPublisher() === $this) {
                $medium->setPublisher(null);
            }
        }

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
            $sectionType->setPublisher($this);
        }

        return $this;
    }

    public function removeSectionType(SectionType $sectionType): self
    {
        if ($this->sectionTypes->contains($sectionType)) {
            $this->sectionTypes->removeElement($sectionType);
            // set the owning side to null (unless already changed)
            if ($sectionType->getPublisher() === $this) {
                $sectionType->setPublisher(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MediaGroup[]
     */
    public function getMediaGroups(): Collection
    {
        return $this->mediaGroups;
    }

    public function addMediaGroup(MediaGroup $mediaGroup): self
    {
        if (!$this->mediaGroups->contains($mediaGroup)) {
            $this->mediaGroups[] = $mediaGroup;
            $mediaGroup->setPublisher($this);
        }

        return $this;
    }

    public function removeMediaGroup(MediaGroup $mediaGroup): self
    {
        if ($this->mediaGroups->contains($mediaGroup)) {
            $this->mediaGroups->removeElement($mediaGroup);
            // set the owning side to null (unless already changed)
            if ($mediaGroup->getPublisher() === $this) {
                $mediaGroup->setPublisher(null);
            }
        }

        return $this;
    }

    public function getProvider(): ?Provider
    {
        return $this->provider;
    }

    public function setProvider(?Provider $provider): self
    {
        $this->provider = $provider;

        return $this;
    }
}
