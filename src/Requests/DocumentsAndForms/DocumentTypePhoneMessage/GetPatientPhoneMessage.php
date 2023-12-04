<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhoneMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPhoneMessage
 *
 * Retrieves a specific phone message document information
 */
class GetPatientPhoneMessage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/phonemessage/{$this->phonemessageid}";
    }

    /**
     * @param int $patientid patientid
     * @param int $phonemessageid phonemessageid
     */
    public function __construct(
        protected int $patientid,
        protected int $phonemessageid,
    )
    {
    }
}
