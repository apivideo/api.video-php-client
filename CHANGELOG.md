# Changelog
All changes to this project will be documented in this file.

## [1.4.3] - 2024-09-30
- Add /tags API endpoint

## [1.4.2] - 2024-09-16
- Add discarded video endpoints

## [1.4.1] - 2024-09-05
- Add sort parameters in analytics endpoints

## [1.4.0] - 2024-07-29
- Add new analytics methods
- Add livestream complete() method

## [1.3.2] - 2024-02-19
- Update VideoStatusIngest enum

## [1.3.1] - 2023-06-28
- Added missing AuthenticationFailedException

## [1.3.0] - 2023-06-28
- Introducing new live streams restream feature
- Introducing new analytics endpoints

## [1.2.6] - 2022-09-13
- period parameter is now mandatory in analytics endpoints

## [1.2.5] - 2022-07-05
- Add SDK origin header

## [1.2.4] - 2022-04-21
- Fix `video.publishedAt` type

## [1.2.3] - 2022-03-21
- Add `ingest.receivedParts` attribute in GET /videos/{video_id}/status

## [1.2.2] - 2022-03-09
- Add Origin identification headers

## [1.2.1] - 2022-01-24
- Add applicationName parameter (to allow user agent extension)

## [1.2.0] - 2022-01-07
- Add watermark endpoints
- Add video clips
- Fix tags[] query parameter format of GET /videos
- Correctly distinguish between "undefined", "defined" and "null" values if the playerId parameter of PATCH /videos/{videoId}

## [1.1.0] - 2021-12-06
- Add `name` attribute in player themes

## [1.0.0] - 2021-11-15
- Add support of `progressive uploads`
