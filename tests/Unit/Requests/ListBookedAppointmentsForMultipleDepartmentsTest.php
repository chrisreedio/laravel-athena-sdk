<?php

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListBookedAppointmentsForMultipleDepartments;

it('accepts patient ids as an array and serializes them as a comma delimited query value', function () {
    $request = new ListBookedAppointmentsForMultipleDepartments(
        startdate: '01/01/2025',
        enddate: '01/31/2025',
        patientid: ['100', '200'],
        departmentid: ['1', '2'],
    );

    expect($request->defaultQuery())->toBe([
        'enddate' => '01/31/2025',
        'startdate' => '01/01/2025',
        'departmentid' => '1,2',
        'patientid' => '100,200',
    ]);
});
