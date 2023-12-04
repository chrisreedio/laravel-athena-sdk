<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePhoneMessage;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPhoneMessages
 *
 * Retrieves a list of phone message documents for a given department
 */
class ListPhoneMessages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/documents/phonemessage';
    }

    /**
     * @param  null|bool  $showdeleted Allow documents that have been deleted to be returned.
     * @param  null|string  $status Show only documents of this status.  CLOSED will also set SHOWCLOSED to true.  DELETED will set SHOWDELETED to true.
     * @param  string  $startdate The start date in a range (mm/dd/yyyy).
     * @param  null|bool  $showdocumentswithpatientid Allow documents with patient IDs assigned to be returned.
     * @param  string  $enddate The end date in a range (mm/dd/yyyy).
     * @param  null|int  $providerid The ID of the ordering provider.
     * @param  int  $departmentid The athenaNet department ID associated with the uploaded document.
     * @param  null|bool  $showclosed Allow documents in the CLOSED status to be returned.
     */
    public function __construct(
        protected ?bool $showdeleted,
        protected ?string $status,
        protected string $startdate,
        protected ?bool $showdocumentswithpatientid,
        protected string $enddate,
        protected ?int $providerid,
        protected int $departmentid,
        protected ?bool $showclosed = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showdeleted' => $this->showdeleted,
            'status' => $this->status,
            'startdate' => $this->startdate,
            'showdocumentswithpatientid' => $this->showdocumentswithpatientid,
            'enddate' => $this->enddate,
            'providerid' => $this->providerid,
            'departmentid' => $this->departmentid,
            'showclosed' => $this->showclosed,
        ]);
    }
}
