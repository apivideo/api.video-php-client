# ApiVideo\Client\Api\RawStatisticsApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**listLiveStreamSessions()**](RawStatisticsApi.md#listLiveStreamSessions) | **GET** `/analytics/live-streams/{liveStreamId}` | List live stream player sessions
[**listSessionEvents()**](RawStatisticsApi.md#listSessionEvents) | **GET** `/analytics/sessions/{sessionId}/events` | List player session events
[**listVideoSessions()**](RawStatisticsApi.md#listVideoSessions) | **GET** `/analytics/videos/{videoId}` | List video player sessions


## listLiveStreamSessions()




### Arguments


Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `liveStreamId` | **string**| The unique identifier for the live stream you want to retrieve analytics for. | `vi4k0jvEUuaTdRAEjQ4Jfrgz` |


Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `period` | **string**| Period must have one of the following formats:  - For a day : \&quot;2018-01-01\&quot;, - For a week: \&quot;2018-W01\&quot;,  - For a month: \&quot;2018-01\&quot; - For a year: \&quot;2018\&quot; For a range period:  -  Date range: \&quot;2018-01-01/2018-01-15\&quot; | `2019-01-01` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse**](../Model/RawStatisticsListLiveStreamAnalyticsResponse.md)




## listSessionEvents()


Useful to track and measure video's engagement.


### Arguments


Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `sessionId` | **string**| A unique identifier you can use to reference and track a session with. | `psEmFwGQUAXR2lFHj5nDOpy` |


Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\RawStatisticsListPlayerSessionEventsResponse**](../Model/RawStatisticsListPlayerSessionEventsResponse.md)




## listVideoSessions()


Retrieve all available user sessions for a specific video. Tutorials that use the [analytics endpoint](https://api.video/blog/endpoints/analytics).


### Arguments


Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `videoId` | **string**| The unique identifier for the video you want to retrieve session information for. | `vi4k0jvEUuaTdRAEjQ4Prklg` |


Note: `$queryParams` argument is an associative array with the keys listed below.

Name | Type | Description  | Example | Notes
------------- | ------------- | ------------- | ------------- | -------------
 `period` | **string**| Period must have one of the following formats:  - For a day : 2018-01-01, - For a week: 2018-W01,  - For a month: 2018-01 - For a year: 2018 For a range period:  -  Date range: 2018-01-01/2018-01-15 | `'period_example'` | [optional]
 `metadata` | [**map[string,string]**](../Model/string.md)| Metadata and [Dynamic Metadata](https://api.video/blog/endpoints/dynamic-metadata) filter. Send an array of key value pairs you want to filter sessios with. | `metadata[Author]=John Doe&metadata[Format]=Tutorial` | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | `2` | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | `30` | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\RawStatisticsListSessionsResponse**](../Model/RawStatisticsListSessionsResponse.md)



