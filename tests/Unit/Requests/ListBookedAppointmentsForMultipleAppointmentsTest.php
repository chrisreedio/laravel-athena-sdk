<?php

use ChrisReedIO\AthenaSDK\Requests\Appointments\Appointment\ListBookedAppointmentsForMultipleAppointments;

it('accepts appointment ids as an array and serializes them as a comma delimited query value', function () {
    $request = new ListBookedAppointmentsForMultipleAppointments(
        appointmentids: ['100', '200', '300'],
        showpatientdetail: true,
    );

    expect($request->defaultQuery())->toBe([
        'appointmentids' => '100,200,300',
        'showpatientdetail' => true,
    ]);
});

it('resolves the multiple booked appointments endpoint', function () {
    $request = new ListBookedAppointmentsForMultipleAppointments(
        appointmentids: ['1'],
    );

    expect($request->resolveEndpoint())->toBe('/appointments/booked/multiple');
});
