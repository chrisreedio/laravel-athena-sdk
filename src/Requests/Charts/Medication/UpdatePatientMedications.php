<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Medication;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientMedications
 *
 * Modifies the patient 's existing medication
 */
class UpdatePatientMedications extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/medications";
    }

    /**
     * @param  int  $departmentid  The athenanet department ID
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|bool  $nomedicationsreported  Set the "None Reported" checkbox indicating that no medications were reported for this patient.
     * @param  null|string  $sectionnote  The section-wide note for medications.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $nomedicationsreported = null,
        protected ?string $sectionnote = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'nomedicationsreported' => $this->nomedicationsreported,
            'sectionnote' => $this->sectionnote,
        ]);
    }
}
