# ATS

Legacy PHP applicant tracking system with a public API, cPanel administration screens, applicant onboarding, job posting, survey, wallet, vendor and reporting workflows.

## Requirements

- PHP 8.1 or newer
- Composer
- MySQL or MariaDB
- Apache or another PHP-capable web server

## Setup

```sh
composer install
cp .env.example .env
```

Create a database and configure the values from `.env.example`. The application expects the public entry points at the repository root, `api/`, and `cpanel/`.

## Local Run

```sh
docker compose up --build
```

Open `http://localhost:8080/`. The container serves the PHP application and exposes the source tree for local development.

## Quality Checks

```sh
composer validate --strict
composer run lint
composer run typecheck
composer run test
composer audit
```

CircleCI runs these checks for repository changes. The test suite includes contract checks for routing, configuration, security-sensitive files and operational endpoints.

## Environment

Configuration should come from environment variables. Do not commit production `.env` files, database credentials, SMS gateway tokens, or mail credentials.

## Architecture

- `api/`: mobile/API endpoints.
- `cpanel/`: administrative dashboard, onboarding, applicants, vendors, billing, reports and settings.
- `cpanel/data/`: form handlers and write-side actions.
- `data/`: public authentication and registration handlers.

## Security Notes

New work should prefer prepared statements, environment-based secrets, server-side validation and password hashing with `password_hash`. Existing MD5 password compatibility is retained for legacy data and should be migrated carefully.
