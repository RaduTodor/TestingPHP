# Steps needed in order to run the application/tests:

1) Update composer dependencies by running `composer update` in the project root.
2) Generate Codeception files by running `/vendor/bin/codecept bootstrap` in the project root.
3) Create the file `/tests/acceptance.suite.yml` with the following content, replacing text where needed:
```yml
actor: AcceptanceTester
modules:
    enabled:
        - PhpBrowser:
            url: <url-to-your-website (eg. http://php.local/)>
        - \Helper\Acceptance
```
4) Create the file `/tests/functional.suite.yml` with the following content, replacing text where needed:
```yml
actor: FunctionalTester
modules:
    enabled:
        - PhpBrowser:
              url: <url-to-your-website (eg. http://php.local/)>
        - \Helper\Functional
```
5) Create the file `/tests/unit.suite.yml` with the following content:
```yml
actor: UnitTester
modules:
    enabled:
        - Asserts
        - \Helper\Unit
```

Done! :)