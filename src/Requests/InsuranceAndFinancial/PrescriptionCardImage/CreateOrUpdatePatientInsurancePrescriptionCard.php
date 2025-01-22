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
     * @param  string  $image  Base64 encoded image, or, if multipart/form-data, unencoded image. This image may be scaled down after submission. PUT is not recommended when using multipart/form-data. Since POST and PUT have identical functionality, POST is recommended.
     * @param  int  $patientid  patientid
     */
    public function __construct(
        protected string $image,
        protected int $patientid,
    ) {}

    public function defaultBody(): array
    {
        return array_filter(['image' => $this->image]);
    }
}
