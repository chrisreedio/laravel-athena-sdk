<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientProcedures;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayProceduresPlanned
 *
 * Retrieves a list of planned procedures for a specific patient stay in the hospital
 */
class ListStayProceduresPlanned extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/procedures/planned";
    }

    /**
     * @param int $stayid stayid
     */
    public function __construct(
        protected int $stayid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
