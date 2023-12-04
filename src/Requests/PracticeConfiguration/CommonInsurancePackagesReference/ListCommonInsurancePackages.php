<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\CommonInsurancePackagesReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListCommonInsurancePackages
 *
 * Retrieves a list of insurance packages used by the practice
 */
class ListCommonInsurancePackages extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/misc/commoninsurancepackages';
    }

    /**
     * @param int $departmentid The ID of the department to check for common insurances. This is used to determine which provider group that we are working with.
     * @param null|bool $showonlycasepolicies If true only show the case policies.
     */
    public function __construct(
        protected int $departmentid,
        protected ?bool $showonlycasepolicies = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'showonlycasepolicies' => $this->showonlycasepolicies
        ]);
    }
}
