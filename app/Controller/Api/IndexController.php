<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Constants\ApiError;
use App\Controller\BaseController;
use Hyperf\HttpServer\Annotation\AutoController;
use Hyperf\HttpServer\Contract\ResponseInterface;

#[AutoController]
class IndexController extends BaseController
{
    public function index(ResponseInterface $response): \Psr\Http\Message\ResponseInterface
    {
        return $response->json([
            'code' => ApiError::SUCCESS,
            'message' => 'ok'
        ]);
    }
}
