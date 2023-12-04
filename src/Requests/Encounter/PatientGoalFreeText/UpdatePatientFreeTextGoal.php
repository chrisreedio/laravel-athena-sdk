<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\PatientGoalFreeText;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientFreeTextGoal
 *
 * Modifies discussion notes of the patient goal for a specific encounter in Assessment and Plan
 * section
 */
class UpdatePatientFreeTextGoal extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/patientgoals/freetextgoal";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  null|string  $freetextgoal A free text field used for unstructured goals.
     * @param  null|string  $versiontoken A token specifying a unique version of data in the database. If it's specified and does not match the version token on the server, the update will fail.
     * @param  null|bool  $replacefreetextgoal If true, will replace the existing free text goal with the new one. If false, will append to the existing free text goal.
     */
    public function __construct(
        protected int $encounterid,
        protected ?string $freetextgoal = null,
        protected ?string $versiontoken = null,
        protected ?bool $replacefreetextgoal = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'freetextgoal' => $this->freetextgoal,
            'versiontoken' => $this->versiontoken,
            'replacefreetextgoal' => $this->replacefreetextgoal,
        ]);
    }
}
