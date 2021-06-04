# ApiVideo\Client\Api\ChaptersApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](ChaptersApi.md#delete) | **DELETE** `/videos/{videoId}/chapters/{language}` | Delete a chapter
[**list()**](ChaptersApi.md#list) | **GET** `/videos/{videoId}/chapters` | List video chapters
[**get()**](ChaptersApi.md#get) | **GET** `/videos/{videoId}/chapters/{language}` | Show a chapter
[**upload()**](ChaptersApi.md#upload) | **POST** `/videos/{videoId}/chapters/{language}` | Upload a chapter


## delete()



```php
delete(string $videoId, string $language): void
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to delete a chapter from. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. | `en` |




### Return type

void (empty response body)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## list()


Retrieve a list of all chapters for a specified video.

```php
list(string $videoId, array $queryParams = []): \ApiVideo\Client\Model\ChaptersListResponse
```

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

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## get()



```php
get(string $videoId, string $language): \ApiVideo\Client\Model\Chapter
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to show a chapter for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. | `en` |




### Return type

[**\ApiVideo\Client\Model\Chapter**](../Model/Chapter.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## upload()


Chapters help break the video into sections. Read our [tutorial](https://api.video/blog/tutorials/adding-chapters-to-your-videos) for more details.

```php
upload(string $videoId, string $language, \SplFileObject $file): \ApiVideo\Client\Model\Chapter
```

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to upload a chapter for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. | `en` |
 `file` | **\SplFileObject**| The VTT file describing the chapters you want to upload. | `new \SplFileObject('path')` |




### Return type

[**\ApiVideo\Client\Model\Chapter**](../Model/Chapter.md)

### Authorization

[bearerAuth](../../README.md)

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
