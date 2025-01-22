<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointment
 *
 * Create a single appointment for specific patient
 */
class UpdateAppointment extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  int  $patientid  The athenaNet patient ID.
     * @param  null|int  $appointmenttypeid  The appointment type to be booked.  This field should never be used for booking appointments for web-based scheduling. The use of this field is reserved for digital check-in (aka "kiosk") or an application used by practice staff.  One of this or reasonid is required.
     * @param  null|string  $bookingnote  A note from the patient about why this appointment is being booked
     * @param  null|int  $departmentid  The athenaNet department ID.
     * @param  null|bool  $donotsendconfirmationemail  For clients with athenaCommunicator, certain appointment types can be configured to have an appointment confirmation email sent to the patient at time of appointment booking. If this parameter is set to true, that email will not be sent.  This should only be used if you plan on sending a confirmation email via another method.
     * @param  null|bool  $ignoreschedulablepermission  By default, we allow booking of appointments marked as schedulable via the web.  This flag allows you to bypass that restriction for booking.
     * @param  null|array  $insuranceinfo  Patient insurance information, which will be added to the note on the appointment.
     * @param  null|bool  $nopatientcase  By default, we create a patient case upon booking an appointment for new patients.  Setting this to true bypasses that patient case.
     * @param  null|int  $reasonid  The appointment reason ID to be booked.  This field is required for booking appointments for web-based scheduling and is a reason that is retrieved from the /patientappointmentreasons call.
     * @param  null|bool  $urgentyn  Set this field in order to set the urgent flag in athena (if the practice settings allow for this).
     */
    public function __construct(
        protected int $appointmentid,
        protected int $patientid,
        protected ?int $appointmenttypeid = null,
        protected ?string $bookingnote = null,
        protected ?int $departmentid = null,
        protected ?bool $donotsendconfirmationemail = null,
        protected ?bool $ignoreschedulablepermission = null,
        protected ?array $insuranceinfo = null,
        protected ?bool $nopatientcase = null,
        protected ?int $reasonid = null,
        protected ?bool $urgentyn = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'patientid' => $this->patientid,
            'appointmenttypeid' => $this->appointmenttypeid,
            'bookingnote' => $this->bookingnote,
            'departmentid' => $this->departmentid,
            'donotsendconfirmationemail' => $this->donotsendconfirmationemail,
            'ignoreschedulablepermission' => $this->ignoreschedulablepermission,
            'insuranceinfo' => $this->insuranceinfo,
            'nopatientcase' => $this->nopatientcase,
            'reasonid' => $this->reasonid,
            'urgentyn' => $this->urgentyn,
        ]);
    }
}
