<?php

namespace App\Controller;

use App\Service\AlbumService;
use App\Service\Dto\AlbumDto;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AlbumController extends BaseController
{
    private $service;

    public function __construct(AlbumService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route(methods={"POST"}, path="/api/albums")
     */
    public function create(Request $req)
    {
        $dto = $this->deserialize($req, AlbumDto::class);
        $this->service->createAlbum($dto);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route(methods={"GET"}, path="/api/albums")
     */
    public function index(): Response
    {
        $data = array_map(function (AlbumDto $dto) {
            $temp = $dto->jsonSerialize();
            $temp['createdAt'] = $dto->getCreatedAt()->format(DateTime::ISO8601);
            $temp['updatedAt'] = $dto->getUpdatedAt()->format(DateTime::ISO8601);
            return $temp;
        }, $this->service->listArticles());

        return new JsonResponse(['data' => $data]);
    }

    /**
     * @Route(methods={"POST"}, path="/api/albums/{albumId}/songs/{songId}")
     */
    public function associateSong(int $albumId, int $songId, Request $req): Response
    {
        $this->service->associateSong($albumId, $songId);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route(methods={"POST"}, path="/api/albums/{albumId}/singer/{singerId}")
     */
    public function associateSinger(int $albumId, int $singerId, Request $req): Response
    {
        $this->service->associateSinger($albumId, $singerId);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }
}
