<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentTypes;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateAppointmentType
 *
 * Create a new appointment type
 */
class CreateAppointmentType extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/appointmenttypes';
    }

    /**
     * @param int $duration The expected duration, in minutes, of the appointment type.  Note, this value cannot be changed after creation, so please choose carefully.
     * @param string $name The name of the appointment type.  Maximum length of 30 characters.
     * @param bool $patient If set to true, this type serves as a "patient" type, meaning that is is a type that can be used for booking patients. If set to false, then it this type will not be used for patient (e.g. "Lunch" or "Vacation").  Non-patient types are mostly used to reserving time for providers to not see patients.
     * @param string $shortname The short name code of the appointment type.  Maximum length of 4 characters. Used for making schedule templates.  Note, this value cannot be changed after creation, so please choose carefully.
     * @param null|bool $generic If set to true, this type serves as a "generic" type, that will match any type when searching.  Defaults to false.
     * @param null|bool $templatetypeonly If set to true, this type serves as a "template-only" type, meaning that it can be used for building schedule templates, but cannot be used for booking appointments (i.e. another type must be chosen). Defaults to false.
     */
    public function __construct(
        protected int    $duration,
        protected string $name,
        protected bool   $patient,
        protected string $shortname,
        protected ?bool  $generic = null,
        protected ?bool  $templatetypeonly = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'duration' => $this->duration,
            'name' => $this->name,
            'patient' => $this->patient,
            'shortname' => $this->shortname,
            'generic' => $this->generic,
            'templatetypeonly' => $this->templatetypeonly,
        ]);
    }
}
