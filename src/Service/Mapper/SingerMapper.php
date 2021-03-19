<?php

namespace App\Service\Mapper;

use App\Entity\Singer;
use App\Service\Dto\SingerDto;

class SingerMapper
{
    private $dateTimeMapper;

    public function __construct(DateTimeMapper $dateTimeMapper)
    {
        $this->dateTimeMapper = $dateTimeMapper;
    }

    public function toEntity(SingerDto $dto): Singer
    {
        return Singer::of($dto->getName());
    }

    public function toDto(?Singer $entity): ?SingerDto
    {
        if ($entity == null) {
            return null;
        }

        $dto = new SingerDto();
        $dto->setId($entity->getId());
        $dto->setName($entity->getName());
        $dto->setCreatedAt($this->dateTimeMapper->toIso8601String($entity->getCreatedAt()));
        $dto->setUpdatedAt($this->dateTimeMapper->toIso8601String($entity->getUpdatedAt()));
        $dto->setCreatedBy($entity->getUpdatedBy());
        $dto->setUpdatedBy($entity->getUpdatedBy());

        return $dto;
    }
}