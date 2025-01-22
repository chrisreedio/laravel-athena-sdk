<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\SecureMessages;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetDepartmentsMapping
 *
 * Retrieves the department mapping information for patient messaging
 */
class GetDepartmentsMapping extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/patientsecuremessage/providers/departmentsmapping';
    }

    /**
     * @param  null|int  $communicatorbrandid  ID of the Brand
     * @param  null|array  $departmentids  One or more ID's of the Department
     * @param  null|array  $providergroupids  One or more ID's of the ProviderGroup
     * @param  null|array  $providerids  One or more ID's of the Provider
     */
    public function __construct(
        protected ?int $communicatorbrandid = null,
        protected ?array $departmentids = null,
        protected ?array $providergroupids = null,
        protected ?array $providerids = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'communicatorbrandid' => $this->communicatorbrandid,
            'departmentids' => $this->departmentids,
            'providergroupids' => $this->providergroupids,
            'providerids' => $this->providerids,
        ]);
    }
}
