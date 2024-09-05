# ApiVideo\Client\Api\AnalyticsApi

All URIs are relative to https://ws.api.video.

Method | Description | HTTP request
------------- | ------------- | -------------
[**getAggregatedMetrics()**](AnalyticsApi.md#getAggregatedMetrics) | Retrieve aggregated metrics | **GET** /data/metrics/{metric}/{aggregation}
[**getMetricsBreakdown()**](AnalyticsApi.md#getMetricsBreakdown) | Retrieve metrics in a breakdown of dimensions | **GET** /data/buckets/{metric}/{breakdown}
[**getMetricsOverTime()**](AnalyticsApi.md#getMetricsOverTime) | Retrieve metrics over time | **GET** /data/timeseries/{metric}


## **`getAggregatedMetrics()` - Retrieve aggregated metrics**



Retrieve time-based and countable metrics like average watch time or the number of impressions over a certain period of time.

### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `metric` | **string**| Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. You can use the aggregations &#x60;count&#x60;, &#x60;rate&#x60;, and &#x60;total&#x60; with the &#x60;play&#x60; metric. - &#x60;start&#x60; is the number of times playback was started. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;impression-time&#x60; is the time in milliseconds that your content was loading for until the first video frame is displayed. You can use the aggregations &#x60;average&#x60; and &#x60;sum&#x60; with this metric. - &#x60;watch-time&#x60; is the cumulative time in seconds that the user has spent watching your content. You can use the aggregations &#x60;average&#x60; and &#x60;sum&#x60; with this metric. |
`queryParams` | array | (see below) |
 `aggregation` | **string**| Use this path parameter to define a way of collecting data for the metric that you want analytics for.  - &#x60;count&#x60; returns the overall number of events for the &#x60;play&#x60; metric. - &#x60;rate&#x60; returns the ratio that calculates the number of plays your content receives divided by its impressions. This aggregation can be used only with the &#x60;play&#x60; metric. - &#x60;total&#x60; calculates the total number of events for the &#x60;play&#x60; metric.  - &#x60;average&#x60; calculates an average value for the selected metric. - &#x60;sum&#x60; adds up the total value of the select metric. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `from` | **\DateTime**| Use this query parameter to define the starting date-time of the period you want analytics for.  - If you do not set a value for &#x60;from&#x60;, the default assigned value is 1 day ago, based on the &#x60;to&#x60; parameter. - The maximum value is 30 days ago. - The value you provide should follow the ATOM date-time format: &#x60;2024-02-05T00:00:00+01:00&#x60; - The API ignores this parameter when you call &#x60;/data/metrics/play/total&#x60;. | [optional]
 `to` | **\DateTime**| Use this query parameter to define the ending date-time of the period you want analytics for.  - If you do not set a value for &#x60;to&#x60;, the default assigned value is &#x60;now&#x60;. - The API ignores this parameter when you call &#x60;/data/metrics/play/total&#x60;. - The value for &#x60;to&#x60; is a non-inclusive value: the API returns data **before** the date-time that you set. | [optional]
 `filterBy` | [**FilterBy2**](../Model/.md)| Use this parameter to filter the API&#39;s response based on different data dimensions. You can serialize filters in your query to receive more detailed breakdowns of your analytics.  - If you do not set a value for &#x60;filterBy&#x60;, the API returns the full dataset for your project. - The API only accepts the &#x60;mediaId&#x60; and &#x60;mediaType&#x60; filters when you call &#x60;/data/metrics/play/total&#x60; or &#x60;/data/buckets/play-total/media-id&#x60;.  These are the available breakdown dimensions:  - &#x60;mediaId&#x60;: Returns analytics based on the unique identifiers of a video or a live stream. - &#x60;mediaType&#x60;: Returns analytics based on the type of content. Possible values: &#x60;video&#x60; and &#x60;live-stream&#x60;.  - &#x60;continent&#x60;: Returns analytics based on the viewers&#39; continent. The list of supported continents names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example &#x60;EU&#x60;. Possible values are: &#x60;AS&#x60;, &#x60;AF&#x60;, &#x60;NA&#x60;, &#x60;SA&#x60;, &#x60;AN&#x60;, &#x60;EU&#x60;, &#x60;AZ&#x60;.  - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example &#x60;FR&#x60;. - &#x60;deviceType&#x60;: Returns analytics based on the type of device used by the viewers. Response values can include: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operatingSystem&#x60;: Returns analytics based on the operating system used by the viewers. Response values can include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers. Response values can include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. - &#x60;tag&#x60;: Returns analytics for videos using this tag. This filter only accepts a single value and is case sensitive. Read more about tagging your videos [here](https://docs.api.video/vod/tags-metadata). | [optional]






### Return type

[**\ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponse**](../Model/AnalyticsAggregatedMetricsResponse.md)





## **`getMetricsBreakdown()` - Retrieve metrics in a breakdown of dimensions**



Retrieve detailed analytics play-rate and number of impressions segmented by dimensions like country or device type.

### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `metric` | **string**| Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. - &#x60;play-rate&#x60; is the ratio that calculates the number of plays your content receives divided by its impressions. - &#x60;play-total&#x60; is the total number of times a specific content has been played. You can only use the &#x60;media-id&#x60; breakdown with this metric. - &#x60;start&#x60; is the number of times playback was started. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. |
`queryParams` | array | (see below) |
 `breakdown` | **string**| Use this path parameter to define a dimension for segmenting analytics data. You must use &#x60;kebab-case&#x60; for path parameters.  These are the available dimensions:  - &#x60;media-id&#x60;: Returns analytics based on the unique identifiers of a video or a live stream. - &#x60;media-type&#x60;: Returns analytics based on the type of content. Possible values: &#x60;video&#x60; and &#x60;live-stream&#x60;.  - &#x60;continent&#x60;: Returns analytics based on the viewers&#39; continent. The list of supported continents names are based on the [GeoNames public database](https://www.geonames.org/countries/). Possible values are: &#x60;AS&#x60;, &#x60;AF&#x60;, &#x60;NA&#x60;, &#x60;SA&#x60;, &#x60;AN&#x60;, &#x60;EU&#x60;, &#x60;AZ&#x60;.  - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). - &#x60;device-type&#x60;: Returns analytics based on the type of device used by the viewers. Response values can include: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operating-system&#x60;: Returns analytics based on the operating system used by the viewers. Response values can include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers. Response values can include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `from` | **\DateTime**| Use this query parameter to define the starting date-time of the period you want analytics for.  - If you do not set a value for &#x60;from&#x60;, the default assigned value is 1 day ago, based on the &#x60;to&#x60; parameter. - The maximum value is 30 days ago. - The value you provide should follow the ATOM date-time format: &#x60;2024-02-05T00:00:00+01:00&#x60; | [optional]
 `to` | **\DateTime**| Use this query parameter to define the ending date-time of the period you want analytics for.  - If you do not set a value for &#x60;to&#x60;, the default assigned value is &#x60;now&#x60;. - The value for &#x60;to&#x60; is a non-inclusive value: the API returns data **before** the date-time that you set. | [optional]
 `sortBy` | **string**| Use this parameter to choose which field the API will use to sort the analytics data.  These are the available fields to sort by:  - &#x60;metricValue&#x60;: Sorts the results based on the **metric** you selected in your request. - &#x60;dimensionValue&#x60;: Sorts the results based on the **dimension** you selected in your request. | [optional]
 `sortOrder` | **string**| Use this parameter to define the sort order of results.  These are the available sort orders:  - &#x60;asc&#x60;: Sorts the results in ascending order: &#x60;A to Z&#x60; and &#x60;0 to 9&#x60;. - &#x60;desc&#x60;: Sorts the results in descending order: &#x60;Z to A&#x60; and &#x60;9 to 0&#x60;. | [optional]
 `filterBy` | [**FilterBy2**](../Model/.md)| Use this parameter to filter the API&#39;s response based on different data dimensions. You can serialize filters in your query to receive more detailed breakdowns of your analytics.  - If you do not set a value for &#x60;filterBy&#x60;, the API returns the full dataset for your project. - The API only accepts the &#x60;mediaId&#x60; and &#x60;mediaType&#x60; filters when you call &#x60;/data/metrics/play/total&#x60; or &#x60;/data/buckets/play-total/media-id&#x60;.  These are the available breakdown dimensions:  - &#x60;mediaId&#x60;: Returns analytics based on the unique identifiers of a video or a live stream. - &#x60;mediaType&#x60;: Returns analytics based on the type of content. Possible values: &#x60;video&#x60; and &#x60;live-stream&#x60;.  - &#x60;continent&#x60;: Returns analytics based on the viewers&#39; continent. The list of supported continents names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example &#x60;EU&#x60;. Possible values are: &#x60;AS&#x60;, &#x60;AF&#x60;, &#x60;NA&#x60;, &#x60;SA&#x60;, &#x60;AN&#x60;, &#x60;EU&#x60;, &#x60;AZ&#x60;.  - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example &#x60;FR&#x60;. - &#x60;deviceType&#x60;: Returns analytics based on the type of device used by the viewers. Response values can include: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operatingSystem&#x60;: Returns analytics based on the operating system used by the viewers. Response values can include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers. Response values can include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. - &#x60;tag&#x60;: Returns analytics for videos using this tag. This filter only accepts a single value and is case sensitive. Read more about tagging your videos [here](https://docs.api.video/vod/tags-metadata). | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\AnalyticsMetricsBreakdownResponse**](../Model/AnalyticsMetricsBreakdownResponse.md)





## **`getMetricsOverTime()` - Retrieve metrics over time**



Retrieve countable metrics like the number of plays or impressions, grouped by the time at which they occurred

### Arguments


Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `metric` | **string**| Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. - &#x60;play-rate&#x60; is the ratio that calculates the number of plays your content receives divided by its impressions. - &#x60;start&#x60; is the number of times playback was started. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. |
`queryParams` | array | (see below) |


Note: `queryParams` argument is an associative array with the keys listed below.

Name | Type | Description | Notes
------------- | ------------- | ------------- | ------------- 
 `from` | **\DateTime**| Use this query parameter to define the starting date-time of the period you want analytics for.  - If you do not set a value for &#x60;from&#x60;, the default assigned value is 1 day ago, based on the &#x60;to&#x60; parameter. - The maximum value is 30 days ago. - The value you provide should follow the ATOM date-time format: &#x60;2024-02-05T00:00:00+01:00&#x60; | [optional]
 `to` | **\DateTime**| Use this query parameter to define the ending date-time of the period you want analytics for.  - If you do not set a value for &#x60;to&#x60;, the default assigned value is &#x60;now&#x60;. - The value for &#x60;to&#x60; is a non-inclusive value: the API returns data **before** the date-time that you set. | [optional]
 `interval` | **string**| Use this query parameter to define how granularity of the data. Possible values: &#x60;hour&#x60;, &#x60;day&#x60;.  - Default: If no interval specified and the period (different between from and to) ≤ 2 days then hour, otherwise day.  - If you do not set a value for &#x60;interval&#x60;, and the period you set using the &#x60;from&#x60; and &#x60;to&#x60; parameters is less than or equals to 2 days, then the default assigned value is &#x60;hour&#x60;. Otherwise the API sets it to &#x60;day&#x60;. | [optional]
 `sortBy` | **string**| Use this parameter to choose which field the API will use to sort the analytics data.  These are the available fields to sort by:  - &#x60;metricValue&#x60;: Sorts the results based on the **metric** you selected in your request. - &#x60;emittedAt&#x60;: Sorts the results based on the **timestamp** of the event in ATOM date-time format. | [optional]
 `sortOrder` | **string**| Use this parameter to define the sort order of results.  These are the available sort orders:  - &#x60;asc&#x60;: Sorts the results in ascending order: &#x60;A to Z&#x60; and &#x60;0 to 9&#x60;. - &#x60;desc&#x60;: Sorts the results in descending order: &#x60;Z to A&#x60; and &#x60;9 to 0&#x60;. | [optional]
 `filterBy` | [**FilterBy2**](../Model/.md)| Use this parameter to filter the API&#39;s response based on different data dimensions. You can serialize filters in your query to receive more detailed breakdowns of your analytics.  - If you do not set a value for &#x60;filterBy&#x60;, the API returns the full dataset for your project. - The API only accepts the &#x60;mediaId&#x60; and &#x60;mediaType&#x60; filters when you call &#x60;/data/metrics/play/total&#x60; or &#x60;/data/buckets/play-total/media-id&#x60;.  These are the available breakdown dimensions:  - &#x60;mediaId&#x60;: Returns analytics based on the unique identifiers of a video or a live stream. - &#x60;mediaType&#x60;: Returns analytics based on the type of content. Possible values: &#x60;video&#x60; and &#x60;live-stream&#x60;.  - &#x60;continent&#x60;: Returns analytics based on the viewers&#39; continent. The list of supported continents names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example &#x60;EU&#x60;. Possible values are: &#x60;AS&#x60;, &#x60;AF&#x60;, &#x60;NA&#x60;, &#x60;SA&#x60;, &#x60;AN&#x60;, &#x60;EU&#x60;, &#x60;AZ&#x60;.  - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example &#x60;FR&#x60;. - &#x60;deviceType&#x60;: Returns analytics based on the type of device used by the viewers. Response values can include: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operatingSystem&#x60;: Returns analytics based on the operating system used by the viewers. Response values can include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers. Response values can include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. - &#x60;tag&#x60;: Returns analytics for videos using this tag. This filter only accepts a single value and is case sensitive. Read more about tagging your videos [here](https://docs.api.video/vod/tags-metadata). | [optional]
 `currentPage` | **int**| Choose the number of search results to return per page. Minimum value: 1 | [optional] [default to 1]
 `pageSize` | **int**| Results per page. Allowed values 1-100, default is 25. | [optional] [default to 25]






### Return type

[**\ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponse**](../Model/AnalyticsMetricsOverTimeResponse.md)




