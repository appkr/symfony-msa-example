<?php

namespace App\Entity;

use App\Repository\SingerRepository;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SingerRepository::class)
 * @ORM\Table(name="singers")
 */
class Singer
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length = 40)
     */
    private $createdBy;

    /**
     * @ORM\Column(type="string", length = 40)
     */
    private $updatedBy;

    /**
     * @ORM\OneToMany(targetEntity=Album::class, mappedBy="singer", orphanRemoval=true)
     */
    private $albums;

    public function __construct(?int $id, string $name, ?DateTime $createdAt, ?DateTime $updatedAt,
                                ?string $createdBy, ?string $updatedBy) {
        $this->id = $id;
        $this->name = $name;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->createdBy = $createdBy;
        $this->updatedBy = $updatedBy;
        $this->albums = new ArrayCollection();
    }

    public static function of($name) {
        return new static(null, $name, new DateTime(), new DateTime(), null, null);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    public function getCreatedBy(): ?string
    {
        return $this->createdBy;
    }

    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    public function getUpdatedBy(): ?string
    {
        return $this->updatedBy;
    }

    public function setUpdatedBy($updatedBy)
    {
        $this->updatedBy = $updatedBy;
    }

    /**
     * @return Collection|Album[]
     */
    public function getAlbums(): Collection
    {
        return $this->albums;
    }

    public function addAlbum(Album $album): self
    {
        if (!$this->albums->contains($album)) {
            $this->albums[] = $album;
            $album->setSinger($this);
        }

        return $this;
    }

    public function removeAlbum(Album $album): self
    {
        if ($this->albums->removeElement($album)) {
            // set the owning side to null (unless already changed)
            if ($album->getSinger() === $this) {
                $album->setSinger(null);
            }
        }

        return $this;
    }
}
