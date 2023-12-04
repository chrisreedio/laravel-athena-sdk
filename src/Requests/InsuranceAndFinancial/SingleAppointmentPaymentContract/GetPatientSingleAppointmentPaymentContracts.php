<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\SingleAppointmentPaymentContract;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * GetPatientSingleAppointmentPaymentContracts
 *
 * Retrieves any one year payment contracts on file for a specific patient
 */
class GetPatientSingleAppointmentPaymentContracts extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return "/patients/{$this->patientid}/collectpayment/singleappointment";
    }

    /**
     * @param int $patientid patientid
     * @param null|int $departmentid The ID of the department where the payment or contract is being collected. This parameter is currently not formally required. However, it will be in a future patch so it is highly recommended that this parameter is used.
     */
    public function __construct(
        protected int  $patientid,
        protected ?int $departmentid = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter(['departmentid' => $this->departmentid]);
    }
}
