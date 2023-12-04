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
     * @param  null|int  $hospitalbedid The ID of the bed where the patient's stay is currently located.
     * @param  null|int  $hospitalunitid The ID of the unit where the patient's stay is currently located.
     * @param  null|int  $hospitalroomid The ID of the room where the patient's stay is currently located.
     * @param  null|int  $departmentid The ID of the department where the patient's stay is currently located.
     * @param  null|int  $patientid Please remember to never disclose this ID to patients since it may result in inadvertent disclosure that a patient exists in a practice already.
     */
    public function __construct(
        protected ?int $hospitalbedid = null,
        protected ?int $hospitalunitid = null,
        protected ?int $hospitalroomid = null,
        protected ?int $departmentid = null,
        protected ?int $patientid = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'hospitalbedid' => $this->hospitalbedid,
            'hospitalunitid' => $this->hospitalunitid,
            'hospitalroomid' => $this->hospitalroomid,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
        ]);
    }
}
