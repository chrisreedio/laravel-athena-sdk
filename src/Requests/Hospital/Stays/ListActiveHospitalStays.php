<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Stays;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListActiveHospitalStays
 *
 * BETA: Retrieves alist of all the active patient stays in the hospital.
 */
class ListActiveHospitalStays extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/stays/active';
    }

    /**
     * @param  null|int  $departmentid The ID of the department where the patient's stay is currently located.
     * @param  null|int  $hospitalbedid The ID of the bed where the patient's stay is currently located.
     * @param  null|int  $hospitalroomid The ID of the room where the patient's stay is currently located.
     * @param  null|int  $hospitalunitid The ID of the unit where the patient's stay is currently located.
     * @param  null|int  $patientid Please remember to never disclose this ID to patients since it may result in inadvertent disclosure that a patient exists in a practice already.
     */
    public function __construct(
        protected ?int $departmentid = null,
        protected ?int $hospitalbedid = null,
        protected ?int $hospitalroomid = null,
        protected ?int $hospitalunitid = null,
        protected ?int $patientid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'hospitalbedid' => $this->hospitalbedid,
            'hospitalroomid' => $this->hospitalroomid,
            'hospitalunitid' => $this->hospitalunitid,
            'patientid' => $this->patientid,
        ]);
    }
}
