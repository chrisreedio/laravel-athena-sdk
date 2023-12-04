<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentReschedule
 *
 * Reschedules an existing appointment  to a new timeslot provided by the patient
 */
class UpdateAppointmentReschedule extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/reschedule";
    }

    /**
     * @param int $appointmentid appointmentid
     * @param int $newappointmentid The appointment ID of the new appointment.   (The appointment ID in the URL is the ID of the currently scheduled appointment.)
     * @param int $patientid The athenaNet patient ID.
     * @param null|int $appointmentcancelreasonid The appointment cancel reason id for cancellation of the original appointment. Use GET /appointmentcancelreasons to retrieve a list of cancel reasons.
     * @param null|bool $ignoreschedulablepermission By default, we allow booking of appointments marked as schedulable via the web.  This flag allows you to bypass that restriction for booking.
     * @param null|bool $nopatientcase By default, we create a patient case upon booking an appointment for new patients.  Setting this to true bypasses that patient case.
     * @param null|int $reasonid The appointment reason ID to be booked. If not provided, the same reason used in the original appointment will be used. Note: when getting open appointment slots, a special reason of -1 will return appointment slots for any reason.  This is not recommended, however, because actual availability does depend on a real reason.  In addition, appointment availability when using -1 does not account for the ability to not allow appointments to be scheduled too close to the current time (because that limit is set on a per appointment reason basis).
     * @param null|string $reschedulereason A text explanation why the appointment is being rescheduled
     */
    public function __construct(
        protected int     $appointmentid,
        protected int     $newappointmentid,
        protected int     $patientid,
        protected ?int    $appointmentcancelreasonid = null,
        protected ?bool   $ignoreschedulablepermission = null,
        protected ?bool   $nopatientcase = null,
        protected ?int    $reasonid = null,
        protected ?string $reschedulereason = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'newappointmentid' => $this->newappointmentid,
            'patientid' => $this->patientid,
            'appointmentcancelreasonid' => $this->appointmentcancelreasonid,
            'ignoreschedulablepermission' => $this->ignoreschedulablepermission,
            'nopatientcase' => $this->nopatientcase,
            'reasonid' => $this->reasonid,
            'reschedulereason' => $this->reschedulereason,
        ]);
    }
}
