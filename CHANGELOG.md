# Changelog
All changes to this project will be documented in this file.

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
