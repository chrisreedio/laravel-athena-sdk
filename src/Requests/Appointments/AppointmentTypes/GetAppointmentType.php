<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentTypes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetAppointmentType
 *
 * Retrieves list of the type of appointment available in the practice
 */
class GetAppointmentType extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/appointmenttypes/{$this->appointmenttypeid}";
    }

    /**
     * @param int $appointmenttypeid appointmenttypeid
     * @param null|bool $showappointmenttypeclasses If set to true, returns the appointment type class ID and name for each appointment type.
     */
    public function __construct(
        protected int   $appointmenttypeid,
        protected ?bool $showappointmenttypeclasses = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showappointmenttypeclasses' => $this->showappointmenttypeclasses]);
    }
}
