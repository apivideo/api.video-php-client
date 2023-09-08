# ApiVideo\Client\Api\WatermarksApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](WatermarksApi.md#upload) | Upload a watermark | **POST** `/watermarks`
[**delete()**](WatermarksApi.md#delete) | Delete a watermark | **DELETE** `/watermarks/{watermarkId}`
[**list()**](WatermarksApi.md#list) | List all watermarks | **GET** `/watermarks`


## **`upload()` - Upload a watermark**



Create a new watermark by uploading a `JPG` or a `PNG` image.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `file` | **\SplFileObject**| The &#x60;.jpg&#x60; or &#x60;.png&#x60; image to be added as a watermark. |




### Return type

[**\ApiVideo\Client\Model\Watermark**](../Model/Watermark.md)





## **`delete()` - Delete a watermark**



Delete a watermark.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `watermarkId` | **string**| The watermark ID for the watermark you want to delete. |




### Return type

void (empty response body)





## **`list()` - List all watermarks**



List all watermarks associated with your workspace.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `sortBy` | **string**| Allowed: createdAt. You can search by the time watermark were created at. | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. asc is ascending and sorts from A to Z. desc is descending and sorts from Z to A. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\WatermarksListResponse**](../Model/WatermarksListResponse.md)




