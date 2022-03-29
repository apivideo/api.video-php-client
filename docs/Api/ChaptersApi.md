# ApiVideo\Client\Api\ChaptersApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](ChaptersApi.md#delete) | **DELETE** `/videos/{videoId}/chapters/{language}` | Delete a chapter
[**list()**](ChaptersApi.md#list) | **GET** `/videos/{videoId}/chapters` | List video chapters
[**get()**](ChaptersApi.md#get) | **GET** `/videos/{videoId}/chapters/{language}` | Retrieve a chapter
[**upload()**](ChaptersApi.md#upload) | **POST** `/videos/{videoId}/chapters/{language}` | Upload a chapter


## delete()


Delete a chapter in a specific language by providing the video ID for the video you want to delete the chapter from and the language the chapter is in.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to delete a chapter from. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. | `en` |




### Return type

void (empty response body)




## list()


Retrieve a list of all chapters for a specified video.


### Arguments


Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to retrieve a list of chapters for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |


Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\ChaptersListResponse**](../Model/ChaptersListResponse.md)




## get()


Retrieve a chapter for a video in a specific language.  Chapters help your viewers find the sections of the video they are most interested in viewing. Tutorials that use the [chapters endpoint](https://api.video/blog/endpoints/chapters).


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to show a chapter for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. | `en` |




### Return type

[**\ApiVideo\Client\Model\Chapter**](../Model/Chapter.md)




## upload()


Upload a VTT file to add chapters to your video. Chapters help break the video into sections. Read our [tutorial](https://api.video/blog/tutorials/adding-chapters-to-your-videos) for more details.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to upload a chapter for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. | `en` |
 `file` | **\SplFileObject**| The VTT file describing the chapters you want to upload. | `new \SplFileObject('path')` |




### Return type

[**\ApiVideo\Client\Model\Chapter**](../Model/Chapter.md)



