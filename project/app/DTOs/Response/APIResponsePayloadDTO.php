<?php

namespace App\DTOs\Response;

use App\Contracts\Array\IArrayable;


readonly class APIResponsePayloadDTO implements IArrayable
{
    public function __construct(
        public bool $success,
        public string $message,
        public mixed $data = [],
        public array $errors = [],
    ) {}

    public function toArray(): array
    {
        return [
            "success" => $this->success,
            "message" => $this->message,
            "data" => $this->data,
            "errors" => $this->errors,
        ];
    }
}
