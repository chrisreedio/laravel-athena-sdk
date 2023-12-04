<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\PatientGoalInstructions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientGoalsInstructions
 *
 * Modifies the patient goal instructions in a specific encounter in the Assessment and Plan section
 */
class UpdatePatientGoalsInstructions extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/patientgoals/patientinstructions";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  null|string  $versiontoken A token specifying a unique version of data in the database. If it's specified and does not match the version token on the server, the update will fail.
     * @param  null|string  $patientinstructions A free text field used for patient instructions.
     * @param  null|bool  $replaceinstructions If true, will replace the existing section note with the new one. If false, will append to the existing note.
     */
    public function __construct(
        protected int $encounterid,
        protected ?string $versiontoken = null,
        protected ?string $patientinstructions = null,
        protected ?bool $replaceinstructions = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'versiontoken' => $this->versiontoken,
            'patientinstructions' => $this->patientinstructions,
            'replaceinstructions' => $this->replaceinstructions,
        ]);
    }
}
