<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Vitals;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreatePatientVitals
 *
 * Records the source of the data and vitals measurements of the patient.
 */
class CreatePatientVitals extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/vitals";
    }

    /**
     * @param  int  $departmentid  The ID of the department of the patient. Used to choose the correct patient chart.
     * @param  int  $patientid  patientid
     * @param  string  $source  Where this vital was collected. For now only device generated is allowed. Later, we will use this to differentiate between patient reported, device generated, and practice collected vitals outside of an encounter.
     * @param  array  $vitals  This is an array of arrays in JSON. Each subarray contains a group of related readings, like systolic and diastolic blood pressure. They will be assigned the same readingID.
     * @param  null|bool  $patientfacingcall  When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername  User name of the patient in the third party application.
     * @param  null|bool  $returnvitalids  Return the IDs of the newly added vitals, mapped to their vital attribute IDs, in addition to any regular success/error messages.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected string $source,
        protected array $vitals,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $returnvitalids = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'source' => $this->source,
            'vitals' => $this->vitals,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'returnvitalids' => $this->returnvitalids,
        ]);
    }
}
