<?php

namespace ChrisReedIO\AthenaSDK\Requests\Provider\ReferringProvider;

use ChrisReedIO\AthenaSDK\Data\Provider\ReferringProviderData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

use function collect;
use function config;

/**
 * ListReferringProviderChanges
 *
 * Retrieves a list of referring providers whose details has been modified
 */
class ListReferringProviderChanges extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'referringproviders';

    public function resolveEndpoint(): string
    {
        return '/referringproviders/changed';
    }

    /**
     * @param  null|bool  $leaveunprocessed  For testing purposes, do not mark records as processed
     * @param  null|string  $showprocessedenddatetime  See showprocessedstartdatetime
     * @param  null|string  $showprocessedstartdatetime  Show already processed changes.  This will show changes that you previously retrieved at some point after this datetime mm/dd/yyyy hh24:mi:ss (Eastern). Can be used to refetch data if there was an error, such as a timeout, and records are marked as already retrieved. This is intended to be used with showprocessedenddatetime and for a short period of time only. Also note that all messages will eventually be deleted.
     */
    public function __construct(
        protected ?bool $leaveUnprocessed = null,
        protected ?string $showProcessedEndDatetime = null,
        protected ?string $showProcessedStartDatetime = null,
    ) {
    }

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
            ->map(fn ($item) => ReferringProviderData::fromArray($item))
            ->all();
    }
}
