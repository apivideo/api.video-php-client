<!--<documentation_excluded>-->
[![badge](https://img.shields.io/twitter/follow/api_video?style=social)](https://twitter.com/intent/follow?screen_name=api_video) &nbsp; [![badge](https://img.shields.io/github/stars/apivideo/api.video-php-client?style=social)](https://github.com/apivideo/api.video-php-client) &nbsp; [![badge](https://img.shields.io/discourse/topics?server=https%3A%2F%2Fcommunity.api.video)](https://community.api.video)
![](https://github.com/apivideo/.github/blob/main/assets/apivideo_banner.png)
<h1 align="center">api.video PHP client</h1>

[api.video](https://api.video) is the video infrastructure for product builders. Lightning fast video APIs for integrating, scaling, and managing on-demand & low latency live streaming features in your app.


## Table of contents

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
    - [AnalyticsApi](#analyticsapi)
    - [CaptionsApi](#captionsapi)
    - [ChaptersApi](#chaptersapi)
    - [LiveStreamsApi](#livestreamsapi)
    - [PlayerThemesApi](#playerthemesapi)
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
<!--</documentation_excluded>-->
<!--<documentation_only>
---
title: PHP API client
meta: 
  description: The official PHP API client for api.video. [api.video](https://api.video/) is the video infrastructure for product builders. Lightning fast video APIs for integrating, scaling, and managing on-demand & low latency live streaming features in your app.
---

# api.video PHP API client

[api.video](https://api.video/) is the video infrastructure for product builders. Lightning fast video APIs for integrating, scaling, and managing on-demand & low latency live streaming features in your app.
</documentation_only>-->

## Project description

api.video's PHP API client streamlines the coding process. Chunking files is handled for you, as is pagination and refreshing your tokens.

## Getting started

### Installation

```shell
composer require api-video/php-api-client
```

### Initialization

Due to PHP PSR support, you must initialize the client with 3 to 5 arguments:
1. Base URI, which can be either `https://sandbox.api.video` or `https://ws.api.video`
2. Your API key, available on your account
3. HTTP client
4. (Request factory)
5. (Stream factory)

Note : If the HTTP client also implements RequestFactoryInterface and StreamFactoryInterface, then it is not necessary to pass this object in 4th and 5th argument.

#### Symfony HTTP client example

The Symfony HTTP client has the triple advantage of playing the role of **HTTP client**, but also of **request factory** and **stream factory**. It is therefore sufficient to pass it as an argument 3 times.

If the HTTP client isn't yet in your project, you can add it with:

```shell
composer require symfony/http-client
composer require nyholm/psr7
```

### Code sample

#### Client initialization

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

#### Create a video

```php
$payload = (new VideoCreationPayload())
    ->setTitle('Test video creation');

// the `$client` must already be initialized.
$video = $client->videos()->create($payload);
```

#### Upload a video

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

## Documentation

### API Endpoints


#### AnalyticsApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**getAggregatedMetrics()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/AnalyticsApi.md#getAggregatedMetrics) | Retrieve aggregated metrics | **GET** `/data/metrics/{metric}/{aggregation}`
[**getMetricsBreakdown()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/AnalyticsApi.md#getMetricsBreakdown) | Retrieve metrics in a breakdown of dimensions | **GET** `/data/buckets/{metric}/{breakdown}`
[**getMetricsOverTime()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/AnalyticsApi.md#getMetricsOverTime) | Retrieve metrics over time | **GET** `/data/timeseries/{metric}`


#### CaptionsApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/CaptionsApi.md#upload) | Upload a caption | **POST** `/videos/{videoId}/captions/{language}`
[**get()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/CaptionsApi.md#get) | Retrieve a caption | **GET** `/videos/{videoId}/captions/{language}`
[**update()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/CaptionsApi.md#update) | Update a caption | **PATCH** `/videos/{videoId}/captions/{language}`
[**delete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/CaptionsApi.md#delete) | Delete a caption | **DELETE** `/videos/{videoId}/captions/{language}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/CaptionsApi.md#list) | List video captions | **GET** `/videos/{videoId}/captions`


#### ChaptersApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/ChaptersApi.md#upload) | Upload a chapter | **POST** `/videos/{videoId}/chapters/{language}`
[**get()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/ChaptersApi.md#get) | Retrieve a chapter | **GET** `/videos/{videoId}/chapters/{language}`
[**delete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/ChaptersApi.md#delete) | Delete a chapter | **DELETE** `/videos/{videoId}/chapters/{language}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/ChaptersApi.md#list) | List video chapters | **GET** `/videos/{videoId}/chapters`


#### LiveStreamsApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#create) | Create live stream | **POST** `/live-streams`
[**get()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#get) | Retrieve live stream | **GET** `/live-streams/{liveStreamId}`
[**update()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#update) | Update a live stream | **PATCH** `/live-streams/{liveStreamId}`
[**delete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#delete) | Delete a live stream | **DELETE** `/live-streams/{liveStreamId}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#list) | List all live streams | **GET** `/live-streams`
[**uploadThumbnail()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#uploadThumbnail) | Upload a thumbnail | **POST** `/live-streams/{liveStreamId}/thumbnail`
[**deleteThumbnail()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#deleteThumbnail) | Delete a thumbnail | **DELETE** `/live-streams/{liveStreamId}/thumbnail`
[**complete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/LiveStreamsApi.md#complete) | Complete a live stream | **PUT** `/live-streams/{liveStreamId}/complete`


#### PlayerThemesApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/PlayerThemesApi.md#create) | Create a player | **POST** `/players`
[**get()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/PlayerThemesApi.md#get) | Retrieve a player | **GET** `/players/{playerId}`
[**update()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/PlayerThemesApi.md#update) | Update a player | **PATCH** `/players/{playerId}`
[**delete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/PlayerThemesApi.md#delete) | Delete a player | **DELETE** `/players/{playerId}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/PlayerThemesApi.md#list) | List all player themes | **GET** `/players`
[**uploadLogo()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/PlayerThemesApi.md#uploadLogo) | Upload a logo | **POST** `/players/{playerId}/logo`
[**deleteLogo()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/PlayerThemesApi.md#deleteLogo) | Delete logo | **DELETE** `/players/{playerId}/logo`


#### UploadTokensApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**createToken()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/UploadTokensApi.md#createToken) | Generate an upload token | **POST** `/upload-tokens`
[**getToken()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/UploadTokensApi.md#getToken) | Retrieve upload token | **GET** `/upload-tokens/{uploadToken}`
[**deleteToken()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/UploadTokensApi.md#deleteToken) | Delete an upload token | **DELETE** `/upload-tokens/{uploadToken}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/UploadTokensApi.md#list) | List all active upload tokens | **GET** `/upload-tokens`


#### VideosApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#create) | Create a video object | **POST** `/videos`
[**upload()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#upload) | Upload a video | **POST** `/videos/{videoId}/source`
[**uploadWithUploadToken()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#uploadWithUploadToken) | Upload with an delegated upload token | **POST** `/upload`
[**get()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#get) | Retrieve a video object | **GET** `/videos/{videoId}`
[**update()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#update) | Update a video object | **PATCH** `/videos/{videoId}`
[**delete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#delete) | Delete a video object | **DELETE** `/videos/{videoId}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#list) | List all video objects | **GET** `/videos`
[**uploadThumbnail()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#uploadThumbnail) | Upload a thumbnail | **POST** `/videos/{videoId}/thumbnail`
[**pickThumbnail()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#pickThumbnail) | Set a thumbnail | **PATCH** `/videos/{videoId}/thumbnail`
[**getDiscarded()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#getDiscarded) | Retrieve a discarded video object | **GET** `/discarded/videos/{videoId}`
[**getStatus()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#getStatus) | Retrieve video status and details | **GET** `/videos/{videoId}/status`
[**listDiscarded()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#listDiscarded) | List all discarded video objects | **GET** `/discarded/videos`
[**updateDiscarded()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/VideosApi.md#updateDiscarded) | Update a discarded video object | **PATCH** `/discarded/videos/{videoId}`


#### WatermarksApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/WatermarksApi.md#upload) | Upload a watermark | **POST** `/watermarks`
[**delete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/WatermarksApi.md#delete) | Delete a watermark | **DELETE** `/watermarks/{watermarkId}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/WatermarksApi.md#list) | List all watermarks | **GET** `/watermarks`


#### WebhooksApi

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/WebhooksApi.md#create) | Create Webhook | **POST** `/webhooks`
[**get()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/WebhooksApi.md#get) | Retrieve Webhook details | **GET** `/webhooks/{webhookId}`
[**delete()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/WebhooksApi.md#delete) | Delete a Webhook | **DELETE** `/webhooks/{webhookId}`
[**list()**](https://github.com/apivideo/api.video-php-client/blob/main/docs/Api/WebhooksApi.md#list) | List all webhooks | **GET** `/webhooks`



### Models

 - [AccessToken](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AccessToken.md)
 - [AdditionalBadRequestErrors](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AdditionalBadRequestErrors.md)
 - [AnalyticsAggregatedMetricsResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsAggregatedMetricsResponse.md)
 - [AnalyticsAggregatedMetricsResponseContext](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsAggregatedMetricsResponseContext.md)
 - [AnalyticsAggregatedMetricsResponseContextTimeframe](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsAggregatedMetricsResponseContextTimeframe.md)
 - [AnalyticsData](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsData.md)
 - [AnalyticsMetricsBreakdownResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsMetricsBreakdownResponse.md)
 - [AnalyticsMetricsBreakdownResponseContext](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsMetricsBreakdownResponseContext.md)
 - [AnalyticsMetricsBreakdownResponseData](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsMetricsBreakdownResponseData.md)
 - [AnalyticsMetricsOverTimeResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsMetricsOverTimeResponse.md)
 - [AnalyticsMetricsOverTimeResponseContext](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsMetricsOverTimeResponseContext.md)
 - [AnalyticsMetricsOverTimeResponseData](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsMetricsOverTimeResponseData.md)
 - [AnalyticsPlays400Error](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsPlays400Error.md)
 - [AnalyticsPlaysResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AnalyticsPlaysResponse.md)
 - [AuthenticatePayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/AuthenticatePayload.md)
 - [BadRequest](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/BadRequest.md)
 - [BytesRange](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/BytesRange.md)
 - [Caption](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Caption.md)
 - [CaptionsListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/CaptionsListResponse.md)
 - [CaptionsUpdatePayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/CaptionsUpdatePayload.md)
 - [Chapter](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Chapter.md)
 - [ChaptersListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/ChaptersListResponse.md)
 - [DiscardedVideoUpdatePayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/DiscardedVideoUpdatePayload.md)
 - [FilterBy](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/FilterBy.md)
 - [FilterBy1](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/FilterBy1.md)
 - [FilterBy2](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/FilterBy2.md)
 - [Link](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Link.md)
 - [LiveStream](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/LiveStream.md)
 - [LiveStreamAssets](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/LiveStreamAssets.md)
 - [LiveStreamCreationPayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/LiveStreamCreationPayload.md)
 - [LiveStreamListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/LiveStreamListResponse.md)
 - [LiveStreamUpdatePayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/LiveStreamUpdatePayload.md)
 - [Metadata](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Metadata.md)
 - [Model403ErrorSchema](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Model403ErrorSchema.md)
 - [NotFound](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/NotFound.md)
 - [Pagination](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Pagination.md)
 - [PaginationLink](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/PaginationLink.md)
 - [PlayerSessionEvent](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/PlayerSessionEvent.md)
 - [PlayerTheme](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/PlayerTheme.md)
 - [PlayerThemeAssets](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/PlayerThemeAssets.md)
 - [PlayerThemeCreationPayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/PlayerThemeCreationPayload.md)
 - [PlayerThemeUpdatePayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/PlayerThemeUpdatePayload.md)
 - [PlayerThemesListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/PlayerThemesListResponse.md)
 - [Quality](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Quality.md)
 - [RefreshTokenPayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/RefreshTokenPayload.md)
 - [RestreamsRequestObject](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/RestreamsRequestObject.md)
 - [RestreamsResponseObject](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/RestreamsResponseObject.md)
 - [TokenCreationPayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/TokenCreationPayload.md)
 - [TokenListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/TokenListResponse.md)
 - [TooManyRequests](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/TooManyRequests.md)
 - [UnrecognizedRequestUrl](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/UnrecognizedRequestUrl.md)
 - [UploadToken](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/UploadToken.md)
 - [Video](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Video.md)
 - [VideoAssets](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoAssets.md)
 - [VideoClip](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoClip.md)
 - [VideoCreationPayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoCreationPayload.md)
 - [VideoSource](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoSource.md)
 - [VideoSourceLiveStream](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoSourceLiveStream.md)
 - [VideoSourceLiveStreamLink](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoSourceLiveStreamLink.md)
 - [VideoStatus](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoStatus.md)
 - [VideoStatusEncoding](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoStatusEncoding.md)
 - [VideoStatusEncodingMetadata](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoStatusEncodingMetadata.md)
 - [VideoStatusIngest](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoStatusIngest.md)
 - [VideoStatusIngestReceivedParts](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoStatusIngestReceivedParts.md)
 - [VideoThumbnailPickPayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoThumbnailPickPayload.md)
 - [VideoUpdatePayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoUpdatePayload.md)
 - [VideoWatermark](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideoWatermark.md)
 - [VideosListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/VideosListResponse.md)
 - [Watermark](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Watermark.md)
 - [WatermarksListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/WatermarksListResponse.md)
 - [Webhook](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/Webhook.md)
 - [WebhooksCreationPayload](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/WebhooksCreationPayload.md)
 - [WebhooksListResponse](https://github.com/apivideo/api.video-php-client/blob/main/docs/Model/WebhooksListResponse.md)


### Authentication

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


### Chunks

The video is automatically split into 50 Mb chunks.

To modify the size of the chunks, fill in the last argument `$contentRange` as follows:

- `bytes 0-{size}/0` where `{size}` is the size of the chunk.

For example : `bytes 0-500000/0` for 500 Kb chunks.

The chunks size value must be between 5 Mb and 128mb.

### Tests

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

## Contribution

Since this API client is generated from an OpenAPI description, we cannot accept pull requests made directly to the repository. If you want to contribute, you can open a pull request on the repository of our [client generator](https://github.com/apivideo/api-client-generator). Otherwise, you can also simply open an issue detailing your need on this repository.