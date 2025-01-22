<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Medication;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientMedications
 *
 * Retrieves list of patient's medication and medication details
 */
class ListPatientMedications extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/medications";
    }

    /**
     * @param  int  $departmentid  The athenanet department ID
     * @param  int  $patientid  patientid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|string  $medicationtype  Historical or Active or Denied. Will return a list of a patient's active or historical or denied medications.
     * @param  null|bool  $showndc  Shows the list of NDC numbers related to the medication.
     * @param  null|bool  $showpend  Include pending medications associated with approved future orders. These medications have not yet been submitted.
     * @param  null|bool  $showrxnorm  Shows the list of RxNorm Identifiers related to the medication. The list may contain both branded and generic identifiers. Note: Not All medications would include RX Norm.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?string $medicationtype = null,
        protected ?bool $showndc = null,
        protected ?bool $showpend = null,
        protected ?bool $showrxnorm = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'medicationtype' => $this->medicationtype,
            'showndc' => $this->showndc,
            'showpend' => $this->showpend,
            'showrxnorm' => $this->showrxnorm,
        ]);
    }
}
