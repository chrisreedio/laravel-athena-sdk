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
     * @param int $encounterid encounterid
     * @param null|bool $billforservice True if you want to bill for this service.
     * @param null|array $icd10codes A list of ICD 10 codes (either as a comma delimited list or multiple POSTed values) to attach to this service. Use GET /chart/encounter/{encounterid}/diagnoses to find valid options for this encounter.
     * @param null|array $modifiers A list of non fee-affecting modifiers to attach to this service. Use GET /encounter/configuration/modifiers to find valid options for this practice. Input needs to be quoted and passed in array. Eg. ["E1", "E2", "59"]
     * @param null|string $procedurecode A CPT code specifying what procedure the service was for. Use GET /encounter/{encounterid}/procedurecodes to find valid options for this encounter.
     * @param null|number $units The number of units for this service. This will often be the number of times the service was performed.
     */
    public function __construct(
        protected int      $encounterid,
        protected ?bool    $billforservice = null,
        protected ?array   $icd10codes = null,
        protected ?array   $modifiers = null,
        protected ?string  $procedurecode = null,
        protected ?\number $units = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'billforservice' => $this->billforservice,
            'icd10codes' => $this->icd10codes,
            'modifiers' => $this->modifiers,
            'procedurecode' => $this->procedurecode,
            'units' => $this->units,
        ]);
    }
}
