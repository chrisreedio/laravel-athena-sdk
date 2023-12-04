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
     * @param int $clinicalproviderid The clinical provider ID that you wish to add.
     * @param int $departmentid The athenaNet department id.
     * @param int $patientid patientid
     */
    public function __construct(
        protected int $clinicalproviderid,
        protected int $departmentid,
        protected int $patientid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'clinicalproviderid' => $this->clinicalproviderid,
            'departmentid' => $this->departmentid
        ]);
    }
}
