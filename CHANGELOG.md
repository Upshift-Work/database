# `CHANGELOG.md`

This file will outline the changes made by Breki Tomasson as he brings this project up to date with modern versions of
PHP and Laravel. As several of these changes are fairly opinionated, I will try to explain my reasoning behind them and
clarify which changes are required to bring this project up to date and which are optional, in case this fork is going
to be used to bring the original repository up to date.

## Initial Changes (2023-03-04)

- **Opinionated**: Added `brekitomasson/php-cs-fixer-breki-config` for code style enforcement.
- **Required**: Updated `laravel/database` to `^10.0`.
- **Required**: Updated `phpunit/phpunit` to `^9.0`.
- **Suggested**: Added `ext-pdo` to requirements as it is used in the code.
- Added "scripts" section in `composer.json` for running tests and code style checks.
- Added `CHANGELOG.md` to track changes made by this fork.
- Added `roave/security-advisories` to `require-dev` to ensure that no vulnerable dependencies are installed.
- Removed `codeclimate/php-test-reporter` as it is no longer maintained.
- Removed files related to CodeClimate, TravisCI, etc.
- Updated `mockery/mockery` to `^1.5.1` as this is the version required by `laravel/framework` v10.x.
- Updated `ramsey/uuid` to `^4.7` as this is the version required by `laravel/framework` v10.x.
- Rewrote tests to take advantage of new features in PHPUnit 9.x.
- Removed a whole lot of `@param` and `@return` Docblocks that could be replaced by typehints.
- Added explicit imports of `Mockery` and `DBO` in tests.
- Rewrote uses of `Illuminate\Support\Fluent` to use `->get('attribute')` instead of `->attribute`.
- Rewrote uses of `Illuminate\Support\Fluent` to use `->get($attribute)` instead of `->{$attribute}`.
- Rewrote uses of `Illuminate\Database\Eloquent\Model` to use `->getAttribute($attribute)` instead of `->{$attribute}`.
- Added `psr-4` section to `autoload-dev` in `composer.json` to autoload test classes and namespace them.
