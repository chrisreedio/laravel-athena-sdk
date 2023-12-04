<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\PhysicalExam;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPhysicalExamTemplate
 *
 * BETA: Retrieves the list of Physical Exam templates for this encounter
 */
class GetPhysicalExamTemplate extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/chart/encounter/{$this->encounterid}/physicalexam/templates";
	}


	/**
	 * @param int $encounterid encounterid
	 */
	public function __construct(
		protected int $encounterid,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
