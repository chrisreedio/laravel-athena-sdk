<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\Transcription;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListTranscribableNoteTypes
 *
 * BETA: Retrieves the list of transcribale note types configured in the system.
 */
class ListTranscribableNoteTypes extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/stays/configuration/transcribablenotetypes";
	}


	public function __construct()
	{
	}


	public function defaultQuery(): array
	{
		return array_filter([]);
	}
}
