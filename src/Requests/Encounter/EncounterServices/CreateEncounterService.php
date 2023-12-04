<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\EncounterServices;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterService
 *
 * Generic success/error response
 */
class CreateEncounterService extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/encounter/{$this->encounterid}/services";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  null|number  $units The number of units for this service. This will often be the number of times the service was performed.
     * @param  null|array  $modifiers A list of non fee-affecting modifiers to attach to this service. Use GET /encounter/configuration/modifiers to find valid options for this practice. Input needs to be quoted and passed in array. Eg. ["E1", "E2", "59"]
     * @param  null|array  $icd10codes A list of ICD 10 codes (either as a comma delimited list or multiple POSTed values) to attach to this service. Use GET /chart/encounter/{encounterid}/diagnoses to find valid options for this encounter.
     * @param  null|string  $procedurecode A CPT code specifying what procedure the service was for. Use GET /encounter/{encounterid}/procedurecodes to find valid options for this encounter.
     * @param  null|bool  $billforservice True if you want to bill for this service.
     */
    public function __construct(
        protected int $encounterid,
        protected ?\number $units = null,
        protected ?array $modifiers = null,
        protected ?array $icd10codes = null,
        protected ?string $procedurecode = null,
        protected ?bool $billforservice = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'units' => $this->units,
            'modifiers' => $this->modifiers,
            'icd10codes' => $this->icd10codes,
            'procedurecode' => $this->procedurecode,
            'billforservice' => $this->billforservice,
        ]);
    }
}
