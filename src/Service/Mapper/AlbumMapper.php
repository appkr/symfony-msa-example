<?php

namespace App\Service\Mapper;

use App\Entity\Album;
use App\Service\Dto\AlbumDto;
use DateTime;

class AlbumMapper
{
    private $singerMapper;
    private $songMapper;

    public function __construct(SingerMapper $singerMapper, SongMapper $songMapper)
    {
        $this->singerMapper = $singerMapper;
        $this->songMapper = $songMapper;
    }

    public function toEntity(AlbumDto $dto): Album
    {
        $entity = new Album();
        $entity->setTitle($dto->getTitle());
        $entity->setPublished($dto->getPublished());
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
        $dto->setPublished($entity->getPublished());
        $dto->setCreatedAt($entity->getCreatedAt());
        $dto->setUpdatedAt($entity->getUpdatedAt());
        $dto->setCreatedBy($entity->getCreatedBy());
        $dto->setUpdatedBy($entity->getCreatedBy());
        if (null != $entity->getSinger()) {
            $dto->setSinger($this->singerMapper->toDto($entity->getSinger()));
        }
        if (!$entity->getSongs()->isEmpty()) {
            $dto->setSongs(array_map(function (SongDto $dto) {
                return $this->songMapper->toDto($dto);
            }), $entity->getSongs());
        }

        return $dto;
    }
}