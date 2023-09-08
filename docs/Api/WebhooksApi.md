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

* ```live-stream.broadcast.ended```  This event fires when a live stream has finished broadcasting.

* ```video.source.recorded```  This event occurs when a live stream is recorded and submitted for encoding.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `webhooksCreationPayload` | [**\ApiVideo\Client\Model\WebhooksCreationPayload**](../Model/WebhooksCreationPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Webhook**](../Model/Webhook.md)





## **`get()` - Retrieve Webhook details**



Retrieve webhook details by id.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `webhookId` | **string**| The unique webhook you wish to retreive details on. |




### Return type

[**\ApiVideo\Client\Model\Webhook**](../Model/Webhook.md)





## **`delete()` - Delete a Webhook**



This method will delete the indicated webhook.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `webhookId` | **string**| The webhook you wish to delete. |




### Return type

void (empty response body)





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




