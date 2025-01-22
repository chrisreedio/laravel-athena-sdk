<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Flowsheet;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListFlowsheetTemplates
 *
 * Retrieves a flowsheet template for a specific problem
 */
class ListFlowsheetTemplates extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/chart/configuration/flowsheettemplates/{$this->snomedcode}";
    }

    /**
     * @param  int  $snomedcode  snomedcode
     * @param  null|int  $departmentid  The department ID for the provider.  For non-enterprise practices, you may choose any department.  This is requried only when passing in one or more provider IDs.  If no provider ID is passed in, this field is ignored.
     */
    public function __construct(
        protected int $snomedcode,
        protected ?int $departmentid = null,
        protected ?array $providerid = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid,
        ]);
    }
}
