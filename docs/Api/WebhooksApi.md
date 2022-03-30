# ApiVideo\Client\Api\WebhooksApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](WebhooksApi.md#create) | Create Webhook | **POST** `/webhooks`
[**get()**](WebhooksApi.md#get) | Retrieve Webhook details | **GET** `/webhooks/{webhookId}`
[**delete()**](WebhooksApi.md#delete) | Delete a Webhook | **DELETE** `/webhooks/{webhookId}`
[**list()**](WebhooksApi.md#list) | List all webhooks | **GET** `/webhooks`


## **`create()` - Create Webhook**



Webhooks can push notifications to your server, rather than polling api.video for changes. We currently offer four events: 

* ```video.encoding.quality.completed``` Occurs when a new video is uploaded into your account, it will be encoded into several different HLS and mp4 qualities. When each version is encoded, your webhook will get a notification.  It will look like ```{ "type": "video.encoding.quality.completed", "emittedAt": "2021-01-29T16:46:25.217+01:00", "videoId": "viXXXXXXXX", "encoding": "hls", "quality": "720p"} ```. This request says that the 720p HLS encoding was completed.

* ```live-stream.broadcast.started```  When a live stream begins broadcasting, the broadcasting parameter changes from false to true, and this webhook fires.

* ```live-stream.broadcast.ended```  This event fires when the live stream has finished broadcasting, and the broadcasting parameter flips from false to true.

* ```video.source.recorded```  This event occurs when a live stream is recorded and submitted for encoding.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `webhooksCreationPayload` | [**\ApiVideo\Client\Model\WebhooksCreationPayload**](../Model/WebhooksCreationPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Webhook**](../Model/Webhook.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$webhooksCreationPayload = (new \ApiVideo\Client\Model\WebhooksCreationPayload())
    ->setEvents(['video.encoding.quality.completed']) // A list of the webhooks that you are subscribing to. There are Currently four webhook options: * ```video.encoding.quality.completed```  Occurs when a new video is uploaded into your account, it will be encoded into several different HLS and mp4 qualities. When each version is encoded, your webhook will get a notification.  It will look like ```{ "type": "video.encoding.quality.completed", "emittedAt": "2021-01-29T16:46:25.217+01:00", "videoId": "viXXXXXXXX", "encoding": "hls", "quality": "720p"} ```. This request says that the 720p HLS encoding was completed. * ```live-stream.broadcast.started```  When a lives tream begins broadcasting, the broadcasting parameter changes from false to true, and this webhook fires. * ```live-stream.broadcast.ended```  This event fires when the live stream has finished broadcasting, and the broadcasting parameter flips from false to true. * ```video.source.recorded```  Occurs when a live stream is recorded and submitted for encoding.)
    ->setUrl("https://example.com/webhooks"); // The url to which HTTP notifications are sent. It could be any http or https URL.)

$webhook = $client->webhooks()->create($webhooksCreationPayload); 
```




## **`get()` - Retrieve Webhook details**



This call provides the same JSON information provided on Webhook creation.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `webhookId` | **string**| The unique webhook you wish to retreive details on. |




### Return type

[**\ApiVideo\Client\Model\Webhook**](../Model/Webhook.md)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$webhookId = 'webhookId_example'; // The unique webhook you wish to retreive details on.

$webhook = $client->webhooks()->get($webhookId);  
```




## **`delete()` - Delete a Webhook**



This method will delete the indicated webhook.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `webhookId` | **string**| The webhook you wish to delete. |




### Return type

void (empty response body)

### Example

```php
<?php
// First install the api client: "composer require api-video/php-api-client"

require __DIR__ . '/vendor/autoload.php';

$webhookId = 'webhookId_example'; // The webhook you wish to delete.
$client->webhooks()->delete($webhookId);  
```




## **`list()` - List all webhooks**



Thie method returns a list of your webhooks (with all their details). 

You can filter what the webhook list that the API returns using the parameters described below.

### Arguments





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `events` | **string**| The webhook event that you wish to filter on. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\WebhooksListResponse**](../Model/WebhooksListResponse.md)

### Example

```php
const client = new ApiVideoClient({ apiKey: "YOUR_API_KEY" });

const events = 'video.encoding.quality.completed'; // The webhook event that you wish to filter on.
const currentPage = 2; // Choose the number of search results to return per page. Minimum value: 1
const pageSize = 30; // Results per page. Allowed values 1-100, default is 25.

// WebhooksListResponse
const webhooks = await client.webhooks.list({ events, currentPage, pageSize }); 
```



