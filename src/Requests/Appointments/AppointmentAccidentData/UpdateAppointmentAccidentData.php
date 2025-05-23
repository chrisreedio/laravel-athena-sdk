<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentAccidentData;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentAccidentData
 *
 * Modifies the data for a specific appointment caused due to an accident
 */
class UpdateAppointmentAccidentData extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointments/{$this->appointmentid}/accidentdata";
    }

    /**
     * @param  int  $appointmentid  appointmentid
     * @param  null|bool  $anotherpartyresponsible  A boolean field describing whether this appointment is created because of an accident caused by another party.
     * @param  null|string  $autoaccidentstate  The two letter state abbreviation. This field is only valid if the relatedtoautoaccident field is set (or is being set) to true. If this field is set and relatedtoautoaccident is subsequently set to false, this field will be cleared.
     * @param  null|bool  $relatedtoautoaccident  A boolean field describing whether this appointment is created because of an automobile accident. Mutually exclusive with the relatedtootheraccident field.
     * @param  null|bool  $relatedtoemployment  A boolean field describing whether this appointment is created because of an accident related to the patient's employment.
     * @param  null|bool  $relatedtootheraccident  A boolean field describing whether this appointment is created because of an accident other than those listed above. This is mutually exclusive with the automobile accident field.
     */
    public function __construct(
        protected int $appointmentid,
        protected ?bool $anotherpartyresponsible = null,
        protected ?string $autoaccidentstate = null,
        protected ?bool $relatedtoautoaccident = null,
        protected ?bool $relatedtoemployment = null,
        protected ?bool $relatedtootheraccident = null,
    ) {}

    public function defaultBody(): array
    {
        return array_filter([
            'anotherpartyresponsible' => $this->anotherpartyresponsible,
            'autoaccidentstate' => $this->autoaccidentstate,
            'relatedtoautoaccident' => $this->relatedtoautoaccident,
            'relatedtoemployment' => $this->relatedtoemployment,
            'relatedtootheraccident' => $this->relatedtootheraccident,
        ]);
    }
}
