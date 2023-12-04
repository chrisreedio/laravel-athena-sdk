<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\PrescriptionCardImage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreateOrUpdatePatientInsurancePrescriptionCard
 *
 * Add a new refferal authorization.
 */
class CreateOrUpdatePatientInsurancePrescriptionCard extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/prescription/card";
    }

    /**
     * @param  int  $patientid patientid
     * @param  string  $image Base64 encoded image, or, if multipart/form-data, unencoded image. This image may be scaled down after submission. PUT is not recommended when using multipart/form-data. Since POST and PUT have identical functionality, POST is recommended.
     */
    public function __construct(
        protected int $patientid,
        protected string $image,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['image' => $this->image]);
    }
}
