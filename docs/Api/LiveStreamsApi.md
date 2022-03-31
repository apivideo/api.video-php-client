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



A live stream will give you the 'connection point' to RTMP your video stream to api.video. 

It will also give you the details for viewers to watch the same livestream.  

The public=false 'private livestream' is available as a BETA feature, and should be limited to livestreams of 3,000 viewers or fewer. 

See our [Live Stream Tutorial](https://api.video/blog/tutorials/live-stream-tutorial) for a walkthrough of this API with OBS. 

Your RTMP endpoint for the livestream is rtmp://broadcast.api.video/s/{streamKey}

Tutorials that [create live streams](https://api.video/blog/endpoints/live-create).

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamCreationPayload` | [**\ApiVideo\Client\Model\LiveStreamCreationPayload**](../Model/LiveStreamCreationPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

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

$liveStream = $client->liveStreams()->create((new \ApiVideo\Client\Model\LiveStreamCreationPayload())
    ->setRecord(false) // Whether you are recording or not. True for record, false for not record.
    ->setName("My Live Stream Video") // Add a name for your live stream here.
    ->setPublic(true) // Whether your video can be viewed by everyone, or requires authentication to see it. 
    ->setPlayerId("pl4f4ferf5erfr5zed4fsdd")); // The unique identifier for the player. 
```




## **`get()` - Retrieve live stream**



Supply a liveStreamId, and you'll get all the details for streaming into, and watching the livestream. Tutorials that use the [show livestream endpoint](https://api.video/blog/endpoints/live-stream-status).

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream you want to watch. |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

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

$liveStreamId = 'li400mYKSgQ6xs7taUeSaEKr'; // The unique ID for the live stream you want to retrieve.
$liveStream = $client->liveStreams()->get($liveStreamId);
```




## **`update()` - Update a live stream**



Use this endpoint to update the player, or to turn recording on/off (saving a copy of the livestream). 

NOTE: If the livestream is actively streaming, changing the recording status will only affect the NEXT stream.    

The public=false "private livestream" is available as a BETA feature, and should be limited to livestreams of 3,000 viewers or fewer.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream that you want to update information for such as player details, or whether you want the recording on or off. |
 `liveStreamUpdatePayload` | [**\ApiVideo\Client\Model\LiveStreamUpdatePayload**](../Model/LiveStreamUpdatePayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

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

$liveStreamId = 'li400mYKSgQ6xs7taUeSaEKr'; // The unique ID for the live stream that you want to update information for such as player details, or whether you want the recording on or off.

$liveStreamUpdatePayload = (new \ApiVideo\Client\Model\LiveStreamUpdatePayload())
    ->setName("My Live Stream Video") // The name you want to use for your live stream.)
    ->setPublic(true) // Whether your video can be viewed by everyone, or requires authentication to see it. )
    ->setRecord(true) // Use this to indicate whether you want the recording on or off. On is true, off is false.)
    ->setPlayerId("pl45KFKdlddgk654dspkze"); // The unique ID for the player associated with a live stream that you want to update.)


$liveStream = $client->liveStreams()->update($liveStreamId, $liveStreamUpdatePayload); 
```




## **`delete()` - Delete a live stream**



If you do not need a live stream any longer, you can send a request to delete it. All you need is the liveStreamId.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream that you want to remove. |




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

$liveStreamId = 'li400mYKSgQ6xs7taUeSaEKr'; // The unique identifier of the live stream whose thumbnail you want to delete.
$liveStream = $client->liveStreams()->deleteThumbnail($liveStreamId); 
```




## **`list()` - List all live streams**



With no parameters added to the url, this will return all livestreams. Query by name or key to limit the list.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `streamKey` | **string**| The unique stream key that allows you to stream videos. | [optional]
 `name` | **string**| You can filter live streams by their name or a part of their name. | [optional]
 `sortBy` | **string**| Allowed: createdAt, publishedAt, name. createdAt - the time a livestream was created using the specified streamKey. publishedAt - the time a livestream was published using the specified streamKey. name - the name of the livestream. If you choose one of the time based options, the time is presented in ISO-8601 format. | [optional]
 `sortOrder` | **string**| Allowed: asc, desc. Ascending for date and time means that earlier values precede later ones. Descending means that later values preced earlier ones. For title, it is 0-9 and A-Z ascending and Z-A, 9-0 descending. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\LiveStreamListResponse**](../Model/LiveStreamListResponse.md)

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

// retrieve the first page of all livestreams
$liveStreams = $client->liveStreams()->list();

// retrieve the livestreams having a given name
$liveStreams2 = $client->liveStreams()->list(array(
    'name' => 'My livestream'
));

// retrieve the livestreams having a given stream key
$liveStreams2 = $client->liveStreams()->list(array(
  'streamKey' => '30087931-229e-42cf-b5f9-e91bcc1f7332'
));

// retrieve the second page of 30 items sorted by name desc
$liveStreams3 = $client->liveStreams()->list(array(
    'sortBy' => 'name',
    'sortOrder' => 'desc',
    'currentPage' => 2,
    'pageSize' => 30
)); 
```




## **`uploadThumbnail()` - Upload a thumbnail**



Upload an image to use as a backdrop for your livestream. Tutorials that [update live stream thumbnails](https://api.video/blog/endpoints/live-upload-a-thumbnail).

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique ID for the live stream you want to upload. |
 `file` | **\SplFileObject**| The image to be added as a thumbnail. The mime type should be image/jpeg, image/png or image/webp. The max allowed size is 8 MiB. |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

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

$liveStreamId = 'vi4k0jvEUuaTdRAEjQ4Jfrgz'; // The unique ID for the live stream you want to upload.
$file = new SplFileObject(__DIR__ . './thumbnail.jpg'); // The image to be added as a thumbnail.

$livestream = $client->liveStreams()->uploadThumbnail($liveStreamId, $file); 
```




## **`deleteThumbnail()` - Delete a thumbnail**



Send the unique identifier for a live stream to delete its thumbnail.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique identifier of the live stream whose thumbnail you want to delete. |




### Return type

[**\ApiVideo\Client\Model\LiveStream**](../Model/LiveStream.md)

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

$liveStreamId = 'li400mYKSgQ6xs7taUeSaEKr'; // The unique ID for the live stream you want to watch.
$liveStream = $client->liveStreams()->get(liveStreamId); 
```



