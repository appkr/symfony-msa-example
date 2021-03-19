<?php

namespace App\Service;

use App\Repository\SingerRepository;
use App\Service\Dto\SingerDto;
use App\Service\Mapper\SingerMapper;
use Doctrine\ORM\EntityManagerInterface;

class SingerService
{
    private $repository;
    private $em;
    private $mapper;

    public function __construct(SingerRepository $repository, EntityManagerInterface $em, SingerMapper $mapper)
    {
        $this->repository = $repository;
        $this->em = $em;
        $this->mapper = $mapper;
    }

    public function createSinger(SingerDto $dto): SingerDto
    {
        $self = $this;
        return $this->em->transactional(function (EntityManagerInterface $em) use ($self, $dto) {
            $entity = $self->mapper->toEntity($dto);
            $em->persist($entity);
            $em->flush();

            return $this->mapper->toDto($entity);
        });
    }

    /**
     * @return SingerDto[]
     */
    public function listSingers(): array
    {
        return array_map([$this->mapper, 'toDto'], $this->repository->findAll());
    }
}