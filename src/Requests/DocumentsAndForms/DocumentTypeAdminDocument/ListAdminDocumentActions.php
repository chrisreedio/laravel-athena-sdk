<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAdminDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAdminDocumentActions
 *
 * Retrieve a list of all action notes on a specific admin document
 */
class ListAdminDocumentActions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/admin/{$this->adminid}/actions";
    }

    /**
     * @param  int  $adminid  adminid
     */
    public function __construct(
        protected int $adminid,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
