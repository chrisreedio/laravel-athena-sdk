<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\DepartmentsReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListDepartments
 *
 * Retrieves detailed information of the departments associated to a practice
 */
class ListDepartments extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/departments';
    }

    /**
     * @param null|bool $fullproviderlist If set to true, list providers who are configured to be able to see patients in this department. This list is most accurate when the department-providers configuration is actively maintained. This list is dependent on valid configuration. Warning: the configured list may be very large. Default is false.
     * @param null|bool $hospitalonly If set to true, return hospital only departments.
     * @param null|bool $providerlist If set to true, list providers who see patients in this department. Note that only providers that have booked appointments in the department will be listed. Default is false.
     * @param null|bool $showalldepartments By default, departments hidden in the portal do not appear. When this is set to true, that restriction is not applied. Default is false.
     */
    public function __construct(
        protected ?bool $fullproviderlist = null,
        protected ?bool $hospitalonly = null,
        protected ?bool $providerlist = null,
        protected ?bool $showalldepartments = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'fullproviderlist' => $this->fullproviderlist,
            'hospitalonly' => $this->hospitalonly,
            'providerlist' => $this->providerlist,
            'showalldepartments' => $this->showalldepartments,
        ]);
    }
}
