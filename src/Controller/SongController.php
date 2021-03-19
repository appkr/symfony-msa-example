<?php

namespace App\Controller;

use App\Service\Dto\SongDto;
use App\Service\SongService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongController extends BaseController
{
    private $service;

    public function __construct(SongService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route( methods = {"POST"}, path = "/api/songs")
     */
    public function create(Request $req): Response
    {
        $dto = $this->deserialize($req, SongDto::class);
        $this->service->createSong($dto);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route( methods = {"GET"}, path = "/api/songs/{songId}")
     */
    public function show(Request $req, int $songId): Response
    {
        return new JsonResponse($this->service->getSong($songId));
    }
}
