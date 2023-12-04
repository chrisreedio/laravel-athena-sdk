<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ExternalDictation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateStartExternalDictation
 *
 * Mark the specific encounter as in the process of receiving transcription messages
 */
class CreateStartExternalDictation extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/startexternaldictation";
    }

    /**
     * @param int $encounterid encounterid
     * @param null|string $dictatedby The username of the person who recorded this dictation.
     * @param null|string $dictationrecordeddatetime This is the date/time the actual dictation was recorded. Please convert this value to Eastern time and use the format MM/DD/YYYY HH24:MI:SS.
     */
    public function __construct(
        protected int $encounterid,
        protected ?string $dictatedby = null,
        protected ?string $dictationrecordeddatetime = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'dictatedby' => $this->dictatedby,
            'dictationrecordeddatetime' => $this->dictationrecordeddatetime
        ]);
    }
}
