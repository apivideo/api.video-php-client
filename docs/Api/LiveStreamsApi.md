# ApiVideo\Client\Api\LiveStreamsApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](LiveStreamsApi.md#create) | Create live stream | **POST** `/live-streams`
[**get()**](LiveStreamsApi.md#get) | Retrieve live stream | **GET** `/live-streams/{liveStreamId}`
[**update()**](LiveStreamsApi.md#update) | Update a live stream | **PATCH** `/live-streams/{liveStreamId}`
[**delete()**](LiveStreamsApi.md#delete) | Delete a live stream | **DELETE** `/live-streams/{liveStreamId}`
[**list()**](LiveStreamsApi.md#list) | List all live streams | **GET** `/live-streams`
[**uploadThumbnail()**](LiveStreamsApi.md#uploadThumbnail) | Upload a thumbnail | **POST** `/live-streams/{liveStreamId}/thumbnail`
[**deleteThumbnail()**](LiveStreamsApi.md#deleteThumbnail) | Delete a thumbnail | **DELETE** `/live-streams/{liveStreamId}/thumbnail`


## **`create()` - Create live stream**



Creates a livestream object.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamCreationPayload` | [**\ApiVideo\Client\Model\LiveStreamCreationPayload**](../Model/LiveStreamCreationPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)





## **`get()` - Retrieve live stream**



Get a livestream by id.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream you want to watch. |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)





## **`update()` - Update a live stream**



Updates the livestream object.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream that you want to update information for such as player details. |
 `liveStreamUpdatePayload` | [**\ApiVideo\Client\Model\LiveStreamUpdatePayload**](../Model/LiveStreamUpdatePayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)





## **`delete()` - Delete a live stream**



If you do not need a live stream any longer, you can send a request to delete it. All you need is the liveStreamId.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream that you want to remove. |




### Return type

void (empty response body)





## **`list()` - List all live streams**



Get the list of livestreams on the workspace.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `streamKey` | **string**| The unique stream key that allows you to stream videos. | [optional]
 `name` | **string**| You can filter live streams by their name or a part of their name. | [optional]
 `sortBy` | **string**| Enables you to sort live stream results. Allowed attributes: &#x60;name&#x60;, &#x60;createdAt&#x60;, &#x60;updatedAt&#x60;. &#x60;name&#x60; - the name of the live stream. &#x60;createdAt&#x60; - the time a live stream was created. &#x60;updatedAt&#x60; - the time a live stream was last updated.  When using &#x60;createdAt&#x60; or &#x60;updatedAt&#x60;, the API sorts the results based on the ISO-8601 time format. | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones. For title, it is 0-9 and A-Z ascending and Z-A, 9-0 descending. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\LiveStreamListResponse**](../Model/LiveStreamListResponse.md)





## **`uploadThumbnail()` - Upload a thumbnail**



Upload the thumbnail for the livestream.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream you want to upload. |
 `file` | **\SplFileObject**| The image to be added as a thumbnail. The mime type should be image/jpeg, image/png or image/webp. The max allowed size is 8 MiB. |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)





## **`deleteThumbnail()` - Delete a thumbnail**



Send the unique identifier for a live stream to delete its thumbnail.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique identifier of the live stream whose thumbnail you want to delete. |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)




