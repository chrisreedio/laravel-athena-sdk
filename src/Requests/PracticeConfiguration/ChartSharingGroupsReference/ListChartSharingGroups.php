<?php

namespace ChrisReedIO\AthenaSDK\Requests\PracticeConfiguration\ChartSharingGroupsReference;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListChartSharingGroups
 *
 * Retrieves information about chart sharing groups at a practice
 */
class ListChartSharingGroups extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/configuration/chartsharinggroups";
	}


	public function __construct()
	{
	}
}
