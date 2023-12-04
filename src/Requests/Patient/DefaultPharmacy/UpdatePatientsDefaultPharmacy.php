<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\DefaultPharmacy;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientsDefaultPharmacy
 *
 * Modifies patient's default pharmacy information
 */
class UpdatePatientsDefaultPharmacy extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/pharmacies/default";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The athenaNet department id.
     * @param  null|int  $ncpdpid The <a href="http://www.ncpdp.org">NCPDP</a> ID of the clinical provider. Can be used instead of clinicalproviderid. Only one can be used.
     * @param  null|int  $clinicalproviderid The clinical provider ID that you wish to set as the default pharmacy or add as a preferred pharmacy. This or the NCPDPID must be provided.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected ?int $ncpdpid = null,
        protected ?int $clinicalproviderid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'ncpdpid' => $this->ncpdpid, 'clinicalproviderid' => $this->clinicalproviderid]);
    }
}
