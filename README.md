# Athena EHR API SDK for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/chrisreedio/laravel-athena-sdk.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/laravel-athena-sdk)
[![Tests](https://img.shields.io/github/actions/workflow/status/chrisreedio/laravel-athena-sdk/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/chrisreedio/laravel-athena-sdk/actions/workflows/run-tests.yml)
[![Code Style](https://img.shields.io/github/actions/workflow/status/chrisreedio/laravel-athena-sdk/fix-php-code-style-issues.yml?branch=main&label=style&style=flat-square)](https://github.com/chrisreedio/laravel-athena-sdk/actions/workflows/fix-php-code-style-issues.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/chrisreedio/laravel-athena-sdk.svg?style=flat-square)](https://packagist.org/packages/chrisreedio/laravel-athena-sdk)

`laravel-athena-sdk` is a Laravel-first wrapper around Athenahealth's API. It provides a configured connector, resource-style entry points for common API domains, and DTOs for mapping Athena responses into typed PHP objects.

The package is best suited for applications that want a package-native integration layer instead of building raw Saloon requests and response mapping from scratch.

## Installation

```bash
composer require chrisreedio/laravel-athena-sdk
```

Publish the package config:

```bash
php artisan vendor:publish --tag="laravel-athena-sdk-config"
```

Set the required Athena credentials in your environment:

```ini
ATHENA_BASE_URL=https://api.preview.platform.athenahealth.com
ATHENA_CLIENT_ID=your-client-id
ATHENA_CLIENT_SECRET=your-client-secret
ATHENA_PRACTICE_ID=your-practice-id
ATHENA_LEAVE_UNPROCESSED=false
```

## Configuration

The package currently publishes a config file only. There are no package views or package migrations to publish.

The connector authenticates with Athena using the client credentials grant flow and caches the access token under the `athena_access_token` cache key.

## Usage

Instantiate the connector directly:

```php
use ChrisReedIO\AthenaSDK\AthenaConnector;

$athena = new AthenaConnector();

$appointment = $athena->appointments()->get(
    appointmentId: 123456,
);
```

Or use the facade:

```php
use ChrisReedIO\AthenaSDK\Facades\Athena;

$providers = Athena::providers();
```

The top-level resources currently exposed by the connector are:

- `appointments()`
- `departments()`
- `patients()`
- `providers()`
- `referringProviders()`
- `practice()`
- `encounters()`

## Public API

The supported Laravel-facing wrapper surface is documented in [`docs/public-api.md`](docs/public-api.md).

That document covers:

- the connector and facade entry points
- the resource methods exposed through `AthenaConnector`
- the nested resource helpers exposed from those top-level resources

Raw request classes under `src/Requests` are still available for lower-level use, but they are not the primary API documented in this package.

## Local Checks

```bash
composer test
composer analyse
composer format:test
```

## Additional Notes

- [`docs/endpoints.md`](docs/endpoints.md) tracks endpoint coverage work still to be validated.
- `composer analyse` runs cleanly and is enforced in CI alongside tests and formatting checks.

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for release history.

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for local setup and pull request expectations.

## Security

See [SECURITY.md](SECURITY.md) for how to report vulnerabilities.

## License

Released under the [MIT license](LICENSE.md).
