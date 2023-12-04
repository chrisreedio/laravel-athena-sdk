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
     * @param  int  $patientid patientid
     * @param  null|bool  $showdeleted Include deleted vaccines in the result
     * @param  null|bool  $showdeclinedorders If set, include orders that were declined
     * @param  int  $departmentid The athenaNet department id.
     * @param  null|bool  $showprescribednotadministered Include vaccines that were prescribed but were not administered in the result
     * @param  null|bool  $showrefused Include refused vaccines in the result
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $showdeleted,
        protected ?bool $showdeclinedorders,
        protected int $departmentid,
        protected ?bool $showprescribednotadministered = null,
        protected ?bool $showrefused = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $patientfacingcall = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'showdeleted' => $this->showdeleted,
            'showdeclinedorders' => $this->showdeclinedorders,
            'departmentid' => $this->departmentid,
            'showprescribednotadministered' => $this->showprescribednotadministered,
            'showrefused' => $this->showrefused,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
        ]);
    }
}
