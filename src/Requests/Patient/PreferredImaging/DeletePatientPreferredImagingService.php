<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredImaging;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientPreferredImagingService
 *
 * Deletes the preferred imaging facility for a specific patient chart
 */
class DeletePatientPreferredImagingService extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/imaging/preferred";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $clinicalproviderid The clinical provider ID that you wish to add.
     * @param  int  $departmentid The athenaNet department id.
     */
    public function __construct(
        protected int $patientid,
        protected int $clinicalproviderid,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['clinicalproviderid' => $this->clinicalproviderid, 'departmentid' => $this->departmentid]);
    }
}
