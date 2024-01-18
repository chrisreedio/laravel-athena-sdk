<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreateInpatientAdminDocument
 *
 * BETA: Creates a admin document record of a specific patient in the hospital
 */
class CreateInpatientAdminDocument extends Request implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/inpatient/document/admin';
    }

    /**
     * @param  string  $attachmentcontents  The file that will become the document. Currently only a base 64 encoded pdf is supported.
     * @param  int  $departmentid  The department id associated with the document.
     * @param  int  $patientid  The patient ID.
     * @param  null|int  $documentlabelid  The type of document being uploaded (this is the label that will be displayed to the user). Use GET /inpatient/configuration/documentlabels to search for valid IDs.
     * @param  null|string  $observationdatetime  If this document is tied to a clinical event it is the date the event occurred. Please use the format YYYY-M-DThh:mi:ss
     * @param  null|int  $stayid  The stay ID associated with the document.
     */
    public function __construct(
        protected string $attachmentcontents,
        protected int $departmentid,
        protected int $patientid,
        protected ?int $documentlabelid = null,
        protected ?string $observationdatetime = null,
        protected ?int $stayid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'attachmentcontents' => $this->attachmentcontents,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'documentlabelid' => $this->documentlabelid,
            'observationdatetime' => $this->observationdatetime,
            'stayid' => $this->stayid,
        ]);
    }
}
