<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Document;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientDocument
 *
 * Create a document in patient's chart based on the document subclass
 */
class CreatePatientDocument extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents";
    }

    /**
     * @param  int  $patientid patientid
     * @param  string  $attachmentcontents The file that will become the document. PDFs are recommended. Generally, this implies that this is a multipart/form-data content-type submission. This does NOT work correctly in I/O Docs. The filename itself is not used by athenaNet, but it is required to be sent.
     * @param  string  $documentsubclass The document subclass.
     * @param  null|string  $actionnote Any note to accompany the creation of this document.
     * @param  null|int  $appointmentid The appointment ID associated with this document, for certain document classes. These can only be uploaded AFTER check-in. The department ID is looked up from the appointment. (Department ID takes precedence if both are supplied.)
     * @param  null|string  $attachmenttype The file type of the attachment.
     * @param  null|bool  $autoclose Documents will, normally, automatically appear in the clinical inbox for providers to review. In some cases, you might want to force the document to skip the clinical inbox, and go directly to the patient chart with a "closed" status. For that case, set this to true.
     * @param  null|int  $departmentid The department ID associated with the uploaded document. Except when appointmentid is supplied, this is required.
     * @param  null|string  $entityid Identifier of entity creating the document. entitytype is required while passing entityid.
     * @param  null|string  $entitytype Type of entity creating the document. entityid is required while passing entitytype.
     * @param  null|string  $internalnote The 'Internal Note' attached to this document
     * @param  null|string  $originalfilename The original file name of this document without the file extension. Filename should not exceed 200 characters.
     * @param  null|int  $providerid The provider ID attached to this document. This populates the provider name field.
     */
    public function __construct(
        protected int $patientid,
        protected string $attachmentcontents,
        protected string $documentsubclass,
        protected ?string $actionnote = null,
        protected ?int $appointmentid = null,
        protected ?string $attachmenttype = null,
        protected ?bool $autoclose = null,
        protected ?int $departmentid = null,
        protected ?string $entityid = null,
        protected ?string $entitytype = null,
        protected ?string $internalnote = null,
        protected ?string $originalfilename = null,
        protected ?int $providerid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'attachmentcontents' => $this->attachmentcontents,
            'documentsubclass' => $this->documentsubclass,
            'actionnote' => $this->actionnote,
            'appointmentid' => $this->appointmentid,
            'attachmenttype' => $this->attachmenttype,
            'autoclose' => $this->autoclose,
            'departmentid' => $this->departmentid,
            'entityid' => $this->entityid,
            'entitytype' => $this->entitytype,
            'internalnote' => $this->internalnote,
            'originalfilename' => $this->originalfilename,
            'providerid' => $this->providerid,
        ]);
    }
}
