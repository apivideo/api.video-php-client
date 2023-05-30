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

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
);

// upload the watermark
$watermark = $client->watermarks()->upload(new SplFileObject(__DIR__ . '/watermark.png'));

// create a new video with the watermark
$video = $client->videos()->create((new VideoCreationPayload())
        ->setWatermark((new VideoWatermark())
                ->setId($watermark->getWatermarkId())
                ->setTop("0px")
                ->setLeft("0px")
                ->setWidth("100px")
                ->setHeight("100px"))
        ->setTitle("Test PHP watermark")
);

// upload the video
$client->videos()->upload($video->getVideoId(), new SplFileObject(__DIR__ . '/558k.mp4')); 
```




## **`delete()` - Delete a watermark**



Delete a watermark.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `watermarkId` | **string**| The watermark ID for the watermark you want to delete. |




### Return type

void (empty response body)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
); 

$watermarkId = 'watermark_1Bji68oeAAwR44dAb5ZhML'; // The watermark ID for the watermark you want to delete.

$client->watermarks->delete(watermarkId);
```




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

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$client = new \ApiVideo\Client\Client(
    'https://ws.api.video',
    'YOUR_API_KEY',
    new \Symfony\Component\HttpClient\Psr18Client()
); 

// retrieve the first page of all watermarks
$watermarks =  client->watermarks()->list();

// retrieve the 5 first watermarks, ordered by creation date
$watermarks2 = $client->watermarks()->list(array(
    'pageSize' => 5,
    'sortBy' => 'createdAt',
    'sortOrder' => 'asc'
)); 
```



