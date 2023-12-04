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
		return "/patientsecuremessage/providers/departmentsmapping";
	}


	/**
	 * @param null|array $providerids One or more ID's of the Provider
	 * @param null|array $departmentids One or more ID's of the Department
	 * @param null|int $communicatorbrandid ID of the Brand
	 * @param null|array $providergroupids One or more ID's of the ProviderGroup
	 */
	public function __construct(
		protected ?array $providerids = null,
		protected ?array $departmentids = null,
		protected ?int $communicatorbrandid = null,
		protected ?array $providergroupids = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'providerids' => $this->providerids,
			'departmentids' => $this->departmentids,
			'communicatorbrandid' => $this->communicatorbrandid,
			'providergroupids' => $this->providergroupids,
		]);
	}
}
