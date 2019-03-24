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
    private $custom_head;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $custom_styles;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $custom_scripts;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $res_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $res_description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $res_logo;

    /**
     * @ORM\Column(type="string", length=60, nullable=true)
     */
    private $res_logo_text;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $res_data;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $res_metadata = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $owner_data = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $contacts_data = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $res_microdata = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $allow_for = [];

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
    private $is_live;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomHead(): ?string
    {
        return $this->custom_head;
    }

    public function setCustomHead(?string $custom_head): self
    {
        $this->custom_head = $custom_head;

        return $this;
    }

    public function getCustomStyles(): ?string
    {
        return $this->custom_styles;
    }

    public function setCustomStyles(?string $custom_styles): self
    {
        $this->custom_styles = $custom_styles;

        return $this;
    }

    public function getCustomScripts(): ?string
    {
        return $this->custom_scripts;
    }

    public function setCustomScripts(?string $custom_scripts): self
    {
        $this->custom_scripts = $custom_scripts;

        return $this;
    }

    public function getResTitle(): ?string
    {
        return $this->res_title;
    }

    public function setResTitle(?string $res_title): self
    {
        $this->res_title = $res_title;

        return $this;
    }

    public function getResDescription(): ?string
    {
        return $this->res_description;
    }

    public function setResDescription(?string $res_description): self
    {
        $this->res_description = $res_description;

        return $this;
    }

    public function getResLogo(): ?string
    {
        return $this->res_logo;
    }

    public function setResLogo(?string $res_logo): self
    {
        $this->res_logo = $res_logo;

        return $this;
    }

    public function getResLogoText(): ?string
    {
        return $this->res_logo_text;
    }

    public function setResLogoText(?string $res_logo_text): self
    {
        $this->res_logo_text = $res_logo_text;

        return $this;
    }

    public function getResData(): ?string
    {
        return $this->res_data;
    }

    public function setResData(?string $res_data): self
    {
        $this->res_data = $res_data;

        return $this;
    }

    public function getResMetadata(): ?array
    {
        return $this->res_metadata;
    }

    public function setResMetadata(?array $res_metadata): self
    {
        $this->res_metadata = $res_metadata;

        return $this;
    }

    public function getOwnerData(): ?array
    {
        return $this->owner_data;
    }

    public function setOwnerData(?array $owner_data): self
    {
        $this->owner_data = $owner_data;

        return $this;
    }

    public function getContactsData(): ?array
    {
        return $this->contacts_data;
    }

    public function setContactsData(?array $contacts_data): self
    {
        $this->contacts_data = $contacts_data;

        return $this;
    }

    public function getResMicrodata(): ?array
    {
        return $this->res_microdata;
    }

    public function setResMicrodata(?array $res_microdata): self
    {
        $this->res_microdata = $res_microdata;

        return $this;
    }

    public function getAllowFor(): ?array
    {
        return $this->allow_for;
    }

    public function setAllowFor(?array $allow_for): self
    {
        $this->allow_for = $allow_for;

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
        return $this->is_live;
    }

    public function setIsLive(bool $is_live): self
    {
        $this->is_live = $is_live;

        return $this;
    }
}
