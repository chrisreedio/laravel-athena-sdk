<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\AppointmentHealthHistoryFormDocuments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetHealthHistoryForm
 *
 * Retrieves  the content of the health history form
 */
class GetHealthHistoryForm extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/healthhistoryforms/{$this->formid}";
    }

    /**
     * @param int $formid formid
     */
    public function __construct(
        protected int $formid,
    )
    {
    }
}
