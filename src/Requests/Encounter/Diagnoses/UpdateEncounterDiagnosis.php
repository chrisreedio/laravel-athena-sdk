<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\Diagnoses;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateEncounterDiagnosis
 *
 * Modifies a diagnosis record for a specific encounter
 */
class UpdateEncounterDiagnosis extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/encounter/{$this->encounterid}/diagnoses/{$this->diagnosisid}";
    }

    /**
     * @param int $diagnosisid diagnosisid
     * @param int $encounterid encounterid
     * @param int $snomedcode SNOMED code for this diagnosis.
     * @param null|array $icd10codes ICD-10 code(s) for this diagnosis.
     * @param null|array $icd9codes ICD-9 code(s) for this diagnosis.
     * @param null|string $laterality Laterality of the SNOMED code.
     * @param null|string $note The note to be entered for this diagnosis.
     */
    public function __construct(
        protected int     $diagnosisid,
        protected int     $encounterid,
        protected int     $snomedcode,
        protected ?array  $icd10codes = null,
        protected ?array  $icd9codes = null,
        protected ?string $laterality = null,
        protected ?string $note = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'snomedcode' => $this->snomedcode,
            'icd10codes' => $this->icd10codes,
            'icd9codes' => $this->icd9codes,
            'laterality' => $this->laterality,
            'note' => $this->note,
        ]);
    }
}
