# OpenAPI\Client\RawStatisticsApi

All URIs are relative to https://ws.api.video.

Method | HTTP request | Description
------------- | ------------- | -------------
[**getLiveStreamAnalytics()**](RawStatisticsApi.md#getLiveStreamAnalytics) | **GET** /analytics/live-streams/{liveStreamId} | List live stream player sessions
[**listPlayerSessionEvents()**](RawStatisticsApi.md#listPlayerSessionEvents) | **GET** /analytics/sessions/{sessionId}/events | List player session events
[**listSessions()**](RawStatisticsApi.md#listSessions) | **GET** /analytics/videos/{videoId} | List video player sessions


## `getLiveStreamAnalytics()`

```php
getLiveStreamAnalytics($live_stream_id, $period, $current_page, $page_size): \OpenAPI\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse
```

List live stream player sessions

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RawStatisticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['live_stream_id'] = vi4k0jvEUuaTdRAEjQ4Jfrgz; // string | The unique identifier for the live stream you want to retrieve analytics for.
$associate_array['period'] = 2019-01-01; // string | Period must have one of the following formats:   - For a day : \"2018-01-01\", - For a week: \"2018-W01\",  - For a month: \"2018-01\" - For a year: \"2018\"  For a range period:  -  Date range: \"2018-01-01/2018-01-15\"
$associate_array['current_page'] = 2; // int | Choose the number of search results to return per page. Minimum value: 1
$associate_array['page_size'] = 30; // int | Results per page. Allowed values 1-100, default is 25.

try {
    $result = $apiInstance->getLiveStreamAnalytics($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RawStatisticsApi->getLiveStreamAnalytics: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **live_stream_id** | **string**| The unique identifier for the live stream you want to retrieve analytics for. |
 **period** | **string**| Period must have one of the following formats:   - For a day : \&quot;2018-01-01\&quot;, - For a week: \&quot;2018-W01\&quot;,  - For a month: \&quot;2018-01\&quot; - For a year: \&quot;2018\&quot;  For a range period:  -  Date range: \&quot;2018-01-01/2018-01-15\&quot; | [optional]
 **current_page** | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 **page_size** | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]

### Return type

[**\OpenAPI\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse**](../Model/RawStatisticsListLiveStreamAnalyticsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listPlayerSessionEvents()`

```php
listPlayerSessionEvents($session_id, $current_page, $page_size): \OpenAPI\Client\Model\RawStatisticsListPlayerSessionEventsResponse
```

List player session events

Useful to track and measure video's engagement.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RawStatisticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['session_id'] = psEmFwGQUAXR2lFHj5nDOpy; // string | A unique identifier you can use to reference and track a session with.
$associate_array['current_page'] = 2; // int | Choose the number of search results to return per page. Minimum value: 1
$associate_array['page_size'] = 30; // int | Results per page. Allowed values 1-100, default is 25.

try {
    $result = $apiInstance->listPlayerSessionEvents($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RawStatisticsApi->listPlayerSessionEvents: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **session_id** | **string**| A unique identifier you can use to reference and track a session with. |
 **current_page** | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 **page_size** | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]

### Return type

[**\OpenAPI\Client\Model\RawStatisticsListPlayerSessionEventsResponse**](../Model/RawStatisticsListPlayerSessionEventsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `listSessions()`

```php
listSessions($video_id, $period, $metadata, $current_page, $page_size): \OpenAPI\Client\Model\RawStatisticsListSessionsResponse
```

List video player sessions

Retrieve all available user sessions for a specific video.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure Bearer authorization: bearerAuth
$config = OpenAPI\Client\Configuration::getDefaultConfiguration()->setAccessToken('YOUR_ACCESS_TOKEN');


$apiInstance = new OpenAPI\Client\Api\RawStatisticsApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$associate_array['video_id'] = vi4k0jvEUuaTdRAEjQ4Prklg; // string | The unique identifier for the video you want to retrieve session information for.
$associate_array['period'] = 'period_example'; // string | Period must have one of the following formats:   - For a day : 2018-01-01, - For a week: 2018-W01,  - For a month: 2018-01 - For a year: 2018  For a range period:  -  Date range: 2018-01-01/2018-01-15
$associate_array['metadata'] = [{"key": "Author", "value": "John Doe"}, {"key": "Format", "value": "Tutorial"}]; // string[] | Metadata and Dynamic Metadata filter. Send an array of key value pairs you want to filter sessios with.
$associate_array['current_page'] = 2; // int | Choose the number of search results to return per page. Minimum value: 1
$associate_array['page_size'] = 30; // int | Results per page. Allowed values 1-100, default is 25.

try {
    $result = $apiInstance->listSessions($associate_array);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling RawStatisticsApi->listSessions: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

Note: the input parameter is an associative array with the keys listed as the parameter name below.

Name | Type | Description  | Notes
------------- | ------------- | ------------- | -------------
 **video_id** | **string**| The unique identifier for the video you want to retrieve session information for. |
 **period** | **string**| Period must have one of the following formats:   - For a day : 2018-01-01, - For a week: 2018-W01,  - For a month: 2018-01 - For a year: 2018  For a range period:  -  Date range: 2018-01-01/2018-01-15 | [optional]
 **metadata** | [**string[]**](../Model/string.md)| Metadata and Dynamic Metadata filter. Send an array of key value pairs you want to filter sessios with. | [optional]
 **current_page** | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 **page_size** | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]

### Return type

[**\OpenAPI\Client\Model\RawStatisticsListSessionsResponse**](../Model/RawStatisticsListSessionsResponse.md)

### Authorization

[bearerAuth](../../README.md#bearerAuth)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/vnd.api.video+json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
