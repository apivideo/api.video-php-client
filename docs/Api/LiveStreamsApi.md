# ApiVideo\Client\Api\LiveStreamsApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](LiveStreamsApi.md#delete) | **DELETE** `/live-streams/{liveStreamId}` | Delete a live stream
[**deleteThumbnail()**](LiveStreamsApi.md#deleteThumbnail) | **DELETE** `/live-streams/{liveStreamId}/thumbnail` | Delete a thumbnail
[**list()**](LiveStreamsApi.md#list) | **GET** `/live-streams` | List all live streams
[**get()**](LiveStreamsApi.md#get) | **GET** `/live-streams/{liveStreamId}` | Show live stream
[**update()**](LiveStreamsApi.md#update) | **PATCH** `/live-streams/{liveStreamId}` | Update a live stream
[**create()**](LiveStreamsApi.md#create) | **POST** `/live-streams` | Create live stream
[**uploadThumbnail()**](LiveStreamsApi.md#uploadThumbnail) | **POST** `/live-streams/{liveStreamId}/thumbnail` | Upload a thumbnail


## delete()



```php
delete(string $liveStreamId): void
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream that you want to remove. | `li400mYKSgQ6xs7taUeSaEKr` |




### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## deleteThumbnail()


Send the unique identifier for a live stream to delete it from the system.

```php
deleteThumbnail(string $liveStreamId): \ApiVideo\Client\Model\LiveStream
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique identifier for the live stream you want to delete. | `li400mYKSgQ6xs7taUeSaEKr` |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## list()


With no parameters added to the url, this will return all livestreams. Query by name or key to limit the list.

```php
list(array $queryParams = []): \ApiVideo\Client\Model\LiveStreamListResponse
```

### Arguments





Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `streamKey` | **string**| The unique stream key that allows you to stream videos. | `30087931-229e-42cf-b5f9-e91bcc1f7332` | [optional]
 `name` | **string**| You can filter live streams by their name or a part of their name. | `My Video` | [optional]
 `sortBy` | **string**| Allowed: createdAt, publishedAt, name. createdAt - the time a livestream was created using the specified streamKey. publishedAt - the time a livestream was published using the specified streamKey. name - the name of the livestream. If you choose one of the time based options, the time is presented in ISO-8601 format. | `createdAt` | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones. For title, it is 0-9 and A-Z ascending and Z-A, 9-0 descending. | `desc` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\LiveStreamListResponse**](../Model/LiveStreamListResponse.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## get()


Supply a LivestreamId, and you'll get all the details for streaming into, and watching the livestream.

```php
get(string $liveStreamId): \ApiVideo\Client\Model\LiveStream
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream you want to watch. | `li400mYKSgQ6xs7taUeSaEKr` |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## update()


Use this endpoint to update the player, or to turn recording on/off (saving a copy of the livestream). NOTE: If the livestream is actively streaming, changing the recording status will only affect the NEXT stream.    The public=false 'private livestream' is available as a BETA feature, and should be limited to livestreams of 3,000 viewers or fewer.

```php
update(string $liveStreamId, \ApiVideo\Client\Model\LiveStreamUpdatePayload $liveStreamUpdatePayload): \ApiVideo\Client\Model\LiveStream
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream that you want to update information for such as player details, or whether you want the recording on or off. | `li400mYKSgQ6xs7taUeSaEKr` |
 `liveStreamUpdatePayload` | [**\ApiVideo\Client\Model\LiveStreamUpdatePayload**](../Model/LiveStreamUpdatePayload.md)|  | `new \ApiVideo\Client\Model\LiveStreamUpdatePayload()` |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## create()


A live stream will give you the 'connection point' to RTMP your video stream to api.video. It will also give you the details for viewers to watch the same livestream. The public=false 'private livestream' is available as a BETA feature, and should be limited to livestreams of 3,000 viewers or fewer.  See our [Live Stream Tutorial](https://api.video/blog/tutorials/live-stream-tutorial) for a walkthrough of this API with OBS. Your RTMP endpoint for the livestream is rtmp://broadcast.api.video/s/{streamKey}

```php
create(\ApiVideo\Client\Model\LiveStreamCreationPayload $liveStreamCreationPayload): \ApiVideo\Client\Model\LiveStream
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `liveStreamCreationPayload` | [**\ApiVideo\Client\Model\LiveStreamCreationPayload**](../Model/LiveStreamCreationPayload.md)|  | `new \ApiVideo\Client\Model\LiveStreamCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## uploadThumbnail()


Upload an image to use as a backdrop for your livestream.

```php
uploadThumbnail(string $liveStreamId, \SplFileObject $file): \ApiVideo\Client\Model\LiveStream
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream you want to upload. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `file` | **\SplFileObject**| The image to be added as a thumbnail. | `new \SplFileObject('path')` |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
