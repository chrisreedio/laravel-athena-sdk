<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentType
 *
 * Generic success/error response
 */
class UpdateAppointmentType extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/appointmenttypes/{$this->appointmenttypeid}";
    }

    /**
     * @param  int  $appointmenttypeid appointmenttypeid
     * @param  null|string  $name The name of the appointment type.  Maximum length of 30 characters.
     * @param  null|bool  $generic If set to true, this type serves as a "generic" type, that will match any type when searching.  Defaults to false.
     * @param  null|bool  $patient If set to true, this type serves as a "patient" type, meaning that is is a type that can be used for booking patients. If set to false, then it this type will not be used for patient (e.g. "Lunch" or "Vacation").  Non-patient types are mostly used to reserving time for providers to not see patients.
     * @param  null|bool  $templatetypeonly If set to true, this type serves as a "template-only" type, meaning that it can be used for building schedule templates, but cannot be used for booking appointments (i.e. another type must be chosen). Defaults to false.
     */
    public function __construct(
        protected int $appointmenttypeid,
        protected ?string $name = null,
        protected ?bool $generic = null,
        protected ?bool $patient = null,
        protected ?bool $templatetypeonly = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'generic' => $this->generic,
            'patient' => $this->patient,
            'templatetypeonly' => $this->templatetypeonly,
        ]);
    }
}
