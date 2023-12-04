<?php

namespace ChrisReedIO\AthenaSDK\Requests\Appointments\AppointmentReminders;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasFormBody;

/**
 * UpdateAppointmentReminder
 *
 * Results for updating an appointment reminder for this practice.
 */
class UpdateAppointmentReminder extends Request implements HasBody
{
	use HasFormBody;

	protected Method $method = Method::PUT;


	public function resolveEndpoint(): string
	{
		return "/appointments/appointmentreminders/{$this->appointmentreminderid}";
	}


	/**
	 * @param int $appointmentreminderid appointmentreminderid
	 * @param null|string $note Miscellaneous notes for this reminder.
	 * @param null|string $status Status of the reminder.
	 * @param null|int $providerid An athenaNet provider ID.
	 * @param null|string $approximatedate The approximate date on which an appointment for this reminder should be scheduled.
	 * @param null|int $appointmenttypeid An athenaNet appointment type ID.
	 * @param null|string $patientinstructions Patient instructions regarding this reminder.
	 */
	public function __construct(
		protected int $appointmentreminderid,
		protected ?string $note = null,
		protected ?string $status = null,
		protected ?int $providerid = null,
		protected ?string $approximatedate = null,
		protected ?int $appointmenttypeid = null,
		protected ?string $patientinstructions = null,
	) {
	}


	public function defaultBody(): array
	{
		return array_filter([
			'note' => $this->note,
			'status' => $this->status,
			'providerid' => $this->providerid,
			'approximatedate' => $this->approximatedate,
			'appointmenttypeid' => $this->appointmenttypeid,
			'patientinstructions' => $this->patientinstructions,
		]);
	}
}
