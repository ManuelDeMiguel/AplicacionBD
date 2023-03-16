# Change Log

## [3.3.2] - 2022-09-19

### Added
- N/A

### Changed
- Skip some daylight savings time tests for PHP 8.1 daylight savings time weirdness (#146)

### Fixed
- Changed string interpolations to work better with PHP 8.2 (#142)

## [3.3.1] - 2022-01-18

### Added
- N/A

### Changed
- N/A

### Fixed
- Fixed issue when timezones had no transition, which can occur over very short timespans (#134)

## [3.3.0] - 2022-01-13

### Added
- Added ability to register your own expression aliases (#132)

### Changed
- Changed how Day of Week and Day of Month resolve when one or the other is `*` or `?`

### Fixed
- PHPStan should no longer error out

## [3.2.4] - 2022-01-12

### Added
- N/A

### Changed
- Changed how Day of Week increment/decrement to help with DST changes (#131)

### Fixed
- N/A

## [3.2.3] - 2022-01-05

### Added
- N/A

### Changed
- Changed how minutes and hours increment/decrement to help with DST changes (#131)

### Fixed
- N/A

## [3.2.2] - 2022-01-05

### Added
- N/A

### Changed
- Marked some methods `@internal` (#124)

### Fixed
- Fixed issue with small ranges and large steps that caused an error with `range()` (#88)
- Fixed issue where wraparound logic incorrectly considered high bound on range (#89)

## [3.2.1] - 2022-01-04

### Added
- N/A

### Changed
- Added PHP 8.1 to testing (#125)

### Fixed
- Allow better mixture of ranges, steps, and lists (#122)
- Fixed return order when multiple dates are requested and inverted (#121)
- Better handling over DST (#115)
- Fixed PHPStan tests (#130)

## [3.2.0] - 2022-01-04

### Added
- Added alias for `@midnight` (#117)

### Changed
- Improved testing for instance of field in tests (#105)
- Optimization for determining multiple run dates (#75)
- `CronExpression` properties changed from private to protected (#106)

### Fixed
- N/A

## [3.1.0] - 2020-11-24

### Added
- Added `CronExpression::getParts()` method to get parts of the expression as an array (#83)

### Changed
- Changed to Interfaces for some type hints (#97, #86)
- Dropped minimum PHP version to 7.2
- Few syntax changes for phpstan compatibility (#93)

### Fixed
- N/A

### Deprecated
- Deprecated `CronExpression::factory` in favor of the constructor (#56)
- Deprecated `CronExpression::YEAR` as a formality, the functionality is already removed (#87)

## [3.0.1] - 2020-10-12
### Added
- Added support for PHP 8 (#92)
### Changed
- N/A
### Fixed
- N/A

## [3.0.0] - 2020-03-25

**MAJOR CHANGE** - In previous versions of this library, setting both a "Day of Month" and a "Day of Week" would be interpreted as an `AND` statement, not an `OR` statement. For example:

`30 0 1 * 1`

would evaluate to "Run 30 minutes after the 0 hour when the Day Of Month is 1 AND a Monday" instead of "Run 30 minutes after the 0 hour on Day Of Month 1 OR a Monday", where the latter is more inline with