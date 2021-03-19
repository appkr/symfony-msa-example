<?php

namespace App\Service\Dto;

use App\Entity\Song;
use DateTime;

class AlbumDto implements \JsonSerializable
{
    private $id;
    private $title;
    private $published;
    private $createdAt;
    private $updatedAt;
    private $createdBy;
    private $updatedBy;
    private $singer;
    private $songs;

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

    public function getPublished(): string
    {
        return $this->published;
    }

    public function setPublished(string $published)
    {
        $this->published = $published;
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

    public function getSinger(): ?SingerDto
    {
        return $this->singer;
    }

    public function setSinger(?SingerDto $singer)
    {
        $this->singer = $singer;
    }

    /**
     * @return array|SongDto[]
     */
    public function getSongs(): ?array
    {
        return $this->songs;
    }

    /**
     * @param array|Song[] $songs
     */
    public function setSongs(?array $songs)
    {
        $this->songs = $songs;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}