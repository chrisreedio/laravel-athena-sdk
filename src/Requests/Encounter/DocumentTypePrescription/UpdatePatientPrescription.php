<?php

namespace ChrisReedIO\AthenaSDK\Requests\Encounter\DocumentTypePrescription;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdatePatientPrescription
 *
 * Modifies the information for a specific prescription document
 */
class UpdatePatientPrescription extends Request implements HasBody
{
    use HasFormBody;

    protected Method $method = Method::PUT;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/documents/prescriptions/{$this->prescriptionid}";
    }

    /**
     * @param int $departmentid The ID of the department.
     * @param int $patientid patientid
     * @param int $prescriptionid prescriptionid
     * @param null|string $actionnote The note appended to the action taken on the document. This field supports line breaks in the form of '\n' and '\r\n'.
     * @param null|string $assignedto This field accepts a username and assigns the order to that username.
     * @param null|string $internalnote The internal note for the document. This field supports line breaks in the form of '\n' and '\r\n'.
     * @param null|string $note The note to be appended to the document. This field supports line breaks in the form of '\n' and '\r\n'.
     * @param null|bool $pintotop If set, pins the ACTIONNOTE to the top of the workflow.
     */
    public function __construct(
        protected int     $departmentid,
        protected int     $patientid,
        protected int     $prescriptionid,
        protected ?string $actionnote = null,
        protected ?string $assignedto = null,
        protected ?string $internalnote = null,
        protected ?string $note = null,
        protected ?bool   $pintotop = null,
    )
    {
    }

    public function defaultBody(): array
    {
        return array_filter([
            'departmentid' => $this->departmentid,
            'actionnote' => $this->actionnote,
            'assignedto' => $this->assignedto,
            'internalnote' => $this->internalnote,
            'note' => $this->note,
            'pintotop' => $this->pintotop,
        ]);
    }
}
