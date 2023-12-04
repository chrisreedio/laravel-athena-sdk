<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterReasons;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterReasonNote
 *
 * Sets the freetext encounter reason note for the specific encounter.
 */
class CreateEncounterReasonNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/encounterreasonnote";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  null|string  $notetext The text to set as or append to the note
     * @param  null|bool  $appendtext If true, note text will be appended to the existing note.  If false (default), the existing note text will be completely replaced by the new note text.
     */
    public function __construct(
        protected int $encounterid,
        protected ?string $notetext = null,
        protected ?bool $appendtext = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['notetext' => $this->notetext, 'appendtext' => $this->appendtext]);
    }
}
