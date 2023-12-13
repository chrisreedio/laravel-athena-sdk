<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use ChrisReedIO\AthenaSDK\Data\SubscriptionEventData;
use Illuminate\Support\Collection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;
use function collect;

/**
 * ListAppointmentChangeSubscriptions
 *
 * Retrieves  the list of events appointment slots which are modified
 */
class ListAppointmentChangeSubscriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/appointments/changed/subscription';
    }

    /**
     * @param  null|bool  $includeremindercall If this is set, we will include the UpdateRemiderCall event as if it is one of the default events. Otherwise we will ignore that it exists.
     * @param  null|bool  $includesuggestedoverbooking If this is set, we will include the UpdateSuggestedOverbooking event as if it is one of the default events. Otherwise we will ignore that it exists.
     */
    public function __construct(
        protected ?bool $includeremindercall = null,
        protected ?bool $includesuggestedoverbooking = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'includeremindercall' => $this->includeremindercall,
            'includesuggestedoverbooking' => $this->includesuggestedoverbooking,
        ]);
    }

    public function createDtoFromResponse(Response $response): Collection
    {
        return collect($response->json('subscriptions'))
            ->map(fn($item) => SubscriptionEventData::fromArray($item));
    }
}
