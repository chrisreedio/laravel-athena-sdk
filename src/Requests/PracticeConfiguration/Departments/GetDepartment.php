<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\Departments;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDepartment
 *
 * Retrieves detailed information of a specific department
 */
class GetDepartment extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/departments/{$this->departmentid}";
    }

    /**
     * @param int $departmentid departmentid
     * @param null|bool $providerlist If set to true, list providers who see patients in this department. Default is false.
     * @param null|bool $showalldepartments By default, departments hidden in the portal do not appear. When this is set to true, that restriction is not applied. Default is false.
     */
    public function __construct(
        protected int $departmentid,
        protected ?bool $providerlist = null,
        protected ?bool $showalldepartments = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'providerlist' => $this->providerlist,
            'showalldepartments' => $this->showalldepartments
        ]);
    }
}
