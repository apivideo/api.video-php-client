# ApiVideo\Client\Api\SummariesApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](SummariesApi.md#create) | Generate video summary | **POST** /summaries
[**get()**](SummariesApi.md#get) | Get summary details | **GET** /summaries/{summaryId}/source
[**update()**](SummariesApi.md#update) | Update summary details | **PATCH** /summaries/{summaryId}/source
[**delete()**](SummariesApi.md#delete) | Delete video summary | **DELETE** /summaries/{summaryId}
[**list()**](SummariesApi.md#list) | List summaries | **GET** /summaries


## **`create()` - Generate video summary**



Generate a title, abstract, and key takeaways for a video.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `inlineObject` | [**\ApiVideo\Client\Model\InlineObject**](../Model/InlineObject.md)|  |




### Return type

[**\ApiVideo\Client\Model\SummaryObject**](../Model/SummaryObject.md)





## **`get()` - Get summary details**



Get all details for a summary.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `summaryId` | **string**| The unique identifier of the summary source you want to retrieve. |




### Return type

[**\ApiVideo\Client\Model\SummarySource**](../Model/SummarySource.md)





## **`update()` - Update summary details**



Update details for a summary. Note that this operation is only allowed for summary objects where `sourceStatus` is `missing`.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `summaryId` | **string**| The unique identifier of the summary source you want to update. |
 `updateSummaryRequest` | [**\ApiVideo\Client\Model\UpdateSummaryRequest**](../Model/UpdateSummaryRequest.md)|  |




### Return type

[**\ApiVideo\Client\Model\SummarySource**](../Model/SummarySource.md)





## **`delete()` - Delete video summary**



Delete a summary tied to a video.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `summaryId` | **string**| The unique identifier of the summary you want to delete. |




### Return type

void (empty response body)





## **`list()` - List summaries**



List all summarries for your videos in a project.

### Arguments






This endpoint does not need any parameter.

### Return type

[**\ApiVideo\Client\Model\GetSummaries**](../Model/GetSummaries.md)




