<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReasons;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListExistingPatientAppointmentReasons
 *
 * Retrieve the list of appointment reasons configured for the Practice existing patients to attend
 */
class ListExistingPatientAppointmentReasons extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patientappointmentreasons/existingpatient';
    }

    /**
     * @param int $departmentid The athenaNet department ID.
     * @param int $providerid The athenaNet provider ID.
     */
    public function __construct(
        protected int $departmentid,
        protected int $providerid,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid
        ]);
    }
}
