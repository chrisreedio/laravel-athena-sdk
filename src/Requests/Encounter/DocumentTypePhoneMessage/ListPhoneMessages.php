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
     * @param  int  $departmentid  The athenaNet department ID associated with the uploaded document.
     * @param  string  $enddate  The end date in a range (mm/dd/yyyy).
     * @param  string  $startdate  The start date in a range (mm/dd/yyyy).
     * @param  null|int  $providerid  The ID of the ordering provider.
     * @param  null|bool  $showclosed  Allow documents in the CLOSED status to be returned.
     * @param  null|bool  $showdeleted  Allow documents that have been deleted to be returned.
     * @param  null|bool  $showdocumentswithpatientid  Allow documents with patient IDs assigned to be returned.
     * @param  null|string  $status  Show only documents of this status.  CLOSED will also set SHOWCLOSED to true.  DELETED will set SHOWDELETED to true.
     */
    public function __construct(
        protected int $departmentid,
        protected string $startdate,
        protected string $enddate,
        protected ?int $providerid = null,
        protected ?bool $showclosed = null,
        protected ?bool $showdeleted = null,
        protected ?bool $showdocumentswithpatientid = null,
        protected ?string $status = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'enddate' => $this->enddate,
            'startdate' => $this->startdate,
            'providerid' => $this->providerid,
            'showclosed' => $this->showclosed,
            'showdeleted' => $this->showdeleted,
            'showdocumentswithpatientid' => $this->showdocumentswithpatientid,
            'status' => $this->status,
        ]);
    }
}
