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
     * @param  null|string  $chargecode - charge code.
     * @param  null|array  $chargecodes - An array of charge codes.
     * @param  null|int  $departmentid - The department ID to associate the chargecode.
     * @param  null|string  $description - The description of charge codes
     * @param  null|string  $effectivedate - Must be passed in with EXPIRATIONDATE. Formatted as MM/DD/YYYY.
     * @param  null|string  $exactchargecodesonly - If true, returns only charge codes that are exact matches of those searched for.
     * @param  null|string  $expirationdate - Must be passed in with EFFECTIVEDATE. Formatted as MM/DD/YYYY.
     * @param  null|string  $filterdate - The filter on date. Formatted as MM/DD/YYYY.
     * @param  null|string  $fromrevcode - For range search of revenuecodes
     * @param  null|array  $ignorechargemastercodeids - IDs of charge master codes to ignore.
     * @param  null|array  $procedurecodes - The procedure codes associated with the chargecode
     * @param  null|array  $revenuecodes - The revenue code associated with the chargecode
     * @param  null|string  $showduplicates - Include duplicate chargecodes for a given date
     * @param  null|string  $torevcode - For range search of
     */
    public function __construct(
        protected ?string $chargecode = null,
        protected ?array $chargecodes = null,
        protected ?int $departmentid = null,
        protected ?string $description = null,
        protected ?string $effectivedate = null,
        protected ?string $exactchargecodesonly = null,
        protected ?string $expirationdate = null,
        protected ?string $filterdate = null,
        protected ?string $fromrevcode = null,
        protected ?array $ignorechargemastercodeids = null,
        protected ?array $procedurecodes = null,
        protected ?array $revenuecodes = null,
        protected ?string $showduplicates = null,
        protected ?string $torevcode = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'chargecode' => $this->chargecode,
            'chargecodes' => $this->chargecodes,
            'departmentid' => $this->departmentid,
            'description' => $this->description,
            'effectivedate' => $this->effectivedate,
            'exactchargecodesonly' => $this->exactchargecodesonly,
            'expirationdate' => $this->expirationdate,
            'filterdate' => $this->filterdate,
            'fromrevcode' => $this->fromrevcode,
            'ignorechargemastercodeids' => $this->ignorechargemastercodeids,
            'procedurecodes' => $this->procedurecodes,
            'revenuecodes' => $this->revenuecodes,
            'showduplicates' => $this->showduplicates,
            'torevcode' => $this->torevcode,
        ]);
    }
}
