<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\TopInsurancePackagesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListTopInsurancePackages
 *
 * Retrieves the list of top athenaNet insurance packages used by the practice
 */
class ListTopInsurancePackages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/topinsurancepackages';
    }

    /**
     * @param  null|int  $departmentid  Only look at patients who are associated with this department's provider group in determining which insurance packages to list. Note that insurance packages do not "belong" to a department and thus department ID is not returned in the output. The same insurance packages will (and often do) appear across multiple departments.
     */
    public function __construct(
        protected ?int $departmentid = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
