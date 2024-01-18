<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReasons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientAppointmentReasons
 *
 * Retrieve the list of appointment reasons configured for the Practice which will allow the patient to
 * select a reason for their appointment.
 */
class ListPatientAppointmentReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patientappointmentreasons';
    }

    /**
     * @param  int  $departmentid  The athenaNet department ID.
     * @param  int  $providerid  The athenaNet provider ID.
     */
    public function __construct(
        protected int $departmentid,
        protected int $providerid,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid,
        ]);
    }
}
