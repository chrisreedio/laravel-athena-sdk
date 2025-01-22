<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\GynHistory;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListGynHistoryQuestions
 *
 * Retrieve the configured list of questions and answers related to a patients GYN history.
 */
class ListGynHistoryQuestions extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/gynhistory';
    }

    /**
     * @param  null|bool  $showdeleted  Include deleted questions
     */
    public function __construct(
        protected ?bool $showdeleted = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['showdeleted' => $this->showdeleted]);
    }
}
