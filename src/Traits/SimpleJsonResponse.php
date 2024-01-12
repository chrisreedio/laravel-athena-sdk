<?php

namespace ChrisReedIO\AthenaSDK\Traits;

use Illuminate\Support\Collection;
use Saloon\Http\Response;

trait SimpleJsonResponse
{
    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
