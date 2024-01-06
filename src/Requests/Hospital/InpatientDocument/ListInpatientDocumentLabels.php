<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientDocument;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListInpatientDocumentLabels
 *
 * BETA: Retrieve the configured list of document labels that can be attached to unpatient documents.
 */
class ListInpatientDocumentLabels extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/inpatient/configuration/documentlabels';
    }

    /**
     * @param  string  $documentclass The document class to get the label for.
     * @param  string  $searchvalue Search by the name of the document label, at least 3 characters are required.
     */
    public function __construct(
        protected string $documentclass,
        protected string $searchvalue,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'documentclass' => $this->documentclass,
            'searchvalue' => $this->searchvalue,
        ]);
    }
}
