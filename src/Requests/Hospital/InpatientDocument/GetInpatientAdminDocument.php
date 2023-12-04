<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetInpatientAdminDocument
 *
 * BETA: Retrieves a specific administrative document.
 */
class GetInpatientAdminDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/inpatient/document/admin/{$this->admindocumentid}";
    }

    /**
     * @param int $admindocumentid admindocumentid
     */
    public function __construct(
        protected int $admindocumentid,
    )
    {
    }
}
