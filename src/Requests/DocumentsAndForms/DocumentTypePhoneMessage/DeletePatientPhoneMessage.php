<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhoneMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * DeletePatientPhoneMessage
 *
 * Deletes the record of a specified phone message document
 */
class DeletePatientPhoneMessage extends Request
{
    protected Method $method = Method::DELETE;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/phonemessage/{$this->phonemessageid}";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  int  $phonemessageid  phonemessageid
     */
    public function __construct(
        protected int $patientid,
        protected int $phonemessageid,
    ) {
    }
}
