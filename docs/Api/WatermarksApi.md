# ApiVideo\Client\Api\WatermarksApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](WatermarksApi.md#delete) | **DELETE** `/watermarks/{watermarkId}` | Delete a watermark
[**list()**](WatermarksApi.md#list) | **GET** `/watermarks` | List all watermarks
[**upload()**](WatermarksApi.md#upload) | **POST** `/watermarks` | Upload a watermark


## delete()


Delete a watermark. A watermark is a static image, directly burnt-into a video.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `watermarkId` | **string**| The watermark ID for the watermark you want to delete. | `watermark_1BWr2L5MTQwxGkuxKjzh6i` |




### Return type

void (empty response body)




## list()


List all watermarks. A watermark is a static image, directly burnt into a video. After you have created your watermark, you can define its placement and aspect when you [create a video](https://docs.api.video/reference/post-video).


### Arguments





Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `sortBy` | **string**| Allowed: createdAt. You can search by the time watermark were created at. | `createdAt` | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. asc is ascending and sorts from A to Z. desc is descending and sorts from Z to A. | `asc` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\WatermarksListResponse**](../Model/WatermarksListResponse.md)




## upload()


Create a new watermark by uploading a `JPG` or a `PNG` image. A watermark is a static image, directly burnt into a video. After you have created your watermark, you can define its placement and aspect when you [create a video](https://docs.api.video/reference/post-video).

### Example

```php
<?php
  use ApiVideo\Client\Model\VideoCreationPayload;
  use ApiVideo\Client\Model\VideoWatermark;

  require __DIR__ . '/vendor/autoload.php';

  $httpClient = new \Symfony\Component\HttpClient\Psr18Client();
  $client = new \ApiVideo\Client(
                      'https://sandbox.api.video',
                      'YOUR_API_TOKEN',
                      $httpClient
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

### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `file` | **\SplFileObject**| The &#x60;.jpg&#x60; or &#x60;.png&#x60; image to be added as a watermark. | `new \SplFileObject('path')` |




### Return type

[**\ApiVideo\Client\Model\Watermark**](../Model/Watermark.md)



