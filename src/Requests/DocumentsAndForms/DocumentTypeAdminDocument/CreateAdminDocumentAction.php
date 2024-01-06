<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeAdminDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAdminDocumentAction
 *
 * Create a record of an action note on a specific admin document
 */
class CreateAdminDocumentAction extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/admin/{$this->adminid}/actions";
    }

    /**
     * @param  string  $actionnote The new action note to add to the document.
     * @param  int  $adminid adminid
     */
    public function __construct(
        protected string $actionnote,
        protected int $adminid,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
