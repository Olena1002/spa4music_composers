<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MessageRepository")
 */
class Message
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="array")
     */
    private $content = [];

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $is_delivered;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_received;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_replied;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $deleted_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?array
    {
        return $this->content;
    }

    public function setContent(?array $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getIsDelivered(): ?bool
    {
        return $this->is_delivered;
    }

    public function setIsDelivered(bool $is_delivered): self
    {
        $this->is_delivered = $is_delivered;

        return $this;
    }

    public function getIsReceived(): ?bool
    {
        return $this->is_received;
    }

    public function setIsReceived(?bool $is_received): self
    {
        $this->is_received = $is_received;

        return $this;
    }

    public function getIsReplied(): ?bool
    {
        return $this->is_replied;
    }

    public function setIsReplied(bool $is_replied): self
    {
        $this->is_replied = $is_replied;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getDeletedAt(): ?\DateTimeInterface
    {
        return $this->deleted_at;
    }

    public function setDeletedAt(\DateTimeInterface $deleted_at): self
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }
}
