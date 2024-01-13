<?php

namespace ChrisReedIO\AthenaSDK\Traits;

use Saloon\Http\Response;

trait SimpleJsonResponse
{
    public function createDtoFromResponse(Response $response): array
    {
        return $response->json();
    }
}
