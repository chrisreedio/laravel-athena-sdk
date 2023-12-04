<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeClinicalDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientClinicalDocuments
 *
 * Retrieves a list of clinical document information of a specific patient
 */
class ListPatientClinicalDocuments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/clinicaldocument";
    }

    /**
     * @param int $departmentid The athenaNet department id.
     * @param int $patientid patientid
     * @param null|string $documentsubclass The document subclass to filter document results.
     * @param null|int $encounterid Show only documents attached to this encounter.
     * @param null|bool $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
     * @param null|bool $showdeleted By default, deleted documents are not listed.  Set to list these.
     * @param null|bool $showmetadata When "true" is passed we will return filetype, filesize and originalfilename if applicable
     * @param null|string $status The status of the task to filter document results.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected ?string $documentsubclass = null,
        protected ?int    $encounterid = null,
        protected ?bool   $getentityinfo = null,
        protected ?bool   $showdeleted = null,
        protected ?bool   $showmetadata = null,
        protected ?string $status = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documentsubclass' => $this->documentsubclass,
            'encounterid' => $this->encounterid,
            'getentityinfo' => $this->getentityinfo,
            'showdeleted' => $this->showdeleted,
            'showmetadata' => $this->showmetadata,
            'status' => $this->status,
        ]);
    }
}
