<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SettingsRepository")
 */
class Settings
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="custom_head", type="text", nullable=true)
     */
    private $customHead;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $customStyles;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $customScripts;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resTitle;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resDescription;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $resLogo;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $resLogoText;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $resData;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $resMetadata = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $ownerData = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $contactsData = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $resMicrodata = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $allowFor = [];

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $version;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $copyright;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isLive;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomHead(): ?string
    {
        return $this->customHead;
    }

    public function setCustomHead(?string $customHead): self
    {
        $this->customHead = $customHead;

        return $this;
    }

    public function getCustomStyles(): ?string
    {
        return $this->customStyles;
    }

    public function setCustomStyles(?string $customStyles): self
    {
        $this->customStyles = $customStyles;

        return $this;
    }

    public function getCustomScripts(): ?string
    {
        return $this->customScripts;
    }

    public function setCustomScripts(?string $customScripts): self
    {
        $this->customScripts = $customScripts;

        return $this;
    }

    public function getResTitle(): ?string
    {
        return $this->resTitle;
    }

    public function setResTitle(?string $resTitle): self
    {
        $this->resTitle = $resTitle;

        return $this;
    }

    public function getResDescription(): ?string
    {
        return $this->resDescription;
    }

    public function setResDescription(?string $resDescription): self
    {
        $this->resDescription = $resDescription;

        return $this;
    }

    public function getResLogo(): ?string
    {
        return $this->resLogo;
    }

    public function setResLogo(?string $resLogo): self
    {
        $this->resLogo = $resLogo;

        return $this;
    }

    public function getResLogoText(): ?string
    {
        return $this->resLogoText;
    }

    public function setResLogoText(?string $resLogoText): self
    {
        $this->resLogoText = $resLogoText;

        return $this;
    }

    public function getResData(): ?string
    {
        return $this->resData;
    }

    public function setResData(?string $resData): self
    {
        $this->resData = $resData;

        return $this;
    }

    public function getResMetadata(): ?array
    {
        return $this->resMetadata;
    }

    public function setResMetadata(?array $resMetadata): self
    {
        $this->resMetadata = $resMetadata;

        return $this;
    }

    public function getOwnerData(): ?array
    {
        return $this->ownerData;
    }

    public function setOwnerData(?array $ownerData): self
    {
        $this->ownerData = $ownerData;

        return $this;
    }

    public function getContactsData(): ?array
    {
        return $this->contactsData;
    }

    public function setContactsData(?array $contactsData): self
    {
        $this->contactsData = $contactsData;

        return $this;
    }

    public function getResMicrodata(): ?array
    {
        return $this->resMicrodata;
    }

    public function setResMicrodata(?array $resMicrodata): self
    {
        $this->resMicrodata = $resMicrodata;

        return $this;
    }

    public function getAllowFor(): ?array
    {
        return $this->allowFor;
    }

    public function setAllowFor(?array $allowFor): self
    {
        $this->allowFor = $allowFor;

        return $this;
    }

    public function getVersion(): ?string
    {
        return $this->version;
    }

    public function setVersion(string $version): self
    {
        $this->version = $version;

        return $this;
    }

    public function getCopyright(): ?string
    {
        return $this->copyright;
    }

    public function setCopyright(?string $copyright): self
    {
        $this->copyright = $copyright;

        return $this;
    }

    public function getIsLive(): ?bool
    {
        return $this->isLive;
    }

    public function setIsLive(bool $isLive): self
    {
        $this->isLive = $isLive;

        return $this;
    }
}
