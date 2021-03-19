<?php

namespace App\Service;

use App\Entity\Album;
use App\Repository\AlbumRepository;
use App\Repository\SingerRepository;
use App\Repository\SongRepository;
use App\Service\Dto\AlbumDto;
use App\Service\Mapper\AlbumMapper;
use Doctrine\ORM\EntityManagerInterface;

class AlbumService
{
    private $em;
    private $repository;
    private $mapper;
    private $songRepository;
    private $singerRepository;

    public function __construct(
        EntityManagerInterface $em,
        AlbumRepository $repository,
        AlbumMapper $mapper,
        SongRepository $songRepository,
        SingerRepository $singerRepository
    ) {
        $this->em = $em;
        $this->repository = $repository;
        $this->mapper = $mapper;
        $this->songRepository = $songRepository;
        $this->singerRepository = $singerRepository;
    }

    public function createAlbum(AlbumDto $dto)
    {
        $self = $this;
        return $this->em->transactional(function (EntityManagerInterface $em) use ($self, $dto) {
            $entity = $self->mapper->toEntity($dto);
            $em->persist($entity);
            $em->flush();

            return $this->mapper->toDto($entity);
        });
    }

    public function listArticles()
    {
        $self = $this;
        return array_map(function (Album $entity) use ($self) {
            return $self->mapper->toDto($entity);
        }, $this->repository->findAll());
    }

    public function associateSong(int $albumId, int $songId)
    {
        $self = $this;
        $this->em->transactional(function (EntityManagerInterface $em) use ($self, $albumId, $songId) {
            $album = $self->repository->find($albumId);
            $song = $self->songRepository->find($songId);
            $album->addSong($song);
            $em->flush();
        });
    }

    public function associateSinger(int $albumId, int $singerId)
    {
        $self = $this;
        $this->em->transactional(function (EntityManagerInterface $em) use ($self, $albumId, $singerId) {
            $album = $self->repository->find($albumId);
            $singer = $self->singerRepository->find($singerId);
            $album->setSinger($singer);
            $em->flush();
        });
    }
}