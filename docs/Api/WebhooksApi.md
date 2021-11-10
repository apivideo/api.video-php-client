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


Webhooks can push notifications to your server, rather than polling api.video for changes. We currently offer four events:  * ```video.encoding.quality.completed```  When a new video is uploaded into your account, it will be encoded into several different HLS sizes/bitrates.  When each version is encoded, your webhook will get a notification.  It will look like ```{ \\\"type\\\": \\\"video.encoding.quality.completed\\\", \\\"emittedAt\\\": \\\"2021-01-29T16:46:25.217+01:00\\\", \\\"videoId\\\": \\\"viXXXXXXXX\\\", \\\"encoding\\\": \\\"hls\\\", \\\"quality\\\": \\\"720p\\\"} ```. This request says that the 720p HLS encoding was completed. * ```live-stream.broadcast.started```  When a livestream begins broadcasting, the broadcasting parameter changes from false to true, and this webhook fires. * ```live-stream.broadcast.ended```  This event fores when the livestream has finished broadcasting, and the broadcasting parameter flips from false to true. * ```video.source.recorded```  This event is similar to ```video.encoding.quality.completed```, but tells you if a livestream has been recorded as a VOD.


### Arguments



Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `webhooksCreationPayload` | [**\ApiVideo\Client\Model\WebhooksCreationPayload**](../Model/WebhooksCreationPayload.md)|  | `new \ApiVideo\Client\Model\WebhooksCreationPayload()` |




### Return type

[**\ApiVideo\Client\Model\Webhook**](../Model/Webhook.md)



