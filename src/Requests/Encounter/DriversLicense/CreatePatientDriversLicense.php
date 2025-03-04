<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DriversLicense;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientDriversLicense
 *
 * Create a record of patient's driving license document
 */
class CreatePatientDriversLicense extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/driverslicense";
    }

    /**
     * @param  string  $image  Base64 encoded image, or, if multipart/form-data, unencoded image. This image may be scaled down after submission. PUT is not recommended when using multipart/form-data. Since POST and PUT have identical functionality, POST is recommended.
     * @param  int  $patientid  patientid
     * @param  null|string  $departmentid  The department ID associated with this upload.
     */
    public function __construct(
        protected string $image,
        protected int $patientid,
        protected ?string $departmentid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'image' => $this->image,
            'departmentid' => $this->departmentid,
        ]);
    }
}
