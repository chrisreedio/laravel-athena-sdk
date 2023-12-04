<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeImagingResult;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateCloseImagingResult
 *
 * Advances an imaging result to a closed status.
 */
class UpdateCloseImagingResult extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/documents/imagingresult/{$this->imagingresultid}/close";
    }

    /**
     * @param int $imagingresultid imagingresultid
     * @param null|string $actionnote The note to be added to the document
     * @param null|int $actionreasonid An alternate action reason to be applied the document
     */
    public function __construct(
        protected int $imagingresultid,
        protected ?string $actionnote = null,
        protected ?int $actionreasonid = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'actionnote' => $this->actionnote,
            'actionreasonid' => $this->actionreasonid
        ]);
    }
}
