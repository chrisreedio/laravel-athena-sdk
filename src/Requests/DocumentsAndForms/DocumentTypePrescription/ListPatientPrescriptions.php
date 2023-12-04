<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypePrescription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientPrescriptions
 *
 * Retrieves a list of prescription document information for a specific patient
 */
class ListPatientPrescriptions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/prescription";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|bool  $showdeleted By default, deleted documents are not listed.  Set to list these.
     * @param  null|string  $status The status of the task to filter document results.
     * @param  null|string  $startdate An optional filter to specify the start of the documents search date range (MM/DD/YYYY). Inclusive.
     * @param  null|int  $encounterid Show only documents attached to this encounter.
     * @param  null|string  $documentsubclass The document subclass to filter document results.
     * @param  null|bool  $showdeclinedorders If set, include orders that were declined
     * @param  null|string  $documentclass The class(es) of document(s) comma separated.
     * @param  null|string  $enddate An optional filter to specify the end of the documents search date range (MM/DD/YYYY). Inclusive.
     * @param  int  $departmentid The athenaNet department id.
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $showdeleted,
        protected ?string $status,
        protected ?string $startdate,
        protected ?int $encounterid,
        protected ?string $documentsubclass,
        protected ?bool $showdeclinedorders,
        protected ?string $documentclass,
        protected ?string $enddate,
        protected int $departmentid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showdeleted' => $this->showdeleted,
            'status' => $this->status,
            'startdate' => $this->startdate,
            'encounterid' => $this->encounterid,
            'documentsubclass' => $this->documentsubclass,
            'showdeclinedorders' => $this->showdeclinedorders,
            'documentclass' => $this->documentclass,
            'enddate' => $this->enddate,
            'departmentid' => $this->departmentid,
        ]);
    }
}
