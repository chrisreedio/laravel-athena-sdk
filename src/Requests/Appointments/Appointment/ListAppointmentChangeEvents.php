<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ListAppointmentChangeEvents
 *
 * Retrieves list of events for appointments or an appointment slots
 */
class ListAppointmentChangeEvents extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/changed/subscription/events';
    }

    public function createDtoFromResponse(Response $response): array
    {
        // dd($response->json('subscriptions'));
        return collect($response->json('subscriptions'))->flatten()->all();
    }

    public function __construct()
    {

    }
}
