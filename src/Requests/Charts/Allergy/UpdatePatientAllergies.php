<?php

namespace ChrisReedIO\AthenaSDK\Requests\Charts\Allergy;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientAllergies
 *
 * Modifies list of allergies documented in the patient chart
 */
class UpdatePatientAllergies extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/chart/{$this->patientid}/allergies";
    }

    /**
     * @param  int  $patientid patientid
     * @param  int  $departmentid The ID of the department for this patient. A patient may have multiple charts, and the department determines which chart to use.
     * @param  null|bool  $nkda Whether the patient has no known drug allergies. This is an explicit statement separate from a patient with no documented allergies so far. Note that while a patient can have this checked and have allergies, that is not recommended.
     * @param  null|array  $allergies A complex JSON object containing an update to the list of patient allergies. Any new allergies will be added, and any existing ones (based on allergenid) will be updated. If any existing ones are skipped, they will NOT be deleted. As such, this section can be empty if, for example, you just want to update NKDA status or the section note.
     * @param  null|string  $sectionnote A section-wide note. Passing an empty string will remove any existing note.
     * @param  null|bool  $patientfacingcall When 'true' is passed we will collect relevant data and store in our database.
     * @param  null|string  $thirdpartyusername User name of the patient in the third party application.
     */
    public function __construct(
        protected int $patientid,
        protected int $departmentid,
        protected ?bool $nkda = null,
        protected ?array $allergies = null,
        protected ?string $sectionnote = null,
        protected ?bool $patientfacingcall = null,
        protected ?string $thirdpartyusername = null,
    ) {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'nkda' => $this->nkda,
            'allergies' => $this->allergies,
            'sectionnote' => $this->sectionnote,
            'PATIENTFACINGCALL' => $this->patientfacingcall,
            'THIRDPARTYUSERNAME' => $this->thirdpartyusername,
        ]);
    }
}
