<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAdminDocument
 *
 * Retrieve an admin document specific to the admin ID
 */
class GetAdminDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/admin/{$this->adminid}";
    }

    /**
     * @param  int  $adminid  adminid
     */
    public function __construct(
        protected int $adminid,
    ) {
    }
}
