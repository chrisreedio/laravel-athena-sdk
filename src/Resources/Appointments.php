<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Requests\Appointments\CompleteAppointmentCheckout;
use ChrisReedIO\AthenaSDK\Resource;
use ChrisReedIO\AthenaSDK\Resources\Appointments\Booked;
use Saloon\Http\Response;

class Appointments extends Resource
{
    // /**
    //  * @param int $appointmentid appointmentid
    //  */
    // public function completeAppointmentCheckout(): Response
    // {
    // 	return $this->connector->send(new ListBookedAppointments());
    // }

    public function booked(): Booked
    {
        return new Booked($this->connector);
    }
}
