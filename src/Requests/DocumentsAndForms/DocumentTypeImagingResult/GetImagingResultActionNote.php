<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeImagingResult;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetImagingResultActionNote
 *
 * Retrieves action note information of a specific imaging results document
 */
class GetImagingResultActionNote extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/documents/imagingresult/{$this->imagingresultid}/actions";
    }

    /**
     * @param  int  $imagingresultid imagingresultid
     */
    public function __construct(
        protected int $imagingresultid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([]);
    }
}
