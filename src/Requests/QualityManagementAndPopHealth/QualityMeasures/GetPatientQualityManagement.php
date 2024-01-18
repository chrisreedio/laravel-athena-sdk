<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityMeasures;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientQualityManagement
 *
 * Retrieves the list of quality measures for a given provider
 */
class GetPatientQualityManagement extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/qualitymanagement";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|string  $measuretype  Optional filter to only get clinical guidelines or pay for performance results.
     * @param  null|int  $providerid  The ID of the provider. If not specified, the default provider is used -- usually the provider that has seen the patient most often / recently.
     * @param  null|string  $status  Optional filter to only get results with this status
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?string $measuretype = null,
        protected ?int $providerid = null,
        protected ?string $status = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'measuretype' => $this->measuretype,
            'providerid' => $this->providerid,
            'status' => $this->status,
        ]);
    }
}
