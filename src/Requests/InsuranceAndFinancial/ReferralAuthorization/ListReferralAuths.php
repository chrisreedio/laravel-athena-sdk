<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\ReferralAuthorization;

use ChrisReedIO\AthenaSDK\Data\Patient\ReferralAuthorizationData;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

use function array_is_list;
use function collect;

/**
 * ListReferralAuths
 *
 * Retrieves the list of authorizations and referrals for a specific patient
 */
class ListReferralAuths extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/referralauths";
    }

    /**
     * @param  int  $patientid  patientid
     * @param  null|int  $insuranceid  The insurance ID.
     * @param  null|bool  $showexpired  If set, results will include expired authorizations/referrals. This defaults to false.
     */
    public function __construct(
        protected int $patientid,
        protected ?int $insuranceid = null,
        protected ?bool $showexpired = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'insuranceid' => $this->insuranceid,
            'showexpired' => $this->showexpired,
        ]);
    }

    public function createDtoFromResponse(Response $response): array
    {
        $payload = $response->json();

        $items = $payload['referralauths']
            ?? $payload['referrals']
            ?? $payload['authorizations']
            ?? (array_is_list($payload) ? $payload : []);

        return collect($items)
            ->filter(static fn (mixed $item): bool => is_array($item))
            ->map(static fn (array $item): ReferralAuthorizationData => ReferralAuthorizationData::fromArray($item))
            ->all();
    }
}
