# ApiVideo\Client\Api\CaptionsApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**upload()**](CaptionsApi.md#upload) | Upload a caption | **POST** `/videos/{videoId}/captions/{language}`
[**get()**](CaptionsApi.md#get) | Retrieve a caption | **GET** `/videos/{videoId}/captions/{language}`
[**update()**](CaptionsApi.md#update) | Update a caption | **PATCH** `/videos/{videoId}/captions/{language}`
[**delete()**](CaptionsApi.md#delete) | Delete a caption | **DELETE** `/videos/{videoId}/captions/{language}`
[**list()**](CaptionsApi.md#list) | List video captions | **GET** `/videos/{videoId}/captions`


## **`upload()` - Upload a caption**



Upload a VTT file to add captions to your video.

 Read our [captioning tutorial](https://api.video/blog/tutorials/adding-captions) for more details.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to add a caption to. |
 `language` | **string**| A valid BCP 47 language representation. |
 `file` | **\SplFileObject**| The video text track (VTT) you want to upload. |




### Return type

[**\ApiVideo\Client\Model\Caption**](../Model/Caption.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$videoId = 'vi4k0jvEUuaTdRAEjQ4Prklg'; // The unique identifier for the video you want to add a caption to.
$language = 'en'; // A valid BCP 47 language representation.
$file = new SplFileObject(__DIR__ . '/en.vtt'); // The video text track (VTT) you want to upload.

$caption = $client->captions()->upload($videoId, $language, $file); 
```




## **`get()` - Retrieve a caption**



Retrieve a caption for a video in a specific language. If the language is available, the caption is returned. Otherwise, you will get a error indicating the caption was not found.

Tutorials that use the [captions endpoint](https://api.video/blog/endpoints/captions).

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want captions for. |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation |




### Return type

[**\ApiVideo\Client\Model\Caption**](../Model/Caption.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$videoId = 'vi4k0jvEUuaTdRAEjQ4Prklg'; // The unique identifier for the video you want captions for.
$language = 'en'; // A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation

$client->captions()->get($videoId, $language); 
```




## **`update()` - Update a caption**



To have the captions on automatically, use this method to set default: true.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to have automatic captions for. |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. |
 `captionsUpdatePayload` | [**\ApiVideo\Client\Model\CaptionsUpdatePayload**](../Model/CaptionsUpdatePayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Caption**](../Model/Caption.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$videoId = 'vi4k0jvEUuaTdRAEjQ4Prklg'; // The unique identifier for the video you want to have automatic captions for.
$language = 'en'; // A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation.

$captionsUpdatePayload = (new \ApiVideo\Client\Model\CaptionsUpdatePayload())
    ->setDefault(true);
 
$caption = $client->captions()->update($videoId, $language, $captionsUpdatePayload); 
```




## **`delete()` - Delete a caption**



Delete a caption in a specific language by providing the video ID for the video you want to delete the caption from and the language the caption is in.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to delete a caption from. |
 `language` | **string**| A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. |




### Return type

void (empty response body)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$videoId = 'vi4k0jvEUuaTdRAEjQ4Prklgc'; // The unique identifier for the video you want to delete a caption from.
$language = 'en'; // A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation.

$client->captions()->delete($videoId, $language); 
```




## **`list()` - List video captions**



Retrieve a list of available captions for the videoId you provide.

### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `videoId` | **string**| The unique identifier for the video you want to retrieve a list of captions for. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\CaptionsListResponse**](../Model/CaptionsListResponse.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$videoId = 'vi4k0jvEUuaTdRAEjQ4Prklg'; // The unique identifier for the video you want to retrieve a list of captions for.

$captions = $client->captions()->list($videoId, array(
    'currentPage' => 2, // Choose the number of search results to return per page. Minimum value: 1)
    'pageSize' => 30 // Results per page. Allowed values 1-100, default is 25.)
)); 
```



