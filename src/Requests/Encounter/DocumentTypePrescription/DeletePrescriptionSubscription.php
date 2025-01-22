<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePrescriptionSubscription
 *
 * Delete an specific event which is no longer required Note: This endpoint may rely on specific
 * settings to be enabled in athenaNet Production to function properly that are not required in other
 * environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class DeletePrescriptionSubscription extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return '/prescriptions/changed/subscription';
    }

    /**
     * @param  null|string  $eventname  By default, you are unsubscribed from all possible events.  If you only wish to unsubscribe from an individual event, pass the event name with this argument.
     */
    public function __construct(
        protected ?string $eventname = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['eventname' => $this->eventname]);
    }
}
