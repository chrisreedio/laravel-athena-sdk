<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ListPatientChangeSubscriptions
 *
 * Retrieves list of events applicable for patients changed
 */
class ListPatientChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patients/changed/subscription';
    }

    public function __construct()
    {
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        dd($response->json());
    }
}
