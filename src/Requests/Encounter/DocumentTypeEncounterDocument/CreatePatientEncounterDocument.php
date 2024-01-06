<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeEncounterDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientEncounterDocument
 *
 * Creates a document record of a specific patient
 */
class CreatePatientEncounterDocument extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/encounterdocument";
    }

    /**
     * @param  int  $departmentid The athenaNet department ID associated with the uploaded document.
     * @param  string  $documentsubclass Subclasses for ENCOUNTERDOCUMENT documents
     * @param  int  $patientid patientid
     * @param  null|int  $appointmentid The appointment ID for this document
     * @param  null|string  $attachmentcontents The file contents that will be attached to this document. PDFs are recommended.
     * @param  null|string  $documentdata Text data stored with document
     * @param  null|int  $encounterid The encounter ID
     * @param  null|string  $entityid Identifier of entity creating the document. entitytype is required while passing entityid.
     * @param  null|string  $entitytype Type of entity creating the document. entityid is required while passing entitytype.
     * @param  null|string  $internalnote An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $priority Priority of this result.  1 is high; 2 is normal.
     */
    public function __construct(
        protected int $departmentid,
        protected string $documentsubclass,
        protected int $patientid,
        protected ?int $appointmentid = null,
        protected ?string $attachmentcontents = null,
        protected ?string $documentdata = null,
        protected ?int $encounterid = null,
        protected ?string $entityid = null,
        protected ?string $entitytype = null,
        protected ?string $internalnote = null,
        protected ?string $priority = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documentsubclass' => $this->documentsubclass,
            'appointmentid' => $this->appointmentid,
            'attachmentcontents' => $this->attachmentcontents,
            'documentdata' => $this->documentdata,
            'encounterid' => $this->encounterid,
            'entityid' => $this->entityid,
            'entitytype' => $this->entitytype,
            'internalnote' => $this->internalnote,
            'priority' => $this->priority,
        ]);
    }
}
