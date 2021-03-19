<?php

namespace App\Entity;

use App\Repository\SingerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SingerRepository::class)
 * @ORM\Table(name="songs")
 */
class Song
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $playTime;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $createdBy;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $updatedBy;

    /**
     * @ORM\ManyToOne(targetEntity=Album::class, inversedBy="songs")
     */
    private $album;

    public function getId(): int
    {
        return $this->id;
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

    public function getPlayTime(): ?string
    {
        return $this->playTime;
    }

    public function setPlayTime(string $playTime): self
    {
        $this->playTime = $playTime;

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

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?string $createdBy): self
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy(?string $updatedBy): self
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

        return $this;
    }
}
