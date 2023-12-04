<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\ObEpisode;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateObEpisode
 *
 * BETA: Creates a new record of OB Episode for a specific patient
 */
class CreateObEpisode extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/obepisodes";
    }

    /**
     * @param int $departmentid The department ID
     * @param int $patientid patientid
     * @param null|string $numberofgestations Used to track multiple gestation pregnancies. If more than one fetus is present, additional columns are inserted into the flowsheet to track findings specific to each fetus: presentation, fetal heart rate, and fetal movement.
     */
    public function __construct(
        protected int $departmentid,
        protected int $patientid,
        protected ?string $numberofgestations = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'numberofgestations' => $this->numberofgestations
        ]);
    }
}
