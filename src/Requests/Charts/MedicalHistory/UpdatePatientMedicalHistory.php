<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\MedicalHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientMedicalHistory
 *
 * Updates the medical history of a specific patient
 */
class UpdatePatientMedicalHistory extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/medicalhistory";
    }

    /**
     * @param int $departmentid The athenaNet department ID.
     * @param int $patientid patientid
     * @param null|array $questions A complex JSON object containing the patient medical history. See the Chart documentation for more details.
     * @param null|string $sectionnote Any additional section notes
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected ?array  $questions = null,
        protected ?string $sectionnote = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'questions' => $this->questions,
            'sectionnote' => $this->sectionnote
        ]);
    }
}
