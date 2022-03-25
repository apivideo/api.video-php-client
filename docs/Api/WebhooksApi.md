# ApiVideo\Client\Api\WebhooksApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**delete()**](WebhooksApi.md#delete) | **DELETE** `/webhooks/{webhookId}` | Delete a Webhook
[**get()**](WebhooksApi.md#get) | **GET** `/webhooks/{webhookId}` | Show Webhook details
[**list()**](WebhooksApi.md#list) | **GET** `/webhooks` | List all webhooks
[**create()**](WebhooksApi.md#create) | **POST** `/webhooks` | Create Webhook


## delete()


This endpoint will delete the indicated webhook.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `webhookId` | **string**| The webhook you wish to delete. | `'webhookId_example'` |




### Return type

void (empty response body)




## get()


This call provides the same JSON information provided on Webjhook creation.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `webhookId` | **string**| The unique webhook you wish to retreive details on. | `'webhookId_example'` |




### Return type

[**\ApiVideo\Client\Model\Webhook**](../Model/Webhook.md)




## list()


Requests to this endpoint return a list of your webhooks (with all their details). You can filter what the webhook list that the API returns using the parameters described below.


### Arguments





Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `events` | **string**| The webhook event that you wish to filter on. | `video.encoding.quality.completed` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\WebhooksListResponse**](../Model/WebhooksListResponse.md)




## create()


Webhooks can push notifications to your server, rather than polling api.video for changes. We currently offer four events:  * ```video.encoding.quality.completed``` Occurs when a new video is uploaded into your account, it will be encoded into several different HLS and mp4 qualities. When each version is encoded, your webhook will get a notification.  It will look like ```{ \\\"type\\\": \\\"video.encoding.quality.completed\\\", \\\"emittedAt\\\": \\\"2021-01-29T16:46:25.217+01:00\\\", \\\"videoId\\\": \\\"viXXXXXXXX\\\", \\\"encoding\\\": \\\"hls\\\", \\\"quality\\\": \\\"720p\\\"} ```. This request says that the 720p HLS encoding was completed. * ```live-stream.broadcast.started```  When a live stream begins broadcasting, the broadcasting parameter changes from false to true, and this webhook fires. * ```live-stream.broadcast.ended```  This event fires when the live stream has finished broadcasting, and the broadcasting parameter flips from false to true. * ```video.source.recorded```  This event occurs when a live stream is recorded and submitted for encoding.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `webhooksCreationPayload` | [**\ApiVideo\Client\Model\WebhooksCreationPayload**](../Model/WebhooksCreationPayload.md)|  | `new \ApiVideo\Client\Model\WebhooksCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\Webhook**](../Model/Webhook.md)



