<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeImagingResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateImagingResultActionNote
 *
 * Creates an action note for a specific imaging results document
 */
class CreateImagingResultActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/imagingresult/{$this->imagingresultid}/actions";
    }

    /**
     * @param string $actionnote The new action note to add to the document.
     * @param int $imagingresultid imagingresultid
     */
    public function __construct(
        protected string $actionnote,
        protected int    $imagingresultid,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
