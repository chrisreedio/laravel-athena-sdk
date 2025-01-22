<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredPharmacy;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientsPreferredPharmacy
 *
 * Modifies preferred pharmacy for a specific patient chart
 */
class UpdatePatientsPreferredPharmacy extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/pharmacies/preferred";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|int  $clinicalproviderid  The clinical provider ID that you wish to set as the default pharmacy or add as a preferred pharmacy. This or the NCPDPID must be provided.
     * @param  null|int  $ncpdpid  The <a href="http://www.ncpdp.org">NCPDP</a> ID of the clinical provider. Can be used instead of clinicalproviderid. Only one can be used.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?int $clinicalproviderid = null,
        protected ?int $ncpdpid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'clinicalproviderid' => $this->clinicalproviderid,
            'ncpdpid' => $this->ncpdpid,
        ]);
    }
}
