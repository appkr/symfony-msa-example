<?php

namespace App\Service\Mapper;

use App\Entity\Singer;
use App\Service\Dto\SingerDto;

class SingerMapper
{
    public function toEntity(SingerDto $dto): Singer
    {
        return Singer::of($dto->getName());
    }

    public function toDto(Singer $entity): SingerDto
    {
        $dto = new SingerDto();
        $dto->setId($entity->getId());
        $dto->setName($entity->getName());
        $dto->setCreatedAt($entity->getCreatedAt());
        $dto->setUpdatedAt($entity->getUpdatedAt());
        $dto->setCreatedBy($entity->getUpdatedBy());
        $dto->setUpdatedBy($entity->getUpdatedBy());

        return $dto;
    }
}