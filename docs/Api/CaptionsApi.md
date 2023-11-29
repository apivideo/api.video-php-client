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



Upload a VTT file to add captions to your video. More information can be found [here](https://docs.api.video/vod/add-captions)

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to add a caption to. |
 `language` | **string**| A valid language identifier using IETF language tags. You can use primary subtags like &#x60;en&#x60; (English), extended subtags like &#x60;fr-CA&#x60; (French, Canada), or region subtags like &#x60;zh-Hans-CN&#x60; (Simplified Chinese used in the PRC).  - This parameter **only accepts dashes for separators**, for example &#x60;fr-CA&#x60;. If you use a different separator in your request, the API returns an error. - When the value in your request does not match any covered language, the API returns an error. - You can find the list of supported tags [here](https://docs.api.video/vod/add-captions#supported-caption-language-tags). |
 `file` | **\SplFileObject**| The video text track (VTT) you want to upload. |




### Return type

[**\ApiVideo\Client\Model\Caption**](../Model/Caption.md)





## **`get()` - Retrieve a caption**



Retrieve a caption for a video in a specific language. If the language is available, the caption is returned. Otherwise, you will get a error indicating the caption was not found.

Tutorials that use the [captions endpoint](https://api.video/blog/endpoints/captions).

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want captions for. |
 `language` | **string**| A valid language identifier using IETF language tags. You can use primary subtags like &#x60;en&#x60; (English), extended subtags like &#x60;fr-CA&#x60; (French, Canada), or region subtags like &#x60;zh-Hans-CN&#x60; (Simplified Chinese used in the PRC).  - This parameter **only accepts dashes for separators**, for example &#x60;fr-CA&#x60;. If you use a different separator in your request, the API returns an error. - When the value in your request does not match any covered language, the API returns an error. - You can find the list of supported tags [here](https://docs.api.video/vod/add-captions#supported-caption-language-tags). |




### Return type

[**\ApiVideo\Client\Model\Caption**](../Model/Caption.md)





## **`update()` - Update a caption**



To have the captions on automatically, use this method to set default: true.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to have automatic captions for. |
 `language` | **string**| A valid language identifier using IETF language tags. You can use primary subtags like &#x60;en&#x60; (English), extended subtags like &#x60;fr-CA&#x60; (French, Canada), or region subtags like &#x60;zh-Hans-CN&#x60; (Simplified Chinese used in the PRC).  - This parameter **only accepts dashes for separators**, for example &#x60;fr-CA&#x60;. If you use a different separator in your request, the API returns an error. - When the value in your request does not match any covered language, the API returns an error. - You can find the list of supported tags [here](https://docs.api.video/vod/add-captions#supported-caption-language-tags). |
 `captionsUpdatePayload` | [**\ApiVideo\Client\Model\CaptionsUpdatePayload**](../Model/CaptionsUpdatePayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Caption**](../Model/Caption.md)





## **`delete()` - Delete a caption**



Delete a caption in a specific language by by video id.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to delete a caption from. |
 `language` | **string**| A valid language identifier using IETF language tags. You can use primary subtags like &#x60;en&#x60; (English), extended subtags like &#x60;fr-CA&#x60; (French, Canada), or region subtags like &#x60;zh-Hans-CN&#x60; (Simplified Chinese used in the PRC).  - This parameter **only accepts dashes for separators**, for example &#x60;fr-CA&#x60;. If you use a different separator in your request, the API returns an error. - When the value in your request does not match any covered language, the API returns an error. - You can find the list of supported tags [here](https://docs.api.video/vod/add-captions#supported-caption-language-tags). |




### Return type

void (empty response body)





## **`list()` - List video captions**



Retrieve a list of available captions by video id.

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




