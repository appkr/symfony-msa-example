<?php

namespace App\Controller;

use App\Service\SingerService;
use App\Service\Dto\SingerDto;
use DateTime;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SingerController extends BaseController
{
    private $service;

    public function __construct(SingerService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route( methods = {"POST"}, path = "/api/singers")
     */
    public function create(Request $req): Response
    {
        $dto = $this->deserialize($req, SingerDto::class);
        $this->service->createSinger($dto);

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * @Route( methods = {"GET"}, path = "/api/singers")
     */
    public function listSingers(): Response
    {
//        $data = array_map(function (SingerDto $dto) {
//            $temp = $dto->jsonSerialize();
//            $temp['createdAt'] = $dto->getCreatedAt()->format(DateTime::ISO8601);
//            $temp['updatedAt'] = $dto->getUpdatedAt()->format(DateTime::ISO8601);
//            return $temp;
//        }, $this->service->listSingers());

        return new JsonResponse(['data' => $this->service->listSingers()]);
    }
}
