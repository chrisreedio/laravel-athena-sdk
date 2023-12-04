<?php

namespace ChrisReedIO\AthenaSDK\Requests\QualityManagementAndPopHealth\QualityMeasures;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateQualityManagementRefresh
 *
 * Refreshes a patient's quality measure records
 */
class CreateQualityManagementRefresh extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/qualitymanagement/refresh";
    }

    /**
     * @param int $departmentid The athenaNet department id.
     * @param int $patientid patientid
     * @param null|int $providerid The ID of the provider. If not specified, the default provider is used -- usually the provider that has seen the patient most often / recently.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?int $providerid = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid
        ]);
    }
}
