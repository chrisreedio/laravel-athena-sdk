<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhoneMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientPhoneMessagePage
 *
 * Retrieves a specific page from the specific phone message document for the patient
 */
class GetPatientPhoneMessagePage extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/phonemessage/{$this->phonemessageid}/pages/{$this->pageid}";
    }

    /**
     * @param  int  $pageid pageid
     * @param  int  $patientid patientid
     * @param  int  $phonemessageid phonemessageid
     * @param  null|string  $filesize The file size of the document being requested.
     */
    public function __construct(
        protected int $pageid,
        protected int $patientid,
        protected int $phonemessageid,
        protected ?string $filesize = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter(['filesize' => $this->filesize]);
    }
}
