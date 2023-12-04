<?php

namespace ChrisReedIO\AthenaSDK\Requests\InsuranceAndFinancial\Claim;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListClaims
 *
 * Retrieves a list of claims filtered by combination of date range, appointmentID ProviderID, and
 * DepartmentID
 */
class ListClaims extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/claims';
    }

    /**
     * @param null|array $appointmentid One or more appointment IDs.
     * @param null|array $claimfilters Array, pass one or more options to filter claims.
     * @param null|string $createdenddate The claim creation date, end of range, inclusive.
     * @param null|string $createdstartdate The claim creation date, start of range, inclusive.
     * @param null|int $departmentid The department ID of the service department for the claims being searched for.
     * @param null|int $patientid The patient ID associated with the claims to search for
     * @param null|array $procedurecodes One or more procedure codes
     * @param null|int $providerid Will match either the provider or the supervising provider.
     * @param null|string $serviceenddate The service date, end of range, inclusive.
     * @param null|string $servicestartdate The service date, start of range, inclusive.
     * @param null|bool $showcustomfields Include custom fields for the claims.
     * @param null|bool $showlocalpatientid Include local patient ID for the claim if set to 1 in request.
     * @param null|bool $showservicetypeaddons Include service type add-ons for the claim.
     * @param null|bool $showsupervisingprovider Include supervising provider ID and name for the claim.
     */
    public function __construct(
        protected ?array  $appointmentid = null,
        protected ?array  $claimfilters = null,
        protected ?string $createdenddate = null,
        protected ?string $createdstartdate = null,
        protected ?int    $departmentid = null,
        protected ?int    $patientid = null,
        protected ?array  $procedurecodes = null,
        protected ?int    $providerid = null,
        protected ?string $serviceenddate = null,
        protected ?string $servicestartdate = null,
        protected ?bool   $showcustomfields = null,
        protected ?bool   $showlocalpatientid = null,
        protected ?bool   $showservicetypeaddons = null,
        protected ?bool   $showsupervisingprovider = null,
    )
    {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'appointmentid' => $this->appointmentid,
            'claimfilters' => $this->claimfilters,
            'createdenddate' => $this->createdenddate,
            'createdstartdate' => $this->createdstartdate,
            'departmentid' => $this->departmentid,
            'patientid' => $this->patientid,
            'procedurecodes' => $this->procedurecodes,
            'providerid' => $this->providerid,
            'serviceenddate' => $this->serviceenddate,
            'servicestartdate' => $this->servicestartdate,
            'showcustomfields' => $this->showcustomfields,
            'showlocalpatientid' => $this->showlocalpatientid,
            'showservicetypeaddons' => $this->showservicetypeaddons,
            'showsupervisingprovider' => $this->showsupervisingprovider,
        ]);
    }
}
