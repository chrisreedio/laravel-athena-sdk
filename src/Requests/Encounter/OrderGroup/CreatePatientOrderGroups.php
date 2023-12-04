<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\OrderGroup;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientOrderGroups
 *
 * Creates an ordergroup for a specific patient chart outside an encounter flow
 */
class CreatePatientOrderGroups extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/ordergroups";
    }

    /**
     * @param int $departmentid The department to use for the order group.
     * @param int $patientid patientid
     * @param null|int $orderingproviderid The ordering provider ID, if not given a random provider from that department will be used.
     * @param null|int $patientcaseid The ID of the patient case generating this new order group.
     */
    public function __construct(
        protected int  $departmentid,
        protected int  $patientid,
        protected ?int $orderingproviderid = null,
        protected ?int $patientcaseid = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'orderingproviderid' => $this->orderingproviderid,
            'patientcaseid' => $this->patientcaseid,
        ]);
    }
}
