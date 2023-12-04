<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\SurgicalHistory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientSurgicalHistory
 *
 * Modifies the historical surgery information for a specific patient
 */
class UpdatePatientSurgicalHistory extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/surgicalhistory";
    }

    /**
     * @param int $departmentid The athenaNet department id.
     * @param int $patientid patientid
     * @param null|bool $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param null|string $thirdpartyusername User name of the patient in the third party application.
     * @param null|array $procedures A JSON array of procedures, mimicking <a href="https://developer.athenahealth.com/docs/read/chart/Surgical_History">the inputs</a> described in the PUT/POST call. It is good practice to use the POST call whenever adding new surgical history, however it can only save historical procedures, regardless of input source. Do take note that when calling PUT, any procedures without a procedureid in the PUT call will also add new history. The PUT endpoint can only operate on procedures with source 'historical' and not 'encounter'. Please note a procedure's source cannot be changed after its creation.
     * @param null|string $sectionnote Any additional section notes
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected ?bool   $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?array  $procedures = null,
        protected ?string $sectionnote = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'procedures' => $this->procedures,
            'sectionnote' => $this->sectionnote,
        ]);
    }
}
