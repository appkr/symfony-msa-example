<?php

namespace App\Service\Dto;

use DateTime;

class AlbumDto
{
    private $id;
    private $title;
    private $published;
    private $createdAt;
    private $updatedAt;
    private $createdBy;
    private $updatedBy;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(?int $id)
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    public function getPublished(): DateTime
    {
        return $this->published;
    }

    public function setPublished(DateTime $published)
    {
        $this->published = $published;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): DateTime
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy)
    {
        $this->updatedBy = $updatedBy;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}