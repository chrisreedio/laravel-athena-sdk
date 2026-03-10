<?php

use ChrisReedIO\AthenaSDK\Data\AddressData;

it('prefers address1 when both address fields are present', function () {
    $address = AddressData::fromArray([
        'address1' => '123 Main St',
        'address' => 'Legacy Street',
        'address2' => 'Suite 400',
        'city' => 'Austin',
        'state' => 'TX',
        'zip' => '78701',
        'countrycode' => 'US',
        'countrycode3166' => 'USA',
    ]);

    expect($address->street)->toBe('123 Main St')
        ->and($address->suite)->toBe('Suite 400')
        ->and($address->city)->toBe('Austin')
        ->and($address->state)->toBe('TX')
        ->and($address->zip)->toBe('78701')
        ->and($address->countryCode)->toBe('US')
        ->and($address->countryCode3166)->toBe('USA');
});

it('falls back to the legacy address field when needed', function () {
    $address = AddressData::fromArray([
        'address' => 'Legacy Street',
    ]);

    expect($address->street)->toBe('Legacy Street');
});
