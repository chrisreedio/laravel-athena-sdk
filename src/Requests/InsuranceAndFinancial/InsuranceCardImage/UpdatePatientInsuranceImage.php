<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsuranceCardImage;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * UpdatePatientInsuranceImage
 *
 * Modifies existing patient's insurance-card image
 */
class UpdatePatientInsuranceImage extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/image";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $insuranceid insuranceid
     * @param  string  $image Base64 encoded image, or, if multipart/form-data, unencoded image. This image may be scaled down after submission. PUT is not recommended when using multipart/form-data. Since POST and PUT have identical functionality, POST is recommended.
     * @param  null|string  $departmentid The department ID associated with this upload.
     */
    public function __construct(
        protected int $patientid,
        protected int $insuranceid,
        protected string $image,
        protected ?string $departmentid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['image' => $this->image, 'departmentid' => $this->departmentid]);
    }
}