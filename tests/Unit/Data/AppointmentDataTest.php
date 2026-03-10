<?php

use ChrisReedIO\AthenaSDK\Data\Appointment\AppointmentData;

it('maps representative appointment payload fields into a dto', function () {
    $appointment = AppointmentData::fromArray([
        'appointmentid' => '1001',
        'patientid' => '2002',
        'appointmenttypeid' => '3003',
        'appointmenttype' => 'Follow Up',
        'scheduleddatetime' => '2025-02-21T13:45:00-05:00',
        'lastmodified' => '2025-02-21T14:00:00-05:00',
        'appointmentnotes' => [
            ['note' => 'Bring insurance card'],
        ],
        'appointmentcopay' => [
            'collectedforappointment' => 15,
            'insurancecopay' => 30,
            'collectedforother' => 0,
        ],
        'patient' => [
            'patientid' => 2002,
            'firstname' => 'Avery',
            'lastname' => 'Stone',
            'dob' => '1990-03-15',
            'address1' => '456 Oak Ave',
            'city' => 'Dallas',
            'state' => 'TX',
            'zip' => '75001',
        ],
        'startcheckin' => '02/21/2025 13:30:00',
        'checkindatetime' => '02/21/2025 13:35:00',
        'startcheckoutdatetime' => '02/21/2025 14:15:00',
        'checkoutdatetime' => '02/21/2025 14:20:00',
        'cancelleddatetime' => '02/21/2025 15:00:00',
        'patientlocationid' => 'LOC-9',
        'rescheduledappointmentid' => '1000',
    ]);

    expect($appointment->athenaId)->toBe('1001')
        ->and($appointment->patientId)->toBe('2002')
        ->and($appointment->appointmentType)->toBe('Follow Up')
        ->and($appointment->scheduledDateTime)->toBeInstanceOf(\DateTimeInterface::class)
        ->and($appointment->scheduledDateTime?->format(\DateTimeInterface::ATOM))->toBe('2025-02-21T13:45:00-05:00')
        ->and($appointment->lastModified)->toBeInstanceOf(\DateTimeInterface::class)
        ->and($appointment->lastModified?->format(\DateTimeInterface::ATOM))->toBe('2025-02-21T14:00:00-05:00')
        ->and($appointment->appointmentCopay?->insuranceCopay)->toBe(30)
        ->and($appointment->patient?->firstName)->toBe('Avery')
        ->and($appointment->patient?->address?->street)->toBe('456 Oak Ave')
        ->and($appointment->startCheckIn?->format('m/d/Y H:i:s'))->toBe('02/21/2025 13:30:00')
        ->and($appointment->checkOutTime?->format('m/d/Y H:i:s'))->toBe('02/21/2025 14:20:00')
        ->and($appointment->cancelledAt?->format('m/d/Y H:i:s'))->toBe('02/21/2025 15:00:00')
        ->and($appointment->patientLocationId)->toBe('LOC-9')
        ->and($appointment->rescheduledAppointmentId)->toBe('1000');
});
