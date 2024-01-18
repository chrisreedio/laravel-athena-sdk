<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\PatientGoalDiscussionNotes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientGoalsDiscussionNotes
 *
 * Modifies discussion notes of the patient goal for a specific encounter
 */
class UpdatePatientGoalsDiscussionNotes extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/patientgoals/discussionnotes";
    }

    /**
     * @param  int  $encounterid  encounterid
     * @param  null|string  $discussionnotes  A free text field used for discussion notes.
     * @param  null|bool  $replacediscussionnotes  If true, will replace the existing section note with the new one. If false, will append to the existing note.
     * @param  null|string  $versiontoken  A token specifying a unique version of data in the database. If it's specified and does not match the version token on the server, the update will fail.
     */
    public function __construct(
        protected int $encounterid,
        protected ?string $discussionnotes = null,
        protected ?bool $replacediscussionnotes = null,
        protected ?string $versiontoken = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'discussionnotes' => $this->discussionnotes,
            'replacediscussionnotes' => $this->replacediscussionnotes,
            'versiontoken' => $this->versiontoken,
        ]);
    }
}
