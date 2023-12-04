<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Diagnoses;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * CreateEncounterDiagnosis
 *
 * Create a new record of diagnoses for the specific encounter
 */
class CreateEncounterDiagnosis extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/diagnoses";
    }

    /**
     * @param  int  $encounterid encounterid
     * @param  int  $snomedcode SNOMED code for this diagnosis.
     * @param  null|string  $note The note to be entered for this diagnosis.
     * @param  null|array  $icd9codes ICD-9 code(s) for this diagnosis.
     * @param  null|array  $icd10codes ICD-10 code(s) for this diagnosis.
     * @param  null|string  $laterality Laterality of the SNOMED code.
     */
    public function __construct(
        protected int $encounterid,
        protected int $snomedcode,
        protected ?string $note = null,
        protected ?array $icd9codes = null,
        protected ?array $icd10codes = null,
        protected ?string $laterality = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'snomedcode' => $this->snomedcode,
            'note' => $this->note,
            'icd9codes' => $this->icd9codes,
            'icd10codes' => $this->icd10codes,
            'laterality' => $this->laterality,
        ]);
    }
}
