<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\MedicalHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListMedicalHistoryQuestions
 *
 * Retrieves the list of medical history questions
 */
class ListMedicalHistoryQuestions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/medicalhistory';
    }

    /**
     * @param null|bool $showdeleted Include deleted questions
     */
    public function __construct(
        protected ?bool $showdeleted = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['showdeleted' => $this->showdeleted]);
    }
}
