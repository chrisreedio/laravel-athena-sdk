<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypeDurableMedicalEquipmentDme;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientDmeDocument
 *
 * Retrieves a specific Durable Medical Equipment document of the patient
 */
class GetPatientDmeDocument extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/dme/{$this->dmeid}";
    }

    /**
     * @param  int  $dmeid  dmeid
     * @param  int  $patientid  patientid
     * @param  null|bool  $showquestions  Some order types like labs and imaging orders have additional pertinant information in a question/answer format. Setting this will return that data.
     */
    public function __construct(
        protected int $dmeid,
        protected int $patientid,
        protected ?bool $showquestions = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['showquestions' => $this->showquestions]);
    }
}
