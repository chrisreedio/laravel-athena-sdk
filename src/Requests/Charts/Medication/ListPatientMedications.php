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
     * @param  int  $patientid patientid
     * @param  null|bool  $showpend Include pending medications associated with approved future orders. These medications have not yet been submitted.
     * @param  null|bool  $showrxnorm Shows the list of RxNorm Identifiers related to the medication. The list may contain both branded and generic identifiers. Note: Not All medications would include RX Norm.
     * @param  int  $departmentid The athenanet department ID
     * @param  null|string  $medicationtype Historical or Active or Denied. Will return a list of a patient's active or historical or denied medications.
     * @param  null|bool  $showndc Shows the list of NDC numbers related to the medication.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $showpend,
        protected ?bool $showrxnorm,
        protected int $departmentid,
        protected ?string $medicationtype = null,
        protected ?bool $showndc = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $patientfacingcall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showpend' => $this->showpend,
            'showrxnorm' => $this->showrxnorm,
            'departmentid' => $this->departmentid,
            'medicationtype' => $this->medicationtype,
            'showndc' => $this->showndc,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
        ]);
    }
}
