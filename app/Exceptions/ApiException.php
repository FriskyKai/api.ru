<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiException extends HttpResponseException
{
    public function __construct($code, $message, $errors = [])
    {
        $data = [
            'error' => [
                'code' => $code,
                'message' => $message,
            ]
        ];

        if (count($errors) > 0) {
            $data['error']['errors'] = $errors;
        }

        parent::__construct(response()->json($data)->setStatusCode($code, $message));
    }
}
