<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\HospitalSystemsChargeCodes;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListHospitalChargeCodes
 *
 * Retrieves a list of hospital charge codes
 */
class ListHospitalChargeCodes extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/chargecodes';
    }

    /**
     * @param  null|array  $revenuecodes - The revenue code associated with the chargecode
     * @param  null|array  $ignorechargemastercodeids - IDs of charge master codes to ignore.
     * @param  null|string  $torevcode - For range search of
     * @param  null|string  $exactchargecodesonly - If true, returns only charge codes that are exact matches of those searched for.
     * @param  null|string  $chargecode - charge code.
     * @param  null|string  $description - The description of charge codes
     * @param  null|string  $expirationdate - Must be passed in with EFFECTIVEDATE. Formatted as MM/DD/YYYY.
     * @param  null|string  $effectivedate - Must be passed in with EXPIRATIONDATE. Formatted as MM/DD/YYYY.
     * @param  null|array  $procedurecodes - The procedure codes associated with the chargecode
     * @param  null|int  $departmentid - The department ID to associate the chargecode.
     * @param  null|string  $filterdate - The filter on date. Formatted as MM/DD/YYYY.
     * @param  null|array  $chargecodes - An array of charge codes.
     * @param  null|string  $showduplicates - Include duplicate chargecodes for a given date
     * @param  null|string  $fromrevcode - For range search of revenuecodes
     */
    public function __construct(
        protected ?array $revenuecodes = null,
        protected ?array $ignorechargemastercodeids = null,
        protected ?string $torevcode = null,
        protected ?string $exactchargecodesonly = null,
        protected ?string $chargecode = null,
        protected ?string $description = null,
        protected ?string $expirationdate = null,
        protected ?string $effectivedate = null,
        protected ?array $procedurecodes = null,
        protected ?int $departmentid = null,
        protected ?string $filterdate = null,
        protected ?array $chargecodes = null,
        protected ?string $showduplicates = null,
        protected ?string $fromrevcode = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'revenuecodes' => $this->revenuecodes,
            'ignorechargemastercodeids' => $this->ignorechargemastercodeids,
            'torevcode' => $this->torevcode,
            'exactchargecodesonly' => $this->exactchargecodesonly,
            'chargecode' => $this->chargecode,
            'description' => $this->description,
            'expirationdate' => $this->expirationdate,
            'effectivedate' => $this->effectivedate,
            'procedurecodes' => $this->procedurecodes,
            'departmentid' => $this->departmentid,
            'filterdate' => $this->filterdate,
            'chargecodes' => $this->chargecodes,
            'showduplicates' => $this->showduplicates,
            'fromrevcode' => $this->fromrevcode,
        ]);
    }
}
