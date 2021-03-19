<?php

namespace App\Service\Mapper;

use App\Entity\Album;
use App\Entity\Song;
use App\Service\Dto\AlbumDto;
use DateTime;

class AlbumMapper
{
    private $singerMapper;
    private $songMapper;
    private $dateTimeMapper;

    public function __construct(SingerMapper $singerMapper, SongMapper $songMapper, DateTimeMapper $dateTimeMapper)
    {
        $this->singerMapper = $singerMapper;
        $this->songMapper = $songMapper;
        $this->dateTimeMapper = $dateTimeMapper;
    }

    public function toEntity(AlbumDto $dto): Album
    {
        $entity = new Album();
        $entity->setTitle($dto->getTitle());
        $entity->setPublished($this->dateTimeMapper->toDateTime($dto->getPublished()));
        $entity->setCreatedAt(new DateTime());
        $entity->setUpdatedAt(new DateTime());

        return $entity;
    }

    public function toDto(?Album $entity): ?AlbumDto
    {
        if ($entity == null) {
            return null;
        }

        $dto = new AlbumDto();
        $dto->setId($entity->getId());
        $dto->setTitle($entity->getTitle());
        $dto->setPublished($this->dateTimeMapper->toIso8601String($entity->getPublished()));
        $dto->setCreatedAt($this->dateTimeMapper->toIso8601String($entity->getCreatedAt()));
        $dto->setUpdatedAt($this->dateTimeMapper->toIso8601String($entity->getUpdatedAt()));
        $dto->setCreatedBy($entity->getCreatedBy());
        $dto->setUpdatedBy($entity->getCreatedBy());
        if (null != $entity->getSinger()) {
            $dto->setSinger($this->singerMapper->toDto($entity->getSinger()));
        }
        if (!$entity->getSongs()->isEmpty()) {
            $dto->setSongs(array_map(function (Song $entity) {
                return $this->songMapper->toDto($entity);
            }, $entity->getSongs()->toArray()));
        }

        return $dto;
    }
}