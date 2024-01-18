<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\ExternalDictation;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateExternalDictationMessage
 *
 * Creates a record of the transcription message and adds it to the corresponding dictation
 */
class CreateExternalDictationMessage extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/externaldictationmessage";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  string  $field  Use this to specify the field that the dictation should be added under.  Please refer to the documentation for valid values.
     * @param  int  $totalmessagecount  This is the total amount of transcription messages you are going to send for this specific dictation. Upon receipt of all messages, the encounter may then be closed. Please refer to the documentation for more information.
     * @param  string  $transcriptiontext  This is the transcription text.
     * @param  null|string  $encountersection  Use this to specify which section of the encounter you are adding the transcription message to.  Please refer to the documentation for valid values.
     */
    public function __construct(
        protected int $encounterid,
        protected string $field,
        protected int $totalmessagecount,
        protected string $transcriptiontext,
        protected ?string $encountersection = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'field' => $this->field,
            'totalmessagecount' => $this->totalmessagecount,
            'transcriptiontext' => $this->transcriptiontext,
            'encountersection' => $this->encountersection,
        ]);
    }
}
