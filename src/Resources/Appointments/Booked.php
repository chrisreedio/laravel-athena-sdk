<?php


namespace ChrisReedIO\AthenaSDK\Resources\Appointments;

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListBookedAppointments;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class Booked extends Resource
{
    // /**
    //  * @param int $appointmentid appointmentid
    //  */
    // public function completeAppointmentCheckout(): Response
    // {
    // 	return $this->connector->send(new ListBookedAppointments());
    // }


    public function list(
        string $startdate,
        string $enddate,
        ?string $appointmentstatus = null,
        ?int $appointmenttypeid = null,
        ?array $confidentialitycode = null,
        ?int $departmentid = null,
        ?string $endlastmodified = null,
        ?bool $ignorerestrictions = null,
        ?int $patientid = null,
        ?array $providerid = null,
        ?string $scheduledenddate = null,
        ?string $scheduledstartdate = null,
        ?bool $showcancelled = null,
        ?bool $showclaimdetail = null,
        ?bool $showcopay = null,
        ?bool $showexpectedprocedurecodes = null,
        ?bool $showinsurance = null,
        ?bool $showpatientdetail = null,
        ?bool $showremindercalldetail = null,
        ?string $startlastmodified = null,
    ): Response
    {
        return $this->connector->send(new ListBookedAppointments(
            $startdate,
            $enddate,
            $appointmentstatus,
            $appointmenttypeid,
            $confidentialitycode,
            $departmentid,
            $endlastmodified,
            $ignorerestrictions,
            $patientid,
            $providerid,
            $scheduledenddate,
            $scheduledstartdate,
            $showcancelled,
            $showclaimdetail,
            $showcopay,
            $showexpectedprocedurecodes,
            $showinsurance,
            $showpatientdetail,
            $showremindercalldetail,
            $startlastmodified,
        ));
    }


}
