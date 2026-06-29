<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment;

use ChrisReedIO\AthenaSDK\Data\Appointment\AppointmentData;
use ChrisReedIO\AthenaSDK\PaginatedRequest;
use Saloon\Enums\Method;
use Saloon\Http\Response;

use function array_filter;
use function collect;
use function is_array;

/**
 * ListBookedAppointmentsForMultipleAppointments
 *
 * Retrieves a list of booked appointments for multiple appointment IDs Note: This endpoint may rely on
 * specific settings to be enabled in athenaNet Production to function properly that are not required in
 * other environments. Please see <a
 * href="/api/resources/best-practices-and-troubleshooting#Handling_Beta_APIs">Permissioned Rollout of
 * APIs</a> for more information if you are experiencing issues.
 */
class ListBookedAppointmentsForMultipleAppointments extends PaginatedRequest
{
    protected Method $method = Method::GET;

    protected ?string $itemsKey = 'appointments';

    public function resolveEndpoint(): string
    {
        return '/appointments/booked/multiple';
    }

    /**
     * @param  array  $appointmentids  The athenaNet appointment ID. Multiple appointment IDs (either as a comma delimited list or multiple POSTed values) are allowed. Maximum number of input Appointment IDs are limited due to performance constraints.
     * @param  null|array  $confidentialitycode  A comma separated list of confidentiality codes to filter patients by. If not set defaults to include all confidentiality codes. Supported codes: 'N' and 'R'.
     * @param  null|bool  $showcancelled  Include appointments that have been cancelled.
     * @param  null|bool  $showclaimdetail  Include claim information, if available, associated with an appointment.
     * @param  null|bool  $showcopay  By default, the expected co-pay is returned. For performance purposes, you can set this to false and copay will not be populated.
     * @param  null|bool  $showexpectedprocedurecodes  Show the expetcted procedurecodes.
     * @param  null|bool  $showinsurance  Include patient insurance information. Shows insurance packages for the appointment if any are selected, and all patient packages otherwise.
     * @param  null|bool  $showpatientdetail  Include patient information for each patient associated with an appointment.
     * @param  null|bool  $showpatientinstructions  Show indicator to include the patient instructions.
     * @param  null|bool  $showremindercalldetail  Include all remindercall related results, if available, associated with an appointment.
     */
    public function __construct(
        protected array $appointmentids,
        protected ?array $confidentialitycode = null,
        protected ?bool $showcancelled = null,
        protected ?bool $showclaimdetail = null,
        protected ?bool $showcopay = null,
        protected ?bool $showexpectedprocedurecodes = null,
        protected ?bool $showinsurance = null,
        protected ?bool $showpatientdetail = null,
        protected ?bool $showpatientinstructions = null,
        protected ?bool $showremindercalldetail = null,
    ) {}

    public function defaultQuery(): array
    {
        return array_filter([
            'appointmentids' => is_array($this->appointmentids) ? implode(',', $this->appointmentids) : $this->appointmentids,
            'confidentialitycode' => $this->confidentialitycode,
            'showcancelled' => $this->showcancelled,
            'showclaimdetail' => $this->showclaimdetail,
            'showcopay' => $this->showcopay,
            'showexpectedprocedurecodes' => $this->showexpectedprocedurecodes,
            'showinsurance' => $this->showinsurance,
            'showpatientdetail' => $this->showpatientdetail,
            'showpatientinstructions' => $this->showpatientinstructions,
            'showremindercalldetail' => $this->showremindercalldetail,
        ]);
    }

    public function createDtoFromResponse(Response $response): array
    {
        return collect($response->json($this->itemsKey))
            ->map(fn (array $appointment) => AppointmentData::fromArray($appointment))
            ->all();
    }
}
