<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeOrder;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreatePatientSignedOrderDocument
 *
 * Document a signed order on a patient chart. Note: This endpoint should not be used to document
 * prescription or vaccine orders.
 */
class CreatePatientSignedOrderDocument extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/signedorder";
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID associated with the uploaded document.
     * @param  int  $documenttypeid  A specific document type identifier.
     * @param  int  $patientid  patientid
     * @param  null|string  $attachmentcontents  The file contents that will be attached to this document. PDFs are recommended.
     * @param  null|int  $facilityid  The ID of the external provider/lab/pharmacy associated the document.
     * @param  null|string  $internalnote  An internal note for the provider or staff. Updating this will append to any previous notes.
     * @param  null|string  $priority  Priority of this result.  1 is high; 2 is normal.
     * @param  null|int  $providerid  The ID of the ordering provider.
     * @param  null|string  $snomedcode  The snomed code associated with this order document.
     */
    public function __construct(
        protected int $departmentid,
        protected int $documenttypeid,
        protected int $patientid,
        protected ?string $attachmentcontents = null,
        protected ?int $facilityid = null,
        protected ?string $internalnote = null,
        protected ?string $priority = null,
        protected ?int $providerid = null,
        protected ?string $snomedcode = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documenttypeid' => $this->documenttypeid,
            'attachmentcontents' => $this->attachmentcontents,
            'facilityid' => $this->facilityid,
            'internalnote' => $this->internalnote,
            'priority' => $this->priority,
            'providerid' => $this->providerid,
            'snomedcode' => $this->snomedcode,
        ]);
    }
}
