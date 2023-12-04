<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientChangeSubscription
 *
 * Subscribes for changed patients events
 */
class CreatePatientChangeSubscription extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/patients/changed/subscription';
    }

    /**
     * @param null|array $departmentids For every New/Update Subscriptions complete list of departmentids should be passed. NOTE: Without DepartmentIDs entire Context/Practice will be subscribed.
     * @param null|string $eventname By default, you are subscribed to all possible events.  If you only wish to subscribe to an individual event, pass the event name with this argument.
     */
    public function __construct(
        protected ?array $departmentids = null,
        protected ?string $eventname = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentids' => $this->departmentids,
            'eventname' => $this->eventname
        ]);
    }
}
