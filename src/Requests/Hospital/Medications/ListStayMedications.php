<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Medications;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListStayMedications
 *
 * BETA: Retrieves all administered, pre-admission and post-discharge medication details for a
 * stay.
 * Note: This API returns inpatient medication types depending on input filtering options, does
 * NOT filter on dates.
 */
class ListStayMedications extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/stays/{$this->stayid}/medications";
    }

    /**
     * @param  int  $stayid  stayid
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|bool  $showadministeredlist  If set to true, administered medications will be returned. By default true.
     * @param  null|bool  $showpostdischargelist  If set to true, post-discharge medications will be returned. By default false.
     * @param  null|bool  $showpreadmissionlist  If set to true, pre-admission medications will be returned. By default false.
     */
    public function __construct(
        protected int $stayid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $showadministeredlist = null,
        protected ?bool $showpostdischargelist = null,
        protected ?bool $showpreadmissionlist = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'showadministeredlist' => $this->showadministeredlist,
            'showpostdischargelist' => $this->showpostdischargelist,
            'showpreadmissionlist' => $this->showpreadmissionlist,
        ]);
    }
}
