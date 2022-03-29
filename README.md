[![badge](https://img.shields.io/twitter/follow/api_video?style=social)](https://twitter.com/intent/follow?screen_name=api_video) &nbsp; [![badge](https://img.shields.io/github/stars/apivideo/api.video-php-client?style=social)](https://github.com/apivideo/api.video-php-client) &nbsp; [![badge](https://img.shields.io/discourse/topics?server=https%3A%2F%2Fcommunity.api.video)](https://community.api.video)
![](https://github.com/apivideo/API_OAS_file/blob/master/apivideo_banner.png)
<h1 align="center">api.video PHP client</h1>

[api.video](https://api.video) is the video infrastructure for product builders. Lightning fast video APIs for integrating, scaling, and managing on-demand & low latency live streaming features in your app.


# Table of contents

- [Project description](#project-description)
- [Getting started](#getting-started)
  - [Installation](#installation)
  - [Initialization](#initialization)
    - [Symfony HTTP client example](#symfony-http-client-example)
  - [Code sample](#code-sample)
    - [Client initialization](#client-initialization)
    - [Create a video](#create-a-video)
    - [Upload a video](#upload-a-video)
- [Documentation](#documentation)
  - [API Endpoints](#api-endpoints)
    - [CaptionsApi](#captionsapi)
    - [ChaptersApi](#chaptersapi)
    - [LiveStreamsApi](#livestreamsapi)
    - [PlayerThemesApi](#playerthemesapi)
    - [RawStatisticsApi](#rawstatisticsapi)
    - [UploadTokensApi](#uploadtokensapi)
    - [VideosApi](#videosapi)
    - [WatermarksApi](#watermarksapi)
    - [WebhooksApi](#webhooksapi)
  - [Models](#models)
  - [Authentication](#authentication)
  - [Chunks](#chunks)
  - [Tests](#tests)
- [Have you gotten use from this API client?](#have-you-gotten-use-from-this-api-client-)
- [Contribution](#contribution)

# Project description

api.video's PHP API client streamlines the coding process. Chunking files is handled for you, as is pagination and refreshing your tokens.

# Getting started

## Installation

```shell
composer require api-video/php-api-client
```

## Initialization

Due to PHP PSR support, you must initialize the client with 3 to 5 arguments:
1. Base URI, which can be either `https://sandbox.api.video` or `https://ws.api.video`
2. Your API key, available on your account
3. HTTP client
4. (Request factory)
5. (Stream factory)

Note : If the HTTP client also implements RequestFactoryInterface and StreamFactoryInterface, then it is not necessary to pass this object in 4th and 5th argument.

### Symfony HTTP client example

The Symfony HTTP client has the triple advantage of playing the role of **HTTP client**, but also of **request factory** and **stream factory**. It is therefore sufficient to pass it as an argument 3 times.

If the HTTP client isn't yet in your project, you can add it with:

```shell
composer require symfony/http-client
composer require nyholm/psr7
```

## Code sample

### Client initialization

```php
<?php
require __DIR__ . '/vendor/autoload.php';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new \ApiVideo\Client\Client(
    'https://sandbox.api.video',
    'YOUR_API_KEY',
    $httpClient
);
?>
```

### Create a video

```php
$payload = (new VideoCreationPayload())
    ->setTitle('Test video creation');

// the `$client` must already be initialized.
$video = $client->videos()->create($payload);
```

### Upload a video

```php
$payload = (new VideoCreationPayload())
    ->setTitle('Test video creation');

$video = $client->videos()->create($payload);

// the `$client` must already be initialized.
$client->videos()->upload(
    $video->getVideoId(),
    new SplFileObject(__DIR__.'/../earth.mp4')
);
```

# Documentation

## API Endpoints

All URIs are relative to `https://ws.api.video`.


### CaptionsApi

#### Retrieve an instance of CaptionsApi

```php
// The $client must already be initialized
$captions = $client->captions();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](docs/Api/CaptionsApi.md#delete) | **DELETE** `/videos/{videoId}/captions/{language}` | Delete a caption
[**list**](docs/Api/CaptionsApi.md#list) | **GET** `/videos/{videoId}/captions` | List video captions
[**get**](docs/Api/CaptionsApi.md#get) | **GET** `/videos/{videoId}/captions/{language}` | Retrieve a caption
[**update**](docs/Api/CaptionsApi.md#update) | **PATCH** `/videos/{videoId}/captions/{language}` | Update a caption
[**upload**](docs/Api/CaptionsApi.md#upload) | **POST** `/videos/{videoId}/captions/{language}` | Upload a caption


### ChaptersApi

#### Retrieve an instance of ChaptersApi

```php
// The $client must already be initialized
$chapters = $client->chapters();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](docs/Api/ChaptersApi.md#delete) | **DELETE** `/videos/{videoId}/chapters/{language}` | Delete a chapter
[**list**](docs/Api/ChaptersApi.md#list) | **GET** `/videos/{videoId}/chapters` | List video chapters
[**get**](docs/Api/ChaptersApi.md#get) | **GET** `/videos/{videoId}/chapters/{language}` | Retrieve a chapter
[**upload**](docs/Api/ChaptersApi.md#upload) | **POST** `/videos/{videoId}/chapters/{language}` | Upload a chapter


### LiveStreamsApi

#### Retrieve an instance of LiveStreamsApi

```php
// The $client must already be initialized
$liveStreams = $client->liveStreams();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](docs/Api/LiveStreamsApi.md#delete) | **DELETE** `/live-streams/{liveStreamId}` | Delete a live stream
[**deleteThumbnail**](docs/Api/LiveStreamsApi.md#deleteThumbnail) | **DELETE** `/live-streams/{liveStreamId}/thumbnail` | Delete a thumbnail
[**list**](docs/Api/LiveStreamsApi.md#list) | **GET** `/live-streams` | List all live streams
[**get**](docs/Api/LiveStreamsApi.md#get) | **GET** `/live-streams/{liveStreamId}` | Retrieve live stream
[**update**](docs/Api/LiveStreamsApi.md#update) | **PATCH** `/live-streams/{liveStreamId}` | Update a live stream
[**create**](docs/Api/LiveStreamsApi.md#create) | **POST** `/live-streams` | Create live stream
[**uploadThumbnail**](docs/Api/LiveStreamsApi.md#uploadThumbnail) | **POST** `/live-streams/{liveStreamId}/thumbnail` | Upload a thumbnail


### PlayerThemesApi

#### Retrieve an instance of PlayerThemesApi

```php
// The $client must already be initialized
$playerThemes = $client->playerThemes();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](docs/Api/PlayerThemesApi.md#delete) | **DELETE** `/players/{playerId}` | Delete a player
[**deleteLogo**](docs/Api/PlayerThemesApi.md#deleteLogo) | **DELETE** `/players/{playerId}/logo` | Delete logo
[**list**](docs/Api/PlayerThemesApi.md#list) | **GET** `/players` | List all player themes
[**get**](docs/Api/PlayerThemesApi.md#get) | **GET** `/players/{playerId}` | Retrieve a player
[**update**](docs/Api/PlayerThemesApi.md#update) | **PATCH** `/players/{playerId}` | Update a player
[**create**](docs/Api/PlayerThemesApi.md#create) | **POST** `/players` | Create a player
[**uploadLogo**](docs/Api/PlayerThemesApi.md#uploadLogo) | **POST** `/players/{playerId}/logo` | Upload a logo


### RawStatisticsApi

#### Retrieve an instance of RawStatisticsApi

```php
// The $client must already be initialized
$rawStatistics = $client->rawStatistics();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**listLiveStreamSessions**](docs/Api/RawStatisticsApi.md#listLiveStreamSessions) | **GET** `/analytics/live-streams/{liveStreamId}` | List live stream player sessions
[**listSessionEvents**](docs/Api/RawStatisticsApi.md#listSessionEvents) | **GET** `/analytics/sessions/{sessionId}/events` | List player session events
[**listVideoSessions**](docs/Api/RawStatisticsApi.md#listVideoSessions) | **GET** `/analytics/videos/{videoId}` | List video player sessions


### UploadTokensApi

#### Retrieve an instance of UploadTokensApi

```php
// The $client must already be initialized
$uploadTokens = $client->uploadTokens();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**deleteToken**](docs/Api/UploadTokensApi.md#deleteToken) | **DELETE** `/upload-tokens/{uploadToken}` | Delete an upload token
[**list**](docs/Api/UploadTokensApi.md#list) | **GET** `/upload-tokens` | List all active upload tokens.
[**getToken**](docs/Api/UploadTokensApi.md#getToken) | **GET** `/upload-tokens/{uploadToken}` | Retrieve upload token
[**createToken**](docs/Api/UploadTokensApi.md#createToken) | **POST** `/upload-tokens` | Generate an upload token


### VideosApi

#### Retrieve an instance of VideosApi

```php
// The $client must already be initialized
$videos = $client->videos();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](docs/Api/VideosApi.md#delete) | **DELETE** `/videos/{videoId}` | Delete a video
[**get**](docs/Api/VideosApi.md#get) | **GET** `/videos/{videoId}` | Retrieve a video
[**getStatus**](docs/Api/VideosApi.md#getStatus) | **GET** `/videos/{videoId}/status` | Retrieve video status
[**list**](docs/Api/VideosApi.md#list) | **GET** `/videos` | List all videos
[**update**](docs/Api/VideosApi.md#update) | **PATCH** `/videos/{videoId}` | Update a video
[**pickThumbnail**](docs/Api/VideosApi.md#pickThumbnail) | **PATCH** `/videos/{videoId}/thumbnail` | Pick a thumbnail
[**uploadWithUploadToken**](docs/Api/VideosApi.md#uploadWithUploadToken) | **POST** `/upload` | Upload with an upload token
[**create**](docs/Api/VideosApi.md#create) | **POST** `/videos` | Create a video
[**upload**](docs/Api/VideosApi.md#upload) | **POST** `/videos/{videoId}/source` | Upload a video
[**uploadThumbnail**](docs/Api/VideosApi.md#uploadThumbnail) | **POST** `/videos/{videoId}/thumbnail` | Upload a thumbnail


### WatermarksApi

#### Retrieve an instance of WatermarksApi

```php
// The $client must already be initialized
$watermarks = $client->watermarks();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](docs/Api/WatermarksApi.md#delete) | **DELETE** `/watermarks/{watermarkId}` | Delete a watermark
[**list**](docs/Api/WatermarksApi.md#list) | **GET** `/watermarks` | List all watermarks
[**upload**](docs/Api/WatermarksApi.md#upload) | **POST** `/watermarks` | Upload a watermark


### WebhooksApi

#### Retrieve an instance of WebhooksApi

```php
// The $client must already be initialized
$webhooks = $client->webhooks();
```

#### Endpoints

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete**](docs/Api/WebhooksApi.md#delete) | **DELETE** `/webhooks/{webhookId}` | Delete a Webhook
[**get**](docs/Api/WebhooksApi.md#get) | **GET** `/webhooks/{webhookId}` | Retrieve Webhook details
[**list**](docs/Api/WebhooksApi.md#list) | **GET** `/webhooks` | List all webhooks
[**create**](docs/Api/WebhooksApi.md#create) | **POST** `/webhooks` | Create Webhook



## Models

 - [AccessToken](docs/Model/AccessToken.md)
 - [AuthenticatePayload](docs/Model/AuthenticatePayload.md)
 - [BadRequest](docs/Model/BadRequest.md)
 - [BytesRange](docs/Model/BytesRange.md)
 - [Caption](docs/Model/Caption.md)
 - [CaptionsListResponse](docs/Model/CaptionsListResponse.md)
 - [CaptionsUpdatePayload](docs/Model/CaptionsUpdatePayload.md)
 - [Chapter](docs/Model/Chapter.md)
 - [ChaptersListResponse](docs/Model/ChaptersListResponse.md)
 - [Link](docs/Model/Link.md)
 - [LiveStream](docs/Model/LiveStream.md)
 - [LiveStreamAssets](docs/Model/LiveStreamAssets.md)
 - [LiveStreamCreationPayload](docs/Model/LiveStreamCreationPayload.md)
 - [LiveStreamListResponse](docs/Model/LiveStreamListResponse.md)
 - [LiveStreamSession](docs/Model/LiveStreamSession.md)
 - [LiveStreamSessionClient](docs/Model/LiveStreamSessionClient.md)
 - [LiveStreamSessionDevice](docs/Model/LiveStreamSessionDevice.md)
 - [LiveStreamSessionLocation](docs/Model/LiveStreamSessionLocation.md)
 - [LiveStreamSessionReferrer](docs/Model/LiveStreamSessionReferrer.md)
 - [LiveStreamSessionSession](docs/Model/LiveStreamSessionSession.md)
 - [LiveStreamUpdatePayload](docs/Model/LiveStreamUpdatePayload.md)
 - [Metadata](docs/Model/Metadata.md)
 - [NotFound](docs/Model/NotFound.md)
 - [Pagination](docs/Model/Pagination.md)
 - [PaginationLink](docs/Model/PaginationLink.md)
 - [PlayerSessionEvent](docs/Model/PlayerSessionEvent.md)
 - [PlayerTheme](docs/Model/PlayerTheme.md)
 - [PlayerThemeAssets](docs/Model/PlayerThemeAssets.md)
 - [PlayerThemeCreationPayload](docs/Model/PlayerThemeCreationPayload.md)
 - [PlayerThemeUpdatePayload](docs/Model/PlayerThemeUpdatePayload.md)
 - [PlayerThemesListResponse](docs/Model/PlayerThemesListResponse.md)
 - [Quality](docs/Model/Quality.md)
 - [RawStatisticsListLiveStreamAnalyticsResponse](docs/Model/RawStatisticsListLiveStreamAnalyticsResponse.md)
 - [RawStatisticsListPlayerSessionEventsResponse](docs/Model/RawStatisticsListPlayerSessionEventsResponse.md)
 - [RawStatisticsListSessionsResponse](docs/Model/RawStatisticsListSessionsResponse.md)
 - [RefreshTokenPayload](docs/Model/RefreshTokenPayload.md)
 - [TokenCreationPayload](docs/Model/TokenCreationPayload.md)
 - [TokenListResponse](docs/Model/TokenListResponse.md)
 - [UploadToken](docs/Model/UploadToken.md)
 - [Video](docs/Model/Video.md)
 - [VideoAssets](docs/Model/VideoAssets.md)
 - [VideoClip](docs/Model/VideoClip.md)
 - [VideoCreationPayload](docs/Model/VideoCreationPayload.md)
 - [VideoSession](docs/Model/VideoSession.md)
 - [VideoSessionClient](docs/Model/VideoSessionClient.md)
 - [VideoSessionDevice](docs/Model/VideoSessionDevice.md)
 - [VideoSessionLocation](docs/Model/VideoSessionLocation.md)
 - [VideoSessionOs](docs/Model/VideoSessionOs.md)
 - [VideoSessionReferrer](docs/Model/VideoSessionReferrer.md)
 - [VideoSessionSession](docs/Model/VideoSessionSession.md)
 - [VideoSource](docs/Model/VideoSource.md)
 - [VideoSourceLiveStream](docs/Model/VideoSourceLiveStream.md)
 - [VideoSourceLiveStreamLink](docs/Model/VideoSourceLiveStreamLink.md)
 - [VideoStatus](docs/Model/VideoStatus.md)
 - [VideoStatusEncoding](docs/Model/VideoStatusEncoding.md)
 - [VideoStatusEncodingMetadata](docs/Model/VideoStatusEncodingMetadata.md)
 - [VideoStatusIngest](docs/Model/VideoStatusIngest.md)
 - [VideoStatusIngestReceivedParts](docs/Model/VideoStatusIngestReceivedParts.md)
 - [VideoThumbnailPickPayload](docs/Model/VideoThumbnailPickPayload.md)
 - [VideoUpdatePayload](docs/Model/VideoUpdatePayload.md)
 - [VideoWatermark](docs/Model/VideoWatermark.md)
 - [VideosListResponse](docs/Model/VideosListResponse.md)
 - [Watermark](docs/Model/Watermark.md)
 - [WatermarksListResponse](docs/Model/WatermarksListResponse.md)
 - [Webhook](docs/Model/Webhook.md)
 - [WebhooksCreationPayload](docs/Model/WebhooksCreationPayload.md)
 - [WebhooksListResponse](docs/Model/WebhooksListResponse.md)


## Authentication

Some endpoints don't require authentication. These one can be called with a Client instantiated with a `null` API key:

```php
<?php
require __DIR__ . '/vendor/autoload.php';

$httpClient = new \Symfony\Component\HttpClient\Psr18Client();
$client = new \ApiVideo\Client\Client(
    'https://sandbox.api.video',
    null,
    $httpClient
);
?>
```


## Chunks

The video is automatically split into 50 Mb chunks.

To modify the size of the chunks, fill in the last argument `$contentRange` as follows:

- `bytes 0-{size}/0` where `{size}` is the size of the chunk.

For example : `bytes 0-500000/0` for 500 Kb chunks.

The chunks size value must be between 5 Mb and 128mb.

## Tests

In order to run the PhpUnit tests, it is necessary to enter two variables in the command line:

- `BASE_URI` (for example : `https://sandbox.api.video`)
- `API_KEY`

These identifiers must belong to a real Api.video account.

```
$ BASE_URI="" API_KEY="..." vendor/bin/phpunit
```


## Have you gotten use from this API client?

Please take a moment to leave a star on the client ⭐

This helps other users to find the clients and also helps us understand which clients are most popular. Thank you!

# Contribution

Since this API client is generated from an OpenAPI description, we cannot accept pull requests made directly to the repository. If you want to contribute, you can open a pull request on the repository of our [client generator](https://github.com/apivideo/api-client-generator). Otherwise, you can also simply open an issue detailing your need on this repository.