<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientProcedures;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayProceduresPerformed
 *
 * Retrieves a list of procedures performed on a patient during the specific stay in the hospital.
 */
class ListStayProceduresPerformed extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/procedures/performed";
    }

    /**
     * @param  int  $stayid stayid
     */
    public function __construct(
        protected int $stayid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
