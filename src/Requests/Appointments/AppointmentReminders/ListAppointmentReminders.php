<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReminders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * ListAppointmentReminders
 *
 * Retrieves a list appointment reminders for a specific department
 */
class ListAppointmentReminders extends Request
{
	protected Method $method = Method::GET;


	public function resolveEndpoint(): string
	{
		return "/appointments/appointmentreminders";
	}


	/**
	 * @param null|bool $showdeleted By default, we do not return reminders that have been deleted. Setting this to true will show all reminders regardless of status.
	 * @param null|int $appointmenttypeid An athenaNet appointment type ID.
	 * @param string $enddate Find reminders for appointments whose approximate date is on or before this date.
	 * @param int $departmentid An athenaNet department ID.
	 * @param null|int $providerid An athenaNet provider ID.
	 * @param string $startdate Find reminders for appointments whose approximate date is on or after this date.
	 * @param null|int $patientid An athenaNet patient ID.
	 */
	public function __construct(
		protected ?bool $showdeleted = null,
		protected ?int $appointmenttypeid = null,
		protected string $enddate,
		protected int $departmentid,
		protected ?int $providerid = null,
		protected string $startdate,
		protected ?int $patientid = null,
	) {
	}


	public function defaultQuery(): array
	{
		return array_filter([
			'showdeleted' => $this->showdeleted,
			'appointmenttypeid' => $this->appointmenttypeid,
			'enddate' => $this->enddate,
			'departmentid' => $this->departmentid,
			'providerid' => $this->providerid,
			'startdate' => $this->startdate,
			'patientid' => $this->patientid,
		]);
	}
}
