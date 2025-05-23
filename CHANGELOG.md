# Changelog

All notable changes to `laravel-athena-sdk` will be documented in this file.

## v1.0.0-alpha.37 - 2025-04-23

### What's Changed

* Laravel 12 Support by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/46

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.36...v1.0.0-alpha.37

## v1.0.0-alpha.36 - 2025-02-21

### What's Changed

* 🔧 fix: adjusted default values in `ProviderData.php` to `null` by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/45

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.35...v1.0.0-alpha.36

## v1.0.0-alpha.35 - 2025-02-21

### What's Changed

* Feature/referring providers resource by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/44

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.34...v1.0.0-alpha.35

## v1.0.0-alpha.34 - 2025-02-21

### What's Changed

* ✨ feat: updated provider requests and subscriptions for referring providers by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/43

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.33...v1.0.0-alpha.34

## v1.0.0-alpha.33 - 2025-02-21

### What's Changed

* ✨ feat: added `referringProviders` method to `AthenaConnector` by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/42

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.32...v1.0.0-alpha.33

## v1.0.0-alpha.32 - 2025-02-10

### What's Changed

* fix: corrected typeName key in ProviderData.php by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/41

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.31...v1.0.0-alpha.32

## v1.0.0-alpha.31 - 2025-02-10

### What's Changed

* build(deps): bump aglipanci/laravel-pint-action from 2.4 to 2.5 by @dependabot in https://github.com/chrisreedio/laravel-athena-sdk/pull/39
* ✨ feat: added new provider type fields in `ProviderData.php` by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/40

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.30...v1.0.0-alpha.31

## v1.0.0-alpha.30 - 2025-01-28

### What's Changed

* ✨ feat: updated `fromArray` to prioritize `address1` for street by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/38

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.29...v1.0.0-alpha.30

## v1.0.0-alpha.29 - 2025-01-28

### What's Changed

* build(deps): bump dependabot/fetch-metadata from 2.2.0 to 2.3.0 by @dependabot in https://github.com/chrisreedio/laravel-athena-sdk/pull/36
* fix: corrected key in `fromArray` method of `AddressData` class by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/37

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.28...v1.0.0-alpha.29

## v1.0.0-alpha.28 - 2025-01-22

### What's Changed

* build(deps): bump dependabot/fetch-metadata from 2.1.0 to 2.2.0 by @dependabot in https://github.com/chrisreedio/laravel-athena-sdk/pull/34
* ✨ feat: added ReferringProviders resources & updated dependencies by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/35

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.27...v1.0.0-alpha.28

## v1.0.0-alpha.27 - 2024-05-14

### What's Changed

* 🐛 fix(data): corrected `createsEncounter` mapping in `AppointmentTypeData` by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/33

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.26...v1.0.0-alpha.27

## v1.0.0-alpha.26 - 2024-05-13

### What's Changed

* ✨ feat: extended `AthenaData` class and added nullable properties by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/32
* Handling conversion of `string booleans` to `bool` via new `toBool` method on `AthenaData` abstract DTO class by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/32

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.25...v1.0.0-alpha.26

## v1.0.0-alpha.25 - 2024-05-09

### What's Changed

* build(deps): bump aglipanci/laravel-pint-action from 2.3.1 to 2.4 by @dependabot in https://github.com/chrisreedio/laravel-athena-sdk/pull/29
* build(deps): bump dependabot/fetch-metadata from 1.6.0 to 2.1.0 by @dependabot in https://github.com/chrisreedio/laravel-athena-sdk/pull/30
* build(deps): bump ramsey/composer-install from 2 to 3 by @dependabot in https://github.com/chrisreedio/laravel-athena-sdk/pull/20
* ✨ feat(`PatientData`): Added address fields to patient data model by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/31

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.24...v1.0.0-alpha.25

## v1.0.0-alpha.24 - 2024-03-21

### What's Changed

* ✨ feat: Added `departmentid` and changed `patientid` type in `UpdateP… by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/27

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.23...v1.0.0-alpha.24

## v1.0.0-alpha.23 - 2024-03-21

### What's Changed

* ✨ feat(patient-data): added `customFields` to `PatientData` by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/26

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.22...v1.0.0-alpha.23

## v1.0.0-alpha.22 - 2024-03-21

### What's Changed

* ✨ feat(`GetPatient.php`): Defaulted certain options to true by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/25

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.21...v1.0.0-alpha.22

## v1.0.0-alpha.21 - 2024-03-21

### What's Changed

* 🐛 fix(data): corrected date format in `ChartAlertData` by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/24

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.20...v1.0.0-alpha.21

## v1.0.0-alpha.20 - 2024-03-21

### What's Changed

* Patient's "Chart Alerts" - "CRUD" Operations by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/23

This is a new experimental release of the Chart Alert operations. Currently "use at your own risk".

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.19...v1.0.0-alpha.20

## v1.0.0-alpha.19 - 2024-03-19

### What's Changed

* 🐛 fix(athena-connector): adjusted token expiration by subtracting a minute by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/22

#### This is an experimental release!

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.18...v1.0.0-alpha.19

## v1.0.0-alpha.18 - 2024-03-19

### What's Changed

* ✨ feat(appointment-data): Parsing raw insurances field by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/21

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.17...v1.0.0-alpha.18

## v1.0.0-alpha.17 - 2024-02-21

### What's Changed

* feat: extend ProviderData with new attributes by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/19

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.16...v1.0.0-alpha.17

## v1.0.0-alpha.16 - 2024-02-14

### What's Changed

* Patient Privacy Endpoints by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/18

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.15...v1.0.0-alpha.16

## v1.0.0-alpha.15 - 2024-02-06

### What's Changed

* feat: add `get` appointment details to appointment resource by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/17

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.14...v1.0.0-alpha.15

## v1.0.0-alpha.14 - 2024-02-02

### What's Changed

* Added Patient Status / Location Handling by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/16

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.13...v1.0.0-alpha.14

## v1.0.0-alpha.13 - 2024-01-20

### What's Changed

* feat: enable showPatientDetail in AppointmentSubscriptions by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/15

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.12...v1.0.0-alpha.13

## v1.0.0-alpha.12 - 2024-01-19

### What's Changed

* feat: add patient location list handling by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/14

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.11...v1.0.0-alpha.12

## v1.0.0-alpha.11 - 2024-01-18

### What's Changed

* feat: filter patientLocations by departmentId by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/13

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.10...v1.0.0-alpha.11

## v1.0.0-alpha.10 - 2024-01-18

### What's Changed

* fix: correct key existence checks in AppointmentData by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/12

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.9...v1.0.0-alpha.10

## v1.0.0-alpha.9 - 2024-01-18

### What's Changed

* refactor: improve `lastModified` data handling by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/11

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.8...v1.0.0-alpha.9

## v1.0.0-alpha.8 - 2024-01-18

### What's Changed

* feat: extend AppointmentData with base class and new fields by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/10

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.7...v1.0.0-alpha.8

## v1.0.0-alpha.7 - 2024-01-18

### What's Changed

* feat: add check-in/out times to AppointmentData by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/9

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.6...v1.0.0-alpha.7

## v1.0.0-alpha.5 - 2024-01-16

### What's Changed

* feat: add patient demographic details to UpdatePatient by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/7

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.4...v1.0.0-alpha.5

## v1.0.0-alpha.4 - 2024-01-16

### What's Changed

* feat: add showAll param to Departments list by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/6

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.3...v1.0.0-alpha.4

## v1.0.0-alpha.3 - 2024-01-13

### What's Changed

* Practice Configuration Data by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/5

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.2...v1.0.0-alpha.3

## v1.0.0-alpha.2 - 2024-01-11

### What's Changed

* refactor: streamline check-in class names by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/4

Added `fields` method to the check in resource.

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/compare/v1.0.0-alpha.1...v1.0.0-alpha.2

## v1.0.0-alpha.1 - 2024-01-06

### What's Changed

* Bump aglipanci/laravel-pint-action from 2.3.0 to 2.3.1 by @dependabot in https://github.com/chrisreedio/laravel-athena-sdk/pull/1
* Prepping for Alpha Release by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/2
* Prepping for Alpha.1 by @chrisreedio in https://github.com/chrisreedio/laravel-athena-sdk/pull/3

### New Contributors

* @dependabot made their first contribution in https://github.com/chrisreedio/laravel-athena-sdk/pull/1
* @chrisreedio made their first contribution in https://github.com/chrisreedio/laravel-athena-sdk/pull/2

**Full Changelog**: https://github.com/chrisreedio/laravel-athena-sdk/commits/v1.0.0-alpha.1
