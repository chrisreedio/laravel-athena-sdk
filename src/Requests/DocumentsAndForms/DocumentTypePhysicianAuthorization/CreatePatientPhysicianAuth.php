<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePhysicianAuthorization;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientPhysicianAuth
 *
 * Physician authorization document.
 */
class CreatePatientPhysicianAuth extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/physicianauth";
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID associated with the uploaded document.
     * @param  string  $documentsubclass  Subclasses for PHYSICIANAUTH documents
     * @param  int  $patientid  patientid
     * @param  null|string  $attachmentcontents  The file contents that will be attached to this document. PDFs are recommended.
     * @param  null|bool  $autoclose  Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
     * @param  null|int  $clinicalproviderid  The ID of the external provider/lab/pharmacy associated the document.
     * @param  null|int  $documenttypeid  A specific document type identifier.
     * @param  null|string  $faxnumber  Fax number of the sending clinical provider.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     */
    public function __construct(
        protected int $departmentid,
        protected string $documentsubclass,
        protected int $patientid,
        protected ?string $attachmentcontents = null,
        protected ?bool $autoclose = null,
        protected ?int $clinicalproviderid = null,
        protected ?int $documenttypeid = null,
        protected ?string $faxnumber = null,
        protected ?string $internalnote = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documentsubclass' => $this->documentsubclass,
            'attachmentcontents' => $this->attachmentcontents,
            'autoclose' => $this->autoclose,
            'clinicalproviderid' => $this->clinicalproviderid,
            'documenttypeid' => $this->documenttypeid,
            'faxnumber' => $this->faxnumber,
            'internalnote' => $this->internalnote,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
        ]);
    }
}
