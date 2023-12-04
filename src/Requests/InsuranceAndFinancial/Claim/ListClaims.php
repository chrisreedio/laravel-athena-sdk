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
     * @param  null|string  $createdstartdate The claim creation date, start of range, inclusive.
     * @param  null|bool  $showlocalpatientid Include local patient ID for the claim if set to 1 in request.
     * @param  null|int  $patientid The patient ID associated with the claims to search for
     * @param  null|bool  $showservicetypeaddons Include service type add-ons for the claim.
     * @param  null|array  $procedurecodes One or more procedure codes
     * @param  null|array  $appointmentid One or more appointment IDs.
     * @param  null|string  $serviceenddate The service date, end of range, inclusive.
     * @param  null|int  $departmentid The department ID of the service department for the claims being searched for.
     * @param  null|int  $providerid Will match either the provider or the supervising provider.
     * @param  null|string  $createdenddate The claim creation date, end of range, inclusive.
     * @param  null|bool  $showsupervisingprovider Include supervising provider ID and name for the claim.
     * @param  null|array  $claimfilters Array, pass one or more options to filter claims.
     * @param  null|string  $servicestartdate The service date, start of range, inclusive.
     * @param  null|bool  $showcustomfields Include custom fields for the claims.
     */
    public function __construct(
        protected ?string $createdstartdate = null,
        protected ?bool $showlocalpatientid = null,
        protected ?int $patientid = null,
        protected ?bool $showservicetypeaddons = null,
        protected ?array $procedurecodes = null,
        protected ?array $appointmentid = null,
        protected ?string $serviceenddate = null,
        protected ?int $departmentid = null,
        protected ?int $providerid = null,
        protected ?string $createdenddate = null,
        protected ?bool $showsupervisingprovider = null,
        protected ?array $claimfilters = null,
        protected ?string $servicestartdate = null,
        protected ?bool $showcustomfields = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'createdstartdate' => $this->createdstartdate,
            'showlocalpatientid' => $this->showlocalpatientid,
            'patientid' => $this->patientid,
            'showservicetypeaddons' => $this->showservicetypeaddons,
            'procedurecodes' => $this->procedurecodes,
            'appointmentid' => $this->appointmentid,
            'serviceenddate' => $this->serviceenddate,
            'departmentid' => $this->departmentid,
            'providerid' => $this->providerid,
            'createdenddate' => $this->createdenddate,
            'showsupervisingprovider' => $this->showsupervisingprovider,
            'claimfilters' => $this->claimfilters,
            'servicestartdate' => $this->servicestartdate,
            'showcustomfields' => $this->showcustomfields,
        ]);
    }
}
