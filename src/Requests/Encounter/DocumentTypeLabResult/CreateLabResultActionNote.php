<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeLabResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateLabResultActionNote
 *
 * Creates an action note for a specific Lab Result document
 */
class CreateLabResultActionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/documents/labresult/{$this->labresultid}/actions";
    }

    /**
     * @param  int  $labresultid labresultid
     * @param  string  $actionnote The new action note to add to the document.
     */
    public function __construct(
        protected int $labresultid,
        protected string $actionnote,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['actionnote' => $this->actionnote]);
    }
}
