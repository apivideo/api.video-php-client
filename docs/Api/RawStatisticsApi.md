# ApiVideo\Client\Api\RawStatisticsApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**listLiveStreamSessions()**](RawStatisticsApi.md#listLiveStreamSessions) | List live stream player sessions | **GET** `/analytics/live-streams/{liveStreamId}`
[**listSessionEvents()**](RawStatisticsApi.md#listSessionEvents) | List player session events | **GET** `/analytics/sessions/{sessionId}/events`
[**listVideoSessions()**](RawStatisticsApi.md#listVideoSessions) | List video player sessions | **GET** `/analytics/videos/{videoId}`


## **`listLiveStreamSessions()` - List live stream player sessions**



### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `liveStreamId` | **string**| The unique identifier for the live stream you want to retrieve analytics for. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `period` | **string**| Period must have one of the following formats:  - For a day : \&quot;2018-01-01\&quot;, - For a week: \&quot;2018-W01\&quot;,  - For a month: \&quot;2018-01\&quot; - For a year: \&quot;2018\&quot; For a range period:  -  Date range: \&quot;2018-01-01/2018-01-15\&quot; |
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse**](../Model/RawStatisticsListLiveStreamAnalyticsResponse.md)





## **`listSessionEvents()` - List player session events**



Useful to track and measure video's engagement.

### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `sessionId` | **string**| A unique identifier you can use to reference and track a session with. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\RawStatisticsListPlayerSessionEventsResponse**](../Model/RawStatisticsListPlayerSessionEventsResponse.md)





## **`listVideoSessions()` - List video player sessions**



Retrieve all available user sessions for a specific video. Tutorials that use the [analytics endpoint](https://api.video/blog/endpoints/analytics).

### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `videoId` | **string**| The unique identifier for the video you want to retrieve session information for. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `period` | **string**| Period must have one of the following formats:  - For a day : 2018-01-01, - For a week: 2018-W01,  - For a month: 2018-01 - For a year: 2018 For a range period:  -  Date range: 2018-01-01/2018-01-15 |
 `metadata` | [**array<string,string>**](../Model/string.md)| Metadata and [Dynamic Metadata](https://api.video/blog/endpoints/dynamic-metadata) filter. Send an array of key value pairs you want to filter sessios with. | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\RawStatisticsListSessionsResponse**](../Model/RawStatisticsListSessionsResponse.md)




