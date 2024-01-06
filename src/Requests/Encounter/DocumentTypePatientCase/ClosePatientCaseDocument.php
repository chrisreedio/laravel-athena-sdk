<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * ClosePatientCaseDocument
 *
 * Closes a specific patient case document
 */
class ClosePatientCaseDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/patientcase/{$this->patientcaseid}/close";
    }

    /**
     * @param  int  $actionreasonid Valid Document Action Reason ID for closure of Patient Case.
     * @param  int  $patientcaseid patientcaseid
     * @param  int  $patientid patientid
     */
    public function __construct(
        protected int $actionreasonid,
        protected int $patientcaseid,
        protected int $patientid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionreasonid' => $this->actionreasonid]);
    }
}
