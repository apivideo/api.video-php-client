# ApiVideo\Client\Api\ChaptersApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](ChaptersApi.md#upload) | Upload a chapter | **POST** `/videos/{videoId}/chapters/{language}`
[**get()**](ChaptersApi.md#get) | Retrieve a chapter | **GET** `/videos/{videoId}/chapters/{language}`
[**delete()**](ChaptersApi.md#delete) | Delete a chapter | **DELETE** `/videos/{videoId}/chapters/{language}`
[**list()**](ChaptersApi.md#list) | List video chapters | **GET** `/videos/{videoId}/chapters`


## **`upload()` - Upload a chapter**



Upload a VTT file to add chapters to your video.

Chapters help break the video into sections. Read our [tutorial](https://api.video/blog/tutorials/adding-chapters-to-your-videos/) for more details.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to upload a chapter for. |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. |
 `file` | **\SplFileObject**| The VTT file describing the chapters you want to upload. |




### Return type

[**\ApiVideo\Client\Model\Chapter**](../Model/Chapter.md)





## **`get()` - Retrieve a chapter**



Retrieve a chapter for by video id in a specific language. 

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to show a chapter for. |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. |




### Return type

[**\ApiVideo\Client\Model\Chapter**](../Model/Chapter.md)





## **`delete()` - Delete a chapter**



Delete a chapter in a specific language by providing the video ID for the video you want to delete the chapter from and the language the chapter is in.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to delete a chapter from. |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. |




### Return type

void (empty response body)





## **`list()` - List video chapters**



Retrieve a list of all chapters for by video id.

### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `videoId` | **string**| The unique identifier for the video you want to retrieve a list of chapters for. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\ChaptersListResponse**](../Model/ChaptersListResponse.md)




