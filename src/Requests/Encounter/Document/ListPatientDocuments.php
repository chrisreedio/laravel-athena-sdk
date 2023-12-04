<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Document;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientDocuments
 *
 * Retrieve a list of documents for a specific patient
 */
class ListPatientDocuments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|bool  $showdeleted By default, deleted documents are not listed.  Set to list these.
     * @param  null|string  $status The status of the task to filter document results.
     * @param  null|string  $startdate An optional filter to specify the start of the documents search date range (MM/DD/YYYY). Inclusive.
     * @param  null|bool  $getentityinfo If true, entityid and entitytype will be returned. entityid will be populated in createduser attribute.
     * @param  null|int  $encounterid Show only documents attached to this encounter.
     * @param  null|string  $documentsubclass The document subclass to filter document results.
     * @param  null|bool  $showdeclinedorders If set, include orders that were declined
     * @param  null|string  $documentclass The class(es) of document(s) comma separated.
     * @param  null|string  $enddate An optional filter to specify the end of the documents search date range (MM/DD/YYYY). Inclusive.
     * @param  int  $departmentid The athenaNet department id.
     * @param  null|bool  $showmetadata When "true" is passed we will return filetype, filesize and originalfilename if applicable
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $showdeleted,
        protected ?string $status,
        protected ?string $startdate,
        protected ?bool $getentityinfo,
        protected ?int $encounterid,
        protected ?string $documentsubclass,
        protected ?bool $showdeclinedorders,
        protected ?string $documentclass,
        protected ?string $enddate,
        protected int $departmentid,
        protected ?bool $showmetadata = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showdeleted' => $this->showdeleted,
            'status' => $this->status,
            'startdate' => $this->startdate,
            'getentityinfo' => $this->getentityinfo,
            'encounterid' => $this->encounterid,
            'documentsubclass' => $this->documentsubclass,
            'showdeclinedorders' => $this->showdeclinedorders,
            'documentclass' => $this->documentclass,
            'enddate' => $this->enddate,
            'departmentid' => $this->departmentid,
            'showmetadata' => $this->showmetadata,
        ]);
    }
}
