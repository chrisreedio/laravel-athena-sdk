<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\PreferredImaging;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientPreferredImagingService
 *
 * Modifies preferred imaging facility for a specific patient chart
 */
class UpdatePatientPreferredImagingService extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/imaging/preferred";
    }

    /**
     * @param  int  $clinicalproviderid  The clinical provider ID that you wish to add.
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected int $clinicalproviderid,
        protected int $departmentid,
        protected int $patientid,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'clinicalproviderid' => $this->clinicalproviderid,
            'departmentid' => $this->departmentid,
        ]);
    }
}
