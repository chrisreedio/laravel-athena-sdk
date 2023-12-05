<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Requests\Chart\CreateQualityManagementRefresh;
use ChrisReedIO\AthenaSDK\Requests\Chart\GetPatientQualityManagement;
use ChrisReedIO\AthenaSDK\Requests\Chart\GetQualityManagementRefreshTime;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class Chart extends Resource
{
	/**
	 * @param int $patientid patientid
	 * @param string $status Optional filter to only get results with this status
	 * @param int $departmentid The athenaNet department id.
	 * @param int $providerid The ID of the provider. If not specified, the default provider is used -- usually the provider that has seen the patient most often / recently.
	 * @param string $measuretype Optional filter to only get clinical guidelines or pay for performance results.
	 */
	public function getPatientQualityManagement(
		int $patientid,
		?string $status,
		int $departmentid,
		?int $providerid,
		?string $measuretype,
	): Response
	{
		return $this->connector->send(new GetPatientQualityManagement($patientid, $status, $departmentid, $providerid, $measuretype));
	}


	/**
	 * @param int $patientid patientid
	 * @param int $departmentid The athenaNet department id.
	 */
	public function getQualityManagementRefreshTime(int $patientid, int $departmentid): Response
	{
		return $this->connector->send(new GetQualityManagementRefreshTime($patientid, $departmentid));
	}


	/**
	 * @param int $patientid patientid
	 * @param int $providerid The ID of the provider. If not specified, the default provider is used -- usually the provider that has seen the patient most often / recently.
	 * @param int $departmentid The athenaNet department id.
	 */
	public function createQualityManagementRefresh(int $patientid, ?int $providerid, int $departmentid): Response
	{
		return $this->connector->send(new CreateQualityManagementRefresh($patientid, $providerid, $departmentid));
	}
}
