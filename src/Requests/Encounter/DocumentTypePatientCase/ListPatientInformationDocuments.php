<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePatientCase;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientInformationDocuments
 *
 * Retrieve a list of patient information documents
 */
class ListPatientInformationDocuments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/patientinfo";
    }

    /**
     * @param  int  $departmentid  The athenaNet department id.
     * @param  int  $patientid  patientid
     * @param  null|string  $documentclass  The class(es) of document(s) comma separated.
     * @param  null|string  $documentsubclass  The document subclass to filter document results.
     * @param  null|int  $encounterid  Show only documents attached to this encounter.
     * @param  null|string  $enddate  An optional filter to specify the end of the documents search date range (MM/DD/YYYY). Inclusive.
     * @param  null|bool  $showdeclinedorders  If set, include orders that were declined
     * @param  null|bool  $showdeleted  By default, deleted documents are not listed.  Set to list these.
     * @param  null|string  $startdate  An optional filter to specify the start of the documents search date range (MM/DD/YYYY). Inclusive.
     * @param  null|string  $status  The status of the task to filter document results.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?string $documentclass = null,
        protected ?string $documentsubclass = null,
        protected ?int $encounterid = null,
        protected ?string $enddate = null,
        protected ?bool $showdeclinedorders = null,
        protected ?bool $showdeleted = null,
        protected ?string $startdate = null,
        protected ?string $status = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'documentclass' => $this->documentclass,
            'documentsubclass' => $this->documentsubclass,
            'encounterid' => $this->encounterid,
            'enddate' => $this->enddate,
            'showdeclinedorders' => $this->showdeclinedorders,
            'showdeleted' => $this->showdeleted,
            'startdate' => $this->startdate,
            'status' => $this->status,
        ]);
    }
}
