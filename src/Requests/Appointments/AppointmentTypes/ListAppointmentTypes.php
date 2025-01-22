<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentTypes;

use ChrisReedIO\AthenaSDK\Data\Appointment\AppointmentTypeData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use JsonException;
use Saloon\Enums\Method;
use Saloon\Http\Response;

/**
 * ListAppointmentTypes
 *
 * Retrieves list of the type of appointment available in the practice
 */
class ListAppointmentTypes extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'appointmenttypes';

    public function resolveEndpoint(): string
    {
        return '/appointmenttypes';
    }

    /**
     * @param  null|array  $departmentids  A list of departmentids which when passed will filter the appointmenttypes having said departments. This is used along with providerids to fetch department/provider specific appointmenttypes.
     * @param  null|bool  $hidegeneric  By default, we show both generic and non-generic types. Setting this to true will hide the generic types (and show only non-generic types).
     * @param  null|bool  $hidenongeneric  By default, we show both generic and non-generic types. Setting this to true will hide non-generic types (and show only generic types).
     * @param  null|bool  $hidenonpatient  This defaults to true if not specified, and thus will hide non-patient facing types.  Setting this to false would thus show non-patient facing types.
     * @param  null|bool  $hidetemplatetypeonly  By default, we show both "template only" and not-template only types. Setting this to true, the results will omit template only types. ("Template only" is a setting that makes the type appear in schedules, but forces users to select a non-template type upon booking.)
     * @param  null|array  $providerids  A list of providerids which when passed will filter the appointmenttypes having said providers. This is used along with departmentids to fetch department/provider specific appointmenttypes.
     * @param  null|bool  $showappointmenttypeclasses  If set to true, returns the appointment type class ID and name for each appointment type.
     */
    public function __construct(
        protected ?array $departmentids = null,
        protected ?bool $hidegeneric = null,
        protected ?bool $hidenongeneric = null,
        protected ?bool $hidenonpatient = null,
        protected ?bool $hidetemplatetypeonly = null,
        protected ?array $providerids = null,
        protected ?bool $showappointmenttypeclasses = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'departmentids' => $this->departmentids,
            'hidegeneric' => $this->hidegeneric,
            'hidenongeneric' => $this->hidenongeneric,
            'hidenonpatient' => $this->hidenonpatient,
            'hidetemplatetypeonly' => $this->hidetemplatetypeonly,
            'providerids' => $this->providerids,
            'showappointmenttypeclasses' => $this->showappointmenttypeclasses,
        ]);
    }

    /**
     * @throws JsonException
     */
    public function createDtoFromResponse(Response $response): array
    {
        return collect($response->json($this->itemsKey))
            ->map(fn (array $type) => AppointmentTypeData::fromArray($type))
            ->all();
    }
}
