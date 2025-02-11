# Changelog

## [3.0.0](https://github.com/phalcon/traits/releases/tag/3.0.0) (2025-02-11)


### Changed

-   Changed minimum PHP version to 8.1

### Added

-   Added `getCachedInstance` to the FactoryTrait to return the same object once instantiated

## [2.0.4](https://github.com/phalcon/traits/releases/tag/2.0.4) (2024-12-28)


### Fixed

-   Added return types to all methods
-   Enabled PHP Codesniffer in the CI run
-   Enabled PHPStan with max configuration and made necessary adjustments
-   Enabled Sonarqube in the CI run
-   Added quality badges from Sonarqube

## [2.0.3](https://github.com/phalcon/traits/releases/tag/2.0.3) (2023-05-01)

### Fixed

-   Added `staticToCamelize()` for calling `toCamelize()` statically. [#41](https://github.com/phalcon/traits/pull/41)
-   Added `staticToLower()` for calling `toLower()` statically. [#41](https://github.com/phalcon/traits/pull/41)
-   Added `staticToUncamelize()` for calling `toUncamelize()` statically. [#41](https://github.com/phalcon/traits/pull/41)
-   Added `staticToUpper()` for calling `toUpper()` statically. [#41](https://github.com/phalcon/traits/pull/41)
-   Added `staticPhpIniGet()` for calling `phpIniGet()` statically. [#41](https://github.com/phalcon/traits/pull/41)
-   Added `staticPhpIniGetBool()` for calling `phpIniGetBool()` statically. [#41](https://github.com/phalcon/traits/pull/41)
-   Added `staticPhpIniGetInt()` for calling `phpIniGetInt()` statically. [#41](https://github.com/phalcon/traits/pull/41)
-   Added `staticPhpParseIniFile()` for calling `phpParseIniFile()` statically. [#41](https://github.com/phalcon/traits/pull/41)

## [2.0.2](https://github.com/phalcon/traits/releases/tag/2.0.2) (2023-01-15)

### Fixed

-   Added missing `use` statements [#40](https://github.com/phalcon/traits/pull/40)

## [2.0.1](https://github.com/phalcon/traits/releases/tag/2.0.1) (2023-01-03)

### Fixed

-   Minor optimization for `Phalcon\Traits\Php\JsonTrait` [#17](https://github.com/phalcon/traits/pull/17)
-   Corrected `CHANGELOG.md` to an easier to read format [#35](https://github.com/phalcon/traits/issues/35)

## [2.0.0](https://github.com/phalcon/traits/releases/tag/2.0.0) (2023-01-01)

### Added
 
-   Added `Phalcon\Traits\Php\IniTrait` [#34](https://github.com/phalcon/traits/issues/34)

## [1.3.0](https://github.com/phalcon/traits/releases/tag/1.3.0) (2022-10-04)

### Added

-   Added `Phalcon\Traits\Helper\Str\CamelizeTrait` [#33](https://github.com/phalcon/traits/issues/33)
-   Added `Phalcon\Traits\Helper\Str\UncamelizeTrait` [#33](https://github.com/phalcon/traits/issues/33)

## [1.2.1](https://github.com/phalcon/traits/releases/tag/1.2.1) (2021-11-17)

## [1.2.0](https://github.com/phalcon/traits/releases/tag/1.2.0) (2021-11-06)

### Changed

-   Changed `Phalcon\Php\FileTrait::phpFclose` visibility to `protected` [#32](https://github.com/phalcon/traits/issues/32)

### Removed

-   Removed `Phalcon\Factory\Factory` constructor [#32](https://github.com/phalcon/traits/issues/32)

## [1.1.0](https://github.com/phalcon/traits/releases/tag/1.1.0) (2021-10-30)

### Fixed

-   Corrected PDS structure by public folder [#30](https://github.com/phalcon/traits/issues/30)

### Added

-   Added `Phalcon\Traits\Php\UrlTrait` [#31](https://github.com/phalcon/traits/issues/31)

## [1.0.0](https://github.com/phalcon/traits/releases/tag/1.0.0) (2021-10-27)

### Fixed

-   Fixed `Phalcon\Traits\Php` added stricter types
-   Fixed `Phalcon\Traits\Php\FileTrait` corrected namespace

### Added

-   Added `Phalcon\Traits\Helper\Str\DirSeparatorTrait` [#29](https://github.com/phalcon/traits/issues/29)
-   Added `Phalcon\Traits\Helper\Str\DirFromFileTrait` [#28](https://github.com/phalcon/traits/issues/28)
-   Added `Phalcon\Traits\Php\InfoTrait` [#27](https://github.com/phalcon/traits/issues/27)
-   Added `Phalcon\Traits\Php\JsonTrait` [#26](https://github.com/phalcon/traits/issues/26)
-   Added `Phalcon\Traits\Php\FileTrait` [#25](https://github.com/phalcon/traits/issues/25)
-   Added `Phalcon\Traits\Helper\Str\InterpolateTrait` [#24](https://github.com/phalcon/traits/issues/24)
-   Added `Phalcon\Traits\Helper\Str\UpperTrait` [#23](https://github.com/phalcon/traits/issues/23)
-   Added `Phalcon\Traits\Helper\Str\LowerTrait` [#22](https://github.com/phalcon/traits/issues/22)
-   Added `Phalcon\Traits\Helper\Str\StartsWithTrait` [#21](https://github.com/phalcon/traits/issues/21)
-   Added `Phalcon\Traits\Helper\Str\EndsWithTrait` [#20](https://github.com/phalcon/traits/issues/20)
-   Added `Phalcon\Traits\Arr\FilterTrait` [#19](https://github.com/phalcon/traits/issues/19)
-   Added `Phalcon\Traits\Factory\FactoryTrait` [#18](https://github.com/phalcon/traits/issues/18)
