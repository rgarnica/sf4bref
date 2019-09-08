<?php

declare(strict_types=1);

namespace App\Controller\Api;


use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 * @package App\Controller\Api
 * @Route("/")
 */
class HomeController
{
    public function __invoke()
    {
        return new JsonResponse([
            'message' => 'API build was successful',
        ]);
    }
}