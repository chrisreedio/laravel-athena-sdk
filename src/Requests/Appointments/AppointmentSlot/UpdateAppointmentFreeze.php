<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentSlot;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentFreeze
 *
 * Freezes an appointment slot so that patients can no longer schedule an appointment in that slot.
 * Once frozen, the time slot will not be listed for booking an appointment.
 */
class UpdateAppointmentFreeze extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/freeze";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  bool  $freeze  If true, slot will be frozen, if false, slot will be unfrozen
     * @param  null|bool  $requirescancellation  If true, appointment can be cancelled, if false, cannot cancel the appointment
     */
    public function __construct(
        protected int $appointmentid,
        protected bool $freeze,
        protected ?bool $requirescancellation = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'freeze' => $this->freeze,
            'requirescancellation' => $this->requirescancellation,
        ]);
    }
}
