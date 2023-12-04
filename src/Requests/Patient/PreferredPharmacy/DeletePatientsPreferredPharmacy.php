<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredPharmacy;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientsPreferredPharmacy
 *
 * Deletes the preferred pharmacy for a specific patient chart
 */
class DeletePatientsPreferredPharmacy extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/pharmacies/preferred";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|int  $clinicalproviderid The clinical provider ID that you wish to set as the default pharmacy or add as a preferred pharmacy. This or the NCPDPID must be provided.
     * @param  int  $departmentid The athenaNet department id.
     * @param  null|int  $ncpdpid The <a href="http://www.ncpdp.org">NCPDP</a> ID of the clinical provider. Can be used instead of clinicalproviderid. Only one can be used.
     */
    public function __construct(
        protected int $patientid,
        protected ?int $clinicalproviderid,
        protected int $departmentid,
        protected ?int $ncpdpid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['clinicalproviderid' => $this->clinicalproviderid, 'departmentid' => $this->departmentid, 'ncpdpid' => $this->ncpdpid]);
    }
}
