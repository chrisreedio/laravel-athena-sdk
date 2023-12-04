<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient\Patient;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListPatientsByEnhancedBestMatch
 *
 * Retrieves a list of patients based on the search criteria defined by the specific demographics that
 * were passed. It can return multiple patients and will rank each one based off of how sure it is that
 * this patient is the one you are looking for. Note: This endpoint may rely on specific settings to be
 * enabled in athenaNet Production to function properly that are not required in other environments.
 * Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListPatientsByEnhancedBestMatch extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/patients/enhancedbestmatch";
	}


	/**
	 * @param null|bool $showprivacycustomfields Include privacy custom fields for the patient when SHOWCUSTOMFIELDS also set to true.
	 * @param string $firstname Patient's first name.
	 * @param null|bool $limitlocalpatientid If set, will return local patient id tied to the passed in DepartmentID.
	 * @param null|bool $showinsurance Include patient insurance information.
	 * @param null|string $preferredname Patient's preferred name (or nickname).
	 * @param null|bool $showportalstatus If set, will include portal enrollment status in response.
	 * @param null|string $email Patient's email address.
	 * @param null|float|int $minscore If you are only interested in matching a patient if they are above a specific confidence level, you can use this to require any patient matched to have a score greater than or equal to this value.
	 * @param null|string $suffix Patient's name suffix.
	 * @param null|int $departmentid This is the ID for the department of the patient you are retrieving.  If you are calling this on an enterprise practice with multiple financial groups (also called "provider groups"), this will ensure you are retrieving the correct patient and not a copy that is in a different department.
	 * @param null|bool $returnbestmatches If this field is set to true, the top five patients with a score of 16 or above will be returned.
	 * @param null|string $homephone The patient's home phone number.
	 * @param null|array $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
	 * @param null|bool $showallpatientdepartmentstatus Include an array of all departments the patient is a part of along with all statuses for those departments.
	 * @param null|bool $showpreviouspatientids If set, will show the previous patient ID this patient was merged from.
	 * @param null|bool $showallclaims Include information on claims where there is no outstanding patient balance. (Only to be used when showbalancedetails is selected.)
	 * @param string $dob Patient's DOB (mm/dd/yyyy).
	 * @param null|string $zip Patient's zip.
	 * @param null|bool $usesoundexsearch If this field is set to true, search patients based on a soundex search. Soundex searching is disabled by default.
	 * @param null|string $workphone The patient's work phone number. Generally not used to contact a patient.
	 * @param null|bool $showfullssn If set, will show full SSN instead of a masked number.
	 * @param null|bool $showlocalpatientid If set, will show local patient id.
	 * @param null|bool $checkuseraccess If set, validate that the session user has access to the patient record. May only be used in conjunction with INTERNALUSE and SESSIONUSER, and DEPARTMENTID. DEPARTMENTID is required because user access is department-specific. If the user does not have access to the patient record, returns a 403 error.
	 * @param string $lastname Patient's last name.
	 * @param null|bool $ignorerestrictions Set to true to allow ability to find patients with record restrictions and blocked patients. This should only be used when there is no reflection to the patient at all that a match was found or not found. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
	 * @param null|string $guarantorphone Guarantor's phone number.
	 * @param null|bool $showbalancedetails Show detailed information on patient balances.
	 * @param null|string $ssn Patient's social security number.
	 * @param null|bool $showcustomfields Include custom fields for the patient.
	 * @param null|string $guarantoremail Guarantor's email address.
	 * @param null|string $mobilephone The patient's mobile phone number.
	 * @param null|bool $show2015edcehrtvalues Use 2015 Ed. CEHRT compliant strings for describing gender identity and sexual orientation.
	 */
	public function __construct(
		protected ?bool $showprivacycustomfields = null,
		protected string $firstname,
		protected ?bool $limitlocalpatientid = null,
		protected ?bool $showinsurance = null,
		protected ?string $preferredname = null,
		protected ?bool $showportalstatus = null,
		protected ?string $email = null,
		protected float|int|null $minscore = null,
		protected ?string $suffix = null,
		protected ?int $departmentid = null,
		protected ?bool $returnbestmatches = null,
		protected ?string $homephone = null,
		protected ?array $confidentialitycode = null,
		protected ?bool $showallpatientdepartmentstatus = null,
		protected ?bool $showpreviouspatientids = null,
		protected ?bool $showallclaims = null,
		protected string $dob,
		protected ?string $zip = null,
		protected ?bool $usesoundexsearch = null,
		protected ?string $workphone = null,
		protected ?bool $showfullssn = null,
		protected ?bool $showlocalpatientid = null,
		protected ?bool $checkuseraccess = null,
		protected string $lastname,
		protected ?bool $ignorerestrictions = null,
		protected ?string $guarantorphone = null,
		protected ?bool $showbalancedetails = null,
		protected ?string $ssn = null,
		protected ?bool $showcustomfields = null,
		protected ?string $guarantoremail = null,
		protected ?string $mobilephone = null,
		protected ?bool $show2015edcehrtvalues = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showprivacycustomfields' => $this->showprivacycustomfields,
			'firstname' => $this->firstname,
			'limitlocalpatientid' => $this->limitlocalpatientid,
			'showinsurance' => $this->showinsurance,
			'preferredname' => $this->preferredname,
			'showportalstatus' => $this->showportalstatus,
			'email' => $this->email,
			'minscore' => $this->minscore,
			'suffix' => $this->suffix,
			'departmentid' => $this->departmentid,
			'returnbestmatches' => $this->returnbestmatches,
			'homephone' => $this->homephone,
			'confidentialitycode' => $this->confidentialitycode,
			'showallpatientdepartmentstatus' => $this->showallpatientdepartmentstatus,
			'showpreviouspatientids' => $this->showpreviouspatientids,
			'showallclaims' => $this->showallclaims,
			'dob' => $this->dob,
			'zip' => $this->zip,
			'usesoundexsearch' => $this->usesoundexsearch,
			'workphone' => $this->workphone,
			'showfullssn' => $this->showfullssn,
			'showlocalpatientid' => $this->showlocalpatientid,
			'checkuseraccess' => $this->checkuseraccess,
			'lastname' => $this->lastname,
			'ignorerestrictions' => $this->ignorerestrictions,
			'guarantorphone' => $this->guarantorphone,
			'showbalancedetails' => $this->showbalancedetails,
			'ssn' => $this->ssn,
			'showcustomfields' => $this->showcustomfields,
			'guarantoremail' => $this->guarantoremail,
			'mobilephone' => $this->mobilephone,
			'show2015edcehrtvalues' => $this->show2015edcehrtvalues,
		]);
	}
}
