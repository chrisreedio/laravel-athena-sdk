<?php

namespace ChrisReedIO\AthenaSDK\Requests\Patient;

use ChrisReedIO\AthenaSDK\Data\Patient\PatientData;
use Illuminate\Support\Facades\Log;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * GetPatient
 *
 * Retrieves data of a specific patient Note: This endpoint may rely on specific settings to be enabled
 * in athenaNet Production to function properly that are not required in other environments. Please see
 * <a href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout
 * of APIs</a> for more information if you are experiencing issues.
 */
class GetPatient extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}";
    }

    /**
     * @param  int  $patientid patientid
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     * @param  null|bool  $checkuseraccess If set, validate that the session user has access to the patient record. May only be used in conjunction with INTERNALUSE and SESSIONUSER, and DEPARTMENTID. DEPARTMENTID is required because user access is department-specific. If the user does not have access to the patient record, returns a 403 error.
     * @param  null|array  $confidentialitycode A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'. Only functions if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|int  $departmentid This is the ID for the department of the patient you are retrieving.  If you are calling this on an enterprise practice with multiple financial groups (also called "provider groups"), this will ensure you are retrieving the correct patient and not a copy that is in a different department.
     * @param  null|bool  $ignorerestrictions Set to true to allow ability to find patients with record restrictions and blocked patients. This should only be used when there is no reflection to the patient at all that a match was found or not found. No effect if the CLTH_DP_NEW_BTG_MDP_RESTRICTIONS toggle is enabled.
     * @param  null|bool  $limitlocalpatientid If set, will return local patient id tied to the passed in DepartmentID.
     * @param  null|bool  $show2015edcehrtvalues Use 2015 Ed. CEHRT compliant strings for describing gender identity and sexual orientation.
     * @param  null|bool  $showallclaims Include information on claims where there is no outstanding patient balance. (Only to be used when showbalancedetails is selected.)
     * @param  null|bool  $showallpatientdepartmentstatus Include an array of all departments the patient is a part of along with all statuses for those departments.
     * @param  null|bool  $showbalancedetails Show detailed information on patient balances.
     * @param  null|bool  $showcustomfields Include custom fields for the patient.
     * @param  null|bool  $showfullssn If set, will show full SSN instead of a masked number.
     * @param  null|bool  $showinsurance Include patient insurance information.
     * @param  null|bool  $showlocalpatientid If set, will show local patient id.
     * @param  null|bool  $showportalstatus If set, will include portal enrollment status in response.
     * @param  null|bool  $showpreviouspatientids If set, will show the previous patient ID this patient was merged from.
     * @param  null|bool  $showprivacycustomfields Include privacy custom fields for the patient when SHOWCUSTOMFIELDS also set to true.
     */
    public function __construct(
        protected int $patientid,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
        protected ?bool $checkuseraccess = null,
        protected ?array $confidentialitycode = null,
        protected ?int $departmentid = null,
        protected ?bool $ignorerestrictions = null,
        protected ?bool $limitlocalpatientid = null,
        protected ?bool $show2015edcehrtvalues = null,
        protected ?bool $showallclaims = null,
        protected ?bool $showallpatientdepartmentstatus = null,
        protected ?bool $showbalancedetails = null,
        protected ?bool $showcustomfields = null,
        protected ?bool $showfullssn = null,
        protected ?bool $showinsurance = null,
        protected ?bool $showlocalpatientid = null,
        protected ?bool $showportalstatus = null,
        protected ?bool $showpreviouspatientids = null,
        protected ?bool $showprivacycustomfields = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
            'checkuseraccess' => $this->checkuseraccess,
            'confidentialitycode' => $this->confidentialitycode,
            'departmentid' => $this->departmentid,
            'ignorerestrictions' => $this->ignorerestrictions,
            'limitlocalpatientid' => $this->limitlocalpatientid,
            'show2015edcehrtvalues' => $this->show2015edcehrtvalues,
            'showallclaims' => $this->showallclaims,
            'showallpatientdepartmentstatus' => $this->showallpatientdepartmentstatus,
            'showbalancedetails' => $this->showbalancedetails,
            'showcustomfields' => $this->showcustomfields,
            'showfullssn' => $this->showfullssn,
            'showinsurance' => $this->showinsurance,
            'showlocalpatientid' => $this->showlocalpatientid,
            'showportalstatus' => $this->showportalstatus,
            'showpreviouspatientids' => $this->showpreviouspatientids,
            'showprivacycustomfields' => $this->showprivacycustomfields,
        ]);
    }

    public function createDtoFromResponse(Response $response): PatientData
    {
        // dd($response->json());
        Log::error('GetPatient response', [
            'status' => $response->status(),
            'response' => $response->json(),
        ]);

        return PatientData::fromArray($response->json()[0]);
    }
}
