<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsVisit;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateVisitCharge
 *
 * Create a record of visit charge to a Hospital visit
 */
class CreateVisitCharge extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/visits/{$this->visitid}/visitcharge";
    }

    /**
     * @param  string  $chargedate  Date of the charge. Formatted as MM/DD/YYYY.
     * @param  array  $visitcharges  An array of charges to be added to a Visit.
     * @param  int  $visitid  visitid
     * @param  null|int  $renderingproviderid  The rendering provider's ID.
     * @param  null|int  $servicedepartmentid  The department where the service happened.
     * @param  null|string  $username  Username of who is creating the charge.
     */
    public function __construct(
        protected string $chargedate,
        protected array $visitcharges,
        protected int $visitid,
        protected ?int $renderingproviderid = null,
        protected ?int $servicedepartmentid = null,
        protected ?string $username = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'chargedate' => $this->chargedate,
            'visitcharges' => $this->visitcharges,
            'renderingproviderid' => $this->renderingproviderid,
            'servicedepartmentid' => $this->servicedepartmentid,
            'username' => $this->username,
        ]);
    }
}
