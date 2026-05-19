<?php

namespace App\Contracts\Array;

interface ICreateByArray
{
    public static function fromArray(array $data): self;
}
