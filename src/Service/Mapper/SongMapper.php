<?php

namespace App\Service\Mapper;

use App\Entity\Song;
use App\Service\Dto\SongDto;

class SongMapper
{
    public function toEntity(SongDto $dto): Song
    {
        $entity = new Song();
        $entity->setTitle($dto->getTitle());
        $entity->setPlayTime($dto->getPlayTime());

        return $entity;
    }

    public function toDto(?Song $entity): ?SongDto
    {
        if ($entity == null) {
            return null;
        }

        $dto = new SongDto();
        $dto->setId($entity->getId());
        $dto->setTitle($entity->getTitle());
        $dto->setPlayTime($entity->getPlayTime());
        $dto->setCreatedAt($entity->getCreatedAt());
        $dto->setUpdatedAt($entity->getUpdatedAt());
        $dto->setCreatedBy($entity->getCreatedBy());
        $dto->setUpdatedBy($entity->getUpdatedBy());

        return $dto;
    }
}