<?php

namespace App\Services\External;

use Illuminate\Support\Facades\Http;

class AddressService
{
    private readonly string $baseUrl;
    public function __construct()
    {
        $this->baseUrl = "servicodados.ibge.gov.br/api/v1";
    }

    public function getAllStates(){
        $url = $this->baseUrl . "/localidades/estados?orderBy=nome";
        $response = Http::get($url);
        return $response->json();
    }
}
