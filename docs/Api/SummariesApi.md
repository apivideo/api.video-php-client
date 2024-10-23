# ApiVideo\Client\Api\SummariesApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**create()**](SummariesApi.md#create) | Generate video summary | **POST** /summaries
[**update()**](SummariesApi.md#update) | Update summary details | **PATCH** /summaries/{summaryId}/source
[**delete()**](SummariesApi.md#delete) | Delete video summary | **DELETE** /summaries/{summaryId}
[**list()**](SummariesApi.md#list) | List summaries | **GET** /summaries
[**getSummarySource()**](SummariesApi.md#getSummarySource) | Get summary details | **GET** /summaries/{summaryId}/source


## **`create()` - Generate video summary**



Generate a title, abstract, and key takeaways for a video.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `summaryCreationPayload` | [**\ApiVideo\Client\Model\SummaryCreationPayload**](../Model/SummaryCreationPayload.md)|  |




### Return type

[**\ApiVideo\Client\Model\Summary**](../Model/Summary.md)





## **`update()` - Update summary details**



Update details for a summary. Note that this operation is only allowed for summary objects where `sourceStatus` is `missing`.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `summaryId` | **string**| The unique identifier of the summary source you want to update. |
 `summaryUpdatePayload` | [**\ApiVideo\Client\Model\SummaryUpdatePayload**](../Model/SummaryUpdatePayload.md)|  |




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





Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `videoId` | **string**| Use this parameter to filter for a summary that belongs to a specific video. | [optional]
 `origin` | **string**| Use this parameter to filter for summaries based on the way they were created: automatically or manually via the API. | [optional]
 `sourceStatus` | **string**| Use this parameter to filter for summaries based on the current status of the summary source.  These are the available statuses:  &#x60;missing&#x60;: the input for a summary is not present. &#x60;waiting&#x60; : the input video is being processed and a summary will be generated. &#x60;failed&#x60;: a technical issue prevented summary generation. &#x60;completed&#x60;: the summary is generated. &#x60;unprocessable&#x60;: the API rules the source video to be unsuitable for summary generation. An example for this is an input video that has no audio. | [optional]
 `sortBy` | **string**| Use this parameter to choose which field the API will use to sort the response data. The default is &#x60;value&#x60;.  These are the available fields to sort by:  - &#x60;createdAt&#x60;: Sorts the results based on date and timestamps when summaries were created. - &#x60;updatedAt&#x60;: Sorts the results based on date and timestamps when summaries were last updated. - &#x60;videoId&#x60;: Sorts the results based on video IDs. | [optional]
 `sortOrder` | **string**| Use this parameter to sort results. &#x60;asc&#x60; is ascending and sorts from A to Z. &#x60;desc&#x60; is descending and sorts from Z to A. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\SummariesListResponse**](../Model/SummariesListResponse.md)





## **`getSummarySource()` - Get summary details**



Get all details for a summary.

### Arguments



Name | Type | Description | Notes
------------- | ------------- | ------------- | -------------
 `summaryId` | **string**| The unique identifier of the summary source you want to retrieve. |




### Return type

[**\ApiVideo\Client\Model\SummarySource**](../Model/SummarySource.md)




