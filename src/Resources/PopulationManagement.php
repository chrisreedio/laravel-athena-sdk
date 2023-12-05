<?php

namespace ChrisReedIO\AthenaSDK\Resources;

use ChrisReedIO\AthenaSDK\Requests\PopulationManagement\GetRiskContract;
use ChrisReedIO\AthenaSDK\Requests\PopulationManagement\UpdateRiskContract;
use ChrisReedIO\AthenaSDK\Resource;
use Saloon\Http\Response;

class PopulationManagement extends Resource
{
	/**
	 * @param int $riskcontractid ID of the risk contract
	 * @param string $name Title of the risk contract
	 */
	public function getRiskContract(?int $riskcontractid, ?string $name): Response
	{
		return $this->connector->send(new GetRiskContract($riskcontractid, $name));
	}


	/**
	 * @param string $name Risk contract title.
	 * @param string $description Risk contract description
	 * @param int $riskcontractid Risk contract id.
	 */
	public function updateRiskContract(?string $name, ?string $description, ?int $riskcontractid): Response
	{
		return $this->connector->send(new UpdateRiskContract($name, $description, $riskcontractid));
	}
}
