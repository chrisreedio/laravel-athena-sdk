# Contributing

## Local Setup

Install dependencies and prepare the Testbench workbench:

```bash
composer install
composer run prepare
```

## Checks

Run the package checks before opening a pull request:

```bash
composer test
composer analyse
vendor/bin/pint --test
```

## Pull Requests

- Keep changes focused and scoped to the package.
- Add or update tests when behavior changes.
- Update `README.md` when public package usage or setup changes.
