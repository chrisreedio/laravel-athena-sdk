<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\PatientPhoto;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPhoto
 *
 * Retrieves patient's image record
 */
class GetPatientPhoto extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/photo";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|string  $jpegoutput If set to true, or if Accept header is image/jpeg, returns the image directly.  (The image may be scaled.)
     */
    public function __construct(
        protected int $patientid,
        protected ?string $jpegoutput = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['jpegoutput' => $this->jpegoutput]);
    }
}
