<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentConfirmationStatus;

use ChrisReedIO\AthenaSDK\Data\Appointment\ConfirmationStatusData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * ListAppointmentConfirmationStatuses
 *
 * Retrieve the types of confirmation statuses configured in the system to put on the appointment
 */
class ListAppointmentConfirmationStatuses extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/reference/appointmentconfirmationstatus';
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('status'))
            ->map(fn (array $status) => ConfirmationStatusData::fromArray($status));
    }
}
