[![badge](https://img.shields.io/twitter/follow/api_video?style=social)](https://twitter.com/intent/follow?screen_name=api_video) &nbsp; [![badge](https://img.shields.io/github/stars/apivideo/api.video-php-client?style=social)](https://github.com/apivideo/api.video-php-client) &nbsp; [![badge](https://img.shields.io/discourse/topics?server=https%3A%2F%2Fcommunity.api.video)](https://community.api.video)
![](https://github.com/apivideo/.github/blob/main/assets/apivideo_banner.png)
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


### CaptionsApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](docs/Api/CaptionsApi.md#upload) | Upload a caption | **POST** `/videos/{videoId}/captions/{language}`
[**get()**](docs/Api/CaptionsApi.md#get) | Retrieve a caption | **GET** `/videos/{videoId}/captions/{language}`
[**update()**](docs/Api/CaptionsApi.md#update) | Update a caption | **PATCH** `/videos/{videoId}/captions/{language}`
[**delete()**](docs/Api/CaptionsApi.md#delete) | Delete a caption | **DELETE** `/videos/{videoId}/captions/{language}`
[**list()**](docs/Api/CaptionsApi.md#list) | List video captions | **GET** `/videos/{videoId}/captions`


### ChaptersApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](docs/Api/ChaptersApi.md#upload) | Upload a chapter | **POST** `/videos/{videoId}/chapters/{language}`
[**get()**](docs/Api/ChaptersApi.md#get) | Retrieve a chapter | **GET** `/videos/{videoId}/chapters/{language}`
[**delete()**](docs/Api/ChaptersApi.md#delete) | Delete a chapter | **DELETE** `/videos/{videoId}/chapters/{language}`
[**list()**](docs/Api/ChaptersApi.md#list) | List video chapters | **GET** `/videos/{videoId}/chapters`


### LiveStreamsApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](docs/Api/LiveStreamsApi.md#create) | Create live stream | **POST** `/live-streams`
[**get()**](docs/Api/LiveStreamsApi.md#get) | Retrieve live stream | **GET** `/live-streams/{liveStreamId}`
[**update()**](docs/Api/LiveStreamsApi.md#update) | Update a live stream | **PATCH** `/live-streams/{liveStreamId}`
[**delete()**](docs/Api/LiveStreamsApi.md#delete) | Delete a live stream | **DELETE** `/live-streams/{liveStreamId}`
[**list()**](docs/Api/LiveStreamsApi.md#list) | List all live streams | **GET** `/live-streams`
[**uploadThumbnail()**](docs/Api/LiveStreamsApi.md#uploadThumbnail) | Upload a thumbnail | **POST** `/live-streams/{liveStreamId}/thumbnail`
[**deleteThumbnail()**](docs/Api/LiveStreamsApi.md#deleteThumbnail) | Delete a thumbnail | **DELETE** `/live-streams/{liveStreamId}/thumbnail`


### PlayerThemesApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](docs/Api/PlayerThemesApi.md#create) | Create a player | **POST** `/players`
[**get()**](docs/Api/PlayerThemesApi.md#get) | Retrieve a player | **GET** `/players/{playerId}`
[**update()**](docs/Api/PlayerThemesApi.md#update) | Update a player | **PATCH** `/players/{playerId}`
[**delete()**](docs/Api/PlayerThemesApi.md#delete) | Delete a player | **DELETE** `/players/{playerId}`
[**list()**](docs/Api/PlayerThemesApi.md#list) | List all player themes | **GET** `/players`
[**uploadLogo()**](docs/Api/PlayerThemesApi.md#uploadLogo) | Upload a logo | **POST** `/players/{playerId}/logo`
[**deleteLogo()**](docs/Api/PlayerThemesApi.md#deleteLogo) | Delete logo | **DELETE** `/players/{playerId}/logo`


### RawStatisticsApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**listLiveStreamSessions()**](docs/Api/RawStatisticsApi.md#listLiveStreamSessions) | List live stream player sessions | **GET** `/analytics/live-streams/{liveStreamId}`
[**listSessionEvents()**](docs/Api/RawStatisticsApi.md#listSessionEvents) | List player session events | **GET** `/analytics/sessions/{sessionId}/events`
[**listVideoSessions()**](docs/Api/RawStatisticsApi.md#listVideoSessions) | List video player sessions | **GET** `/analytics/videos/{videoId}`


### UploadTokensApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**createToken()**](docs/Api/UploadTokensApi.md#createToken) | Generate an upload token | **POST** `/upload-tokens`
[**getToken()**](docs/Api/UploadTokensApi.md#getToken) | Retrieve upload token | **GET** `/upload-tokens/{uploadToken}`
[**deleteToken()**](docs/Api/UploadTokensApi.md#deleteToken) | Delete an upload token | **DELETE** `/upload-tokens/{uploadToken}`
[**list()**](docs/Api/UploadTokensApi.md#list) | List all active upload tokens | **GET** `/upload-tokens`


### VideosApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](docs/Api/VideosApi.md#create) | Create a video object | **POST** `/videos`
[**upload()**](docs/Api/VideosApi.md#upload) | Upload a video | **POST** `/videos/{videoId}/source`
[**uploadWithUploadToken()**](docs/Api/VideosApi.md#uploadWithUploadToken) | Upload with an delegated upload token | **POST** `/upload`
[**get()**](docs/Api/VideosApi.md#get) | Retrieve a video object | **GET** `/videos/{videoId}`
[**update()**](docs/Api/VideosApi.md#update) | Update a video object | **PATCH** `/videos/{videoId}`
[**delete()**](docs/Api/VideosApi.md#delete) | Delete a video object | **DELETE** `/videos/{videoId}`
[**list()**](docs/Api/VideosApi.md#list) | List all video objects | **GET** `/videos`
[**uploadThumbnail()**](docs/Api/VideosApi.md#uploadThumbnail) | Upload a thumbnail | **POST** `/videos/{videoId}/thumbnail`
[**pickThumbnail()**](docs/Api/VideosApi.md#pickThumbnail) | Set a thumbnail | **PATCH** `/videos/{videoId}/thumbnail`
[**getStatus()**](docs/Api/VideosApi.md#getStatus) | Retrieve video status and details | **GET** `/videos/{videoId}/status`


### WatermarksApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](docs/Api/WatermarksApi.md#upload) | Upload a watermark | **POST** `/watermarks`
[**delete()**](docs/Api/WatermarksApi.md#delete) | Delete a watermark | **DELETE** `/watermarks/{watermarkId}`
[**list()**](docs/Api/WatermarksApi.md#list) | List all watermarks | **GET** `/watermarks`


### WebhooksApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](docs/Api/WebhooksApi.md#create) | Create Webhook | **POST** `/webhooks`
[**get()**](docs/Api/WebhooksApi.md#get) | Retrieve Webhook details | **GET** `/webhooks/{webhookId}`
[**delete()**](docs/Api/WebhooksApi.md#delete) | Delete a Webhook | **DELETE** `/webhooks/{webhookId}`
[**list()**](docs/Api/WebhooksApi.md#list) | List all webhooks | **GET** `/webhooks`



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

These identifiers must belong to a real api.video account.

```
$ BASE_URI="" API_KEY="..." vendor/bin/phpunit
```


## Have you gotten use from this API client?

Please take a moment to leave a star on the client ⭐

This helps other users to find the clients and also helps us understand which clients are most popular. Thank you!

# Contribution

Since this API client is generated from an OpenAPI description, we cannot accept pull requests made directly to the repository. If you want to contribute, you can open a pull request on the repository of our [client generator](https://github.com/apivideo/api-client-generator). Otherwise, you can also simply open an issue detailing your need on this repository.