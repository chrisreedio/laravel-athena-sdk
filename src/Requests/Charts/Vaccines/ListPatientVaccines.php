<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vaccines;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientVaccines
 *
 * Retrieves patient's historical vaccines
 */
class ListPatientVaccines extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/vaccines";
    }

    /**
     * @param  int  $departmentid The athenaNet department id.
     * @param  int  $patientid patientid
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $showdeclinedorders If set, include orders that were declined
     * @param  null|bool  $showdeleted Include deleted vaccines in the result
     * @param  null|bool  $showprescribednotadministered Include vaccines that were prescribed but were not administered in the result
     * @param  null|bool  $showrefused Include refused vaccines in the result
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $showdeclinedorders = null,
        protected ?bool $showdeleted = null,
        protected ?bool $showprescribednotadministered = null,
        protected ?bool $showrefused = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'showdeclinedorders' => $this->showdeclinedorders,
            'showdeleted' => $this->showdeleted,
            'showprescribednotadministered' => $this->showprescribednotadministered,
            'showrefused' => $this->showrefused,
        ]);
    }
}
