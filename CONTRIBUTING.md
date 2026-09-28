# Contributing

## Local Checks

Run these before opening a pull request:

```sh
composer validate --strict
composer run lint
composer run typecheck
composer run test
composer audit
```

Keep changes focused and include notes for any database, configuration or deployment impact.
