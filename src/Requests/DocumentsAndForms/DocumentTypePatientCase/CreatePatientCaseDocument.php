<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePatientCase;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientCaseDocument
 *
 * Creates a patient case document record of a specific patient
 */
class CreatePatientCaseDocument extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/patientcase";
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID associated with the uploaded document.
     * @param  string  $documentsource  Explains where this document originated.
     * @param  string  $documentsubclass  Subclasses for PATIENTCASE documents
     * @param  int  $patientid  patientid
     * @param  null|bool  $autoclose  Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
     * @param  null|string  $callbackname  The name of the person to call (if other than patient).
     * @param  null|string  $callbacknumber  The phone number to use to call back the patient (mutually exclusive with callbacknumbertype).
     * @param  null|string  $callbacknumbertype  The phone number type to use to call back the patient (mutually exclusive with callbacknumber).
     * @param  null|int  $clinicalproviderid  The ID of the external provider/lab/pharmacy associated the document.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|bool  $outboundonly  True/false flag indicating the patient case requires an outbound phone call and is not a response to an inbound call.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     * @param  null|string  $subject  The subject of this patient case.
     */
    public function __construct(
        protected int $departmentid,
        protected string $documentsource,
        protected string $documentsubclass,
        protected int $patientid,
        protected ?bool $autoclose = null,
        protected ?string $callbackname = null,
        protected ?string $callbacknumber = null,
        protected ?string $callbacknumbertype = null,
        protected ?int $clinicalproviderid = null,
        protected ?string $internalnote = null,
        protected ?bool $outboundonly = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
        protected ?string $subject = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documentsource' => $this->documentsource,
            'documentsubclass' => $this->documentsubclass,
            'autoclose' => $this->autoclose,
            'callbackname' => $this->callbackname,
            'callbacknumber' => $this->callbacknumber,
            'callbacknumbertype' => $this->callbacknumbertype,
            'clinicalproviderid' => $this->clinicalproviderid,
            'internalnote' => $this->internalnote,
            'outboundonly' => $this->outboundonly,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'subject' => $this->subject,
        ]);
    }
}
