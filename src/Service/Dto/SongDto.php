<?php

namespace App\Service\Dto;

use DateTime;

class SongDto implements \JsonSerializable
{
    private $id;
    private $title;
    private $playTime;
    private $createdAt;
    private $updatedAt;
    private $createdBy;
    private $updatedBy;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(?string $title)
    {
        $this->title = $title;
    }

    public function getPlayTime(): string
    {
        return $this->playTime;
    }

    public function setPlayTime(string $playTime)
    {
        $this->playTime = $playTime;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function setCreatedAt(string $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(string $updatedAt)
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