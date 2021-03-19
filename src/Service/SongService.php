<?php

namespace App\Service;

use App\Repository\SongRepository;
use App\Service\Mapper\SongMapper;
use Doctrine\ORM\EntityManagerInterface;

class SongService
{
    private $em;
    private $repository;
    private $mapper;

    public function __construct(EntityManagerInterface $em, SongRepository $repository, SongMapper $mapper)
    {
        $this->em = $em;
        $this->repository = $repository;
        $this->mapper = $mapper;
    }

    public function createSong(object $dto)
    {
        $self = $this;
        return $this->em->transactional(function (EntityManagerInterface $em) use ($self, $dto) {
            $entity = $self->mapper->toEntity($dto);
            $em->persist($entity);
            $em->flush();

            return $self->mapper->toDto($entity);
        });
    }

    public function getSong(int $songId)
    {
        return $this->mapper->toDto($this->repository->find($songId));
    }
}