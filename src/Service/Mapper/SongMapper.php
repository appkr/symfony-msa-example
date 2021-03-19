<?php

namespace App\Service\Mapper;

use App\Entity\Song;
use App\Service\Dto\SongDto;
use DateTime;

class SongMapper
{
    private $dateTimeMapper;

    public function __construct(DateTimeMapper $dateTimeMapper)
    {
        $this->dateTimeMapper = $dateTimeMapper;
    }

    public function toEntity(SongDto $dto): Song
    {
        $entity = new Song();
        $entity->setTitle($dto->getTitle());
        $entity->setPlayTime($dto->getPlayTime());
        $entity->setCreatedAt(new DateTime());
        $entity->setUpdatedAt(new DateTime());

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
        $dto->setCreatedAt($this->dateTimeMapper->toIso8601String($entity->getCreatedAt()));
        $dto->setUpdatedAt($this->dateTimeMapper->toIso8601String($entity->getUpdatedAt()));
        $dto->setCreatedBy($entity->getCreatedBy());
        $dto->setUpdatedBy($entity->getUpdatedBy());

        return $dto;
    }
}