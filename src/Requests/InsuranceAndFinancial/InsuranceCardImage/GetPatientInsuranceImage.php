<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\InsuranceCardImage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientInsuranceImage
 *
 * Retrieve the patient's insurance card image
 */
class GetPatientInsuranceImage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/insurances/{$this->insuranceid}/image";
    }

    /**
     * @param int $insuranceid insuranceid
     * @param int $patientid patientid
     * @param null|string $jpegoutput If set to true, or if Accept header is image/jpeg, returns the image directly.  (The image may be scaled.)
     */
    public function __construct(
        protected int     $insuranceid,
        protected int     $patientid,
        protected ?string $jpegoutput = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['jpegoutput' => $this->jpegoutput]);
    }
}
