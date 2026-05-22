<?php

namespace App\Http\Responses;

use App\DTOs\Response\APIResponsePayloadDTO;

class APIResponse
{
    public static function make(
        APIResponsePayloadDTO $payload,
        int $statusCode
    ) : \Illuminate\Http\JsonResponse
    {
        return response()->json(
            $payload->toArray(),
            $statusCode
        );
    }
}
