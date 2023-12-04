<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\ProblemSectionNote;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientProblemSectionNote
 *
 * BETA: Modify the patient's problem chart section note
 */
class UpdatePatientProblemSectionNote extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/problems/sectionnote";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The department id.
     * @param  string  $sectionnote The note to be attached to this problem. Will be appended to the existing note by default, unless replacenote is true.
     * @param  null|bool  $replacenote If set, will replace the section note (removing existing data) instead of appending data. Use with caution.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected string $sectionnote,
        protected ?bool $replacenote = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter(['departmentid' => $this->departmentid, 'sectionnote' => $this->sectionnote, 'replacenote' => $this->replacenote]);
    }
}
