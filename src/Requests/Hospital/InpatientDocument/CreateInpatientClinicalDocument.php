<?php

namespace ChrisReedIO\AthenaSDK\Requests\Hospital\InpatientDocument;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasMultipartBody;

/**
 * CreateInpatientClinicalDocument
 *
 * BETA: Creates a clinical document record of a specific patient in the hospital
 */
class CreateInpatientClinicalDocument extends Request implements HasBody
{
	use HasMultipartBody;

	protected Method $method = Method::POST;


	public function resolveEndpoint(): string
	{
		return "/inpatient/document/clinical";
	}


	/**
	 * @param string $attachmentcontents The file that will become the document. Currently only a base 64 encoded pdf is supported.
	 * @param int $departmentid The department id associated with the document.
	 * @param int $patientid The patient ID.
	 * @param int $stayid The stay ID associated with the document.
	 * @param null|int $caseid Surgical case to which the document will be attached. It's required when posting documents related to surgery like ( Intraop Record, Postop Record, Block Record, Handoff Record, Presurgical Evaluation, Line Record ).
	 * @param null|int $documentlabelid The type of document being uploaded (this is the label that will be displayed to the user). Use GET /inpatient/configuration/documentlabels to search for valid IDs.
	 * @param null|string $observationdatetime If this document is tied to a clinical event it is the date the event occurred. Please use the format YYYY-M-DThh:mi:ss
	 */
	public function __construct(
		protected string $attachmentcontents,
		protected int $departmentid,
		protected int $patientid,
		protected int $stayid,
		protected ?int $caseid = null,
		protected ?int $documentlabelid = null,
		protected ?string $observationdatetime = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'attachmentcontents' => $this->attachmentcontents,
			'departmentid' => $this->departmentid,
			'patientid' => $this->patientid,
			'stayid' => $this->stayid,
			'caseid' => $this->caseid,
			'documentlabelid' => $this->documentlabelid,
			'observationdatetime' => $this->observationdatetime,
		]);
	}
}
