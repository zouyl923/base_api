<?php

namespace App\Controller;

use App\Constants\CommonError;

class BaseController extends AbstractController
{
    /**
     * @param mixed $data
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function success(mixed $data)
    {
        $data = [
            'code' => CommonError::SUCCESS,
            'message' => null,
            'data' => $data
        ];
        return $this->response->json($data);
    }

    /**
     * @param int $code
     * @param string|null $message
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function error(int $code, ?string $message)
    {
        $data = [
            'code' => $code,
            'message' => $message,
            'data' => null
        ];

        return $this->response->json($data);
    }
}