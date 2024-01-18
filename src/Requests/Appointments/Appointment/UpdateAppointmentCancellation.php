<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentCancellation
 *
 * Allows the user to cancel a scheduled appointment
 */
class UpdateAppointmentCancellation extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/cancel";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  int  $patientid  The athenaNet patient ID.
     * @param  null|int  $appointmentcancelreasonid  Passing in this parameter will override the default cancel reason. Valid reasons can be retrieved via a call to the GET /appointmentcancelreasons endpoint.
     * @param  null|string  $cancellationreason  A text explanation why the appointment is being cancelled
     * @param  null|bool  $ignoreschedulablepermission  By default, we allow booking of appointments marked as schedulable via the web.  This flag allows you to bypass that restriction for booking.
     * @param  null|bool  $nopatientcase  By default, we create a patient case upon booking an appointment for new patients.  Setting this to true bypasses that patient case.
     */
    public function __construct(
        protected int $appointmentid,
        protected int $patientid,
        protected ?int $appointmentcancelreasonid = null,
        protected ?string $cancellationreason = null,
        protected ?bool $ignoreschedulablepermission = null,
        protected ?bool $nopatientcase = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'patientid' => $this->patientid,
            'appointmentcancelreasonid' => $this->appointmentcancelreasonid,
            'cancellationreason' => $this->cancellationreason,
            'ignoreschedulablepermission' => $this->ignoreschedulablepermission,
            'nopatientcase' => $this->nopatientcase,
        ]);
    }
}
