<?php

namespace ChrisReedIO\AthenaSDK\Requests\ObstetricsEpisode\DiscussionItems;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListObEpisodeDiscussionItems
 *
 * BETA: Retrieves a list of discussion items for the practice that may be filtered by trimester
 */
class ListObEpisodeDiscussionItems extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chart/configuration/obepisodes/discussionitems';
    }

    /**
     * @param  null|int  $trimester  Optionally, only include elements from this trimester.
     */
    public function __construct(
        protected ?int $trimester = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['trimester' => $this->trimester]);
    }
}
