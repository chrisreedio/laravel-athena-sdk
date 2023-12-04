<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\MedicareSecondaryPayerMsp;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentSpecificMspQualifiers
 *
 * Retrieves a list of valid Medicare Secondary Payer insurance (MSP) types to be used for the MSP
 * Qualifier
 */
class ListAppointmentSpecificMspQualifiers extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/mspinsurancetypes';
    }

    /**
     * @param  null|int  $departmentid The department id
     */
    public function __construct(
        protected ?int $departmentid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
