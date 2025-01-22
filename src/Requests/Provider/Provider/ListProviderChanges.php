<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\Provider;

use ChrisReedIO\AthenaSDK\Data\Provider\ProviderData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

use function collect;

/**
 * ListProviderChanges
 *
 * Retrieve list of providers which are updated, deleted or added
 */
class ListProviderChanges extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'providers';

    public function resolveEndpoint(): string
    {
        return '/providers/changed';
    }

    /**
     * @param  null|bool  $leaveUnprocessed  For testing purposes, do not mark records as processed
     * @param  null|string  $showProcessedEndDatetime  See showprocessedstartdatetime
     * @param  null|string  $showProcessedStartDatetime  Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     */
    public function __construct(
        protected ?bool $leaveUnprocessed = null,
        protected ?string $showProcessedEndDatetime = null,
        protected ?string $showProcessedStartDatetime = null,
    ) {}

    public function defaultQuery(): array
    {
        $leave = config('athena-sdk.leave_unprocessed') ?? $this->leaveUnprocessed;

        return array_filter([
            'leaveunprocessed' => $leave,
            'showprocessedenddatetime' => $this->showProcessedEndDatetime,
            'showprocessedstartdatetime' => $this->showProcessedStartDatetime,
        ]);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return collect($response->json($this->itemsKey))
            ->map(fn ($item) => ProviderData::fromArray($item))
            ->all();
    }
}
