<?php

namespace ChrisReedIO\AthenaSDK\Requests\DocumentsAndForms\DocumentTypeLabResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateLabResultClose
 *
 * Advances a lab result to a closed status.
 */
class UpdateLabResultClose extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/labresult/{$this->labresultid}/close";
    }

    /**
     * @param  int  $labresultid  labresultid
     * @param  null|string  $actionnote  The note to be added to the document
     * @param  null|int  $actionreasonid  An alternate action reason to be applied the document
     */
    public function __construct(
        protected int $labresultid,
        protected ?string $actionnote = null,
        protected ?int $actionreasonid = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'actionnote' => $this->actionnote,
            'actionreasonid' => $this->actionreasonid,
        ]);
    }
}
