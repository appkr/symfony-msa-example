<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BaseController extends AbstractController
{
    protected function deserialize(Request $req, string $class)
    {
        return (new \JsonMapper())->map(json_decode($req->getContent()), new $class());
    }
}
