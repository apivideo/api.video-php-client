<?php declare(strict_types = 1);
/**
* api.video PHP API client
* api.video is an API that encodes on the go to facilitate immediate playback, enhancing viewer streaming experiences across multiple devices and platforms. You can stream live or on-demand online videos within minutes.
*
* The version of the OpenAPI document: 1
* Contact: ecosystem@api.video
*
* NOTE: This class is auto generated.
* Do not edit the class manually.
*/


namespace ApiVideo\Client\Api;

use ApiVideo\Client\BaseClient;
use ApiVideo\Client\ModelPreprocessor;
use Exception;
use Http\Message\MultipartStream\MultipartStreamBuilder;
use Psr\Http\Client\ClientExceptionInterface;
use ApiVideo\Client\Request;
use ApiVideo\Client\ObjectSerializer;
use ApiVideo\Client\VideoUploader;
use ApiVideo\Client\ProgressiveUploadSession;

/**
 * @category Class
 * @package  ApiVideo\Client
 */
class AnalyticsApi implements ApiInterface
{
    /**
     * @var BaseClient
     */
    private $client;

    /**
     * @param BaseClient $client
     */
    public function __construct(BaseClient $client)
    {
        $this->client = $client;
    }

    /**
     * Retrieve aggregated metrics
     *
     * @param  string $metric Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. You can use the aggregations &#x60;count&#x60;, &#x60;rate&#x60;, and &#x60;total&#x60; with the &#x60;play&#x60; metric. - &#x60;start&#x60; is the number of times playback was started. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;impression-time&#x60; is the time in milliseconds that your content was loading for until the first video frame is displayed. You can use the aggregations &#x60;average&#x60; and &#x60;sum&#x60; with this metric. - &#x60;watch-time&#x60; is the cumulative time in seconds that the user has spent watching your content. You can use the aggregations &#x60;average&#x60; and &#x60;sum&#x60; with this metric. (required)
     * @param  string $aggregation Use this path parameter to define a way of collecting data for the metric that you want analytics for.  - &#x60;count&#x60; returns the overall number of events for the &#x60;play&#x60; metric. - &#x60;rate&#x60; returns the ratio that calculates the number of plays your content receives divided by its impressions. This aggregation can be used only with the &#x60;play&#x60; metric. - &#x60;total&#x60; calculates the total number of events for the &#x60;play&#x60; metric.  - &#x60;average&#x60; calculates an average value for the selected metric. - &#x60;sum&#x60; adds up the total value of the select metric. (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponse|\ApiVideo\Client\Model\AnalyticsPlays400Error|\ApiVideo\Client\Model\UnrecognizedRequestUrl|\ApiVideo\Client\Model\TooManyRequests
     */
    public function getAggregatedMetrics(string $metric, string $aggregation, array $queryParams = []): \ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponse
    {
        $request = $this->buildGetAggregatedMetricsRequest($metric, $aggregation, $queryParams);

        $model = new \ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getAggregatedMetrics'
     *
     * @param  string $metric Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. You can use the aggregations &#x60;count&#x60;, &#x60;rate&#x60;, and &#x60;total&#x60; with the &#x60;play&#x60; metric. - &#x60;start&#x60; is the number of times playback was started. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. You can use the aggregation &#x60;count&#x60; with this metric. - &#x60;impression-time&#x60; is the time in milliseconds that your content was loading for until the first video frame is displayed. You can use the aggregations &#x60;average&#x60; and &#x60;sum&#x60; with this metric. - &#x60;watch-time&#x60; is the cumulative time in seconds that the user has spent watching your content. You can use the aggregations &#x60;average&#x60; and &#x60;sum&#x60; with this metric. (required)
     * @param  string $aggregation Use this path parameter to define a way of collecting data for the metric that you want analytics for.  - &#x60;count&#x60; returns the overall number of events for the &#x60;play&#x60; metric. - &#x60;rate&#x60; returns the ratio that calculates the number of plays your content receives divided by its impressions. This aggregation can be used only with the &#x60;play&#x60; metric. - &#x60;total&#x60; calculates the total number of events for the &#x60;play&#x60; metric.  - &#x60;average&#x60; calculates an average value for the selected metric. - &#x60;sum&#x60; adds up the total value of the select metric. (required)
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetAggregatedMetricsRequest(string $metric, string $aggregation, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $from = array_key_exists('from', $queryParams) ? $queryParams['from'] : null;
        $to = array_key_exists('to', $queryParams) ? $queryParams['to'] : null;
        $filterBy = array_key_exists('filterBy', $queryParams) ? $queryParams['filterBy'] : null;

        // verify the required parameter 'metric' is set
        if ($metric === null || (is_array($metric) && count($metric) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $metric when calling '
            );
        }
        // verify the required parameter 'aggregation' is set
        if ($aggregation === null || (is_array($aggregation) && count($aggregation) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $aggregation when calling '
            );
        }

        $resourcePath = '/data/metrics/{metric}/{aggregation}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // from query params
        if (is_array($from)) {
            $from = ObjectSerializer::serializeCollection($from, 'form', true);
        }
        if ($from !== null) {
            $queryParams['from'] = $from;
        }

        // to query params
        if (is_array($to)) {
            $to = ObjectSerializer::serializeCollection($to, 'form', true);
        }
        if ($to !== null) {
            $queryParams['to'] = $to;
        }

        // filterBy query params
        if ($filterBy !== null) {
            if(is_array($filterBy)) {
                $queryParams["filterBy"] = array();
                foreach($filterBy as $key => $value) {
                    $queryParams['filterBy'][$key] = $value;
                }
            }
            else {
                throw new \InvalidArgumentException('invalid value for "$filterBy" when calling AnalyticsApi.GetAggregatedMetrics, must be an array.');
            }
        }

        // path params
        if ($metric !== null) {
            $resourcePath = str_replace(
                '{' . 'metric' . '}',
                ObjectSerializer::toPathValue($metric),
                $resourcePath
            );
        }
        // path params
        if ($aggregation !== null) {
            $resourcePath = str_replace(
                '{' . 'aggregation' . '}',
                ObjectSerializer::toPathValue($aggregation),
                $resourcePath
            );
        }



        $query = \http_build_query($queryParams);

        return new Request(
            'GET',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Retrieve metrics in a breakdown of dimensions
     *
     * @param  string $metric Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. - &#x60;play-rate&#x60; is the ratio that calculates the number of plays your content receives divided by its impressions. - &#x60;play-total&#x60; is the total number of times a specific content has been played. You can only use the &#x60;media-id&#x60; breakdown with this metric. - &#x60;start&#x60; is the number of times playback was started. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. (required)
     * @param  string $breakdown Use this path parameter to define a dimension for segmenting analytics data. You must use &#x60;kebab-case&#x60; for path parameters.  These are the available dimensions:  - &#x60;media-id&#x60;: Returns analytics based on the unique identifiers of a video or a live stream. - &#x60;media-type&#x60;: Returns analytics based on the type of content. Possible values: &#x60;video&#x60; and &#x60;live-stream&#x60;.  - &#x60;continent&#x60;: Returns analytics based on the viewers&#39; continent. The list of supported continents names are based on the [GeoNames public database](https://www.geonames.org/countries/). Possible values are: &#x60;AS&#x60;, &#x60;AF&#x60;, &#x60;NA&#x60;, &#x60;SA&#x60;, &#x60;AN&#x60;, &#x60;EU&#x60;, &#x60;AZ&#x60;.  - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). - &#x60;device-type&#x60;: Returns analytics based on the type of device used by the viewers. Response values can include: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operating-system&#x60;: Returns analytics based on the operating system used by the viewers. Response values can include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers. Response values can include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\AnalyticsMetricsBreakdownResponse|\ApiVideo\Client\Model\AnalyticsPlays400Error|\ApiVideo\Client\Model\UnrecognizedRequestUrl|\ApiVideo\Client\Model\TooManyRequests
     */
    public function getMetricsBreakdown(string $metric, string $breakdown, array $queryParams = []): \ApiVideo\Client\Model\AnalyticsMetricsBreakdownResponse
    {
        $request = $this->buildGetMetricsBreakdownRequest($metric, $breakdown, $queryParams);

        $model = new \ApiVideo\Client\Model\AnalyticsMetricsBreakdownResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getMetricsBreakdown'
     *
     * @param  string $metric Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. - &#x60;play-rate&#x60; is the ratio that calculates the number of plays your content receives divided by its impressions. - &#x60;play-total&#x60; is the total number of times a specific content has been played. You can only use the &#x60;media-id&#x60; breakdown with this metric. - &#x60;start&#x60; is the number of times playback was started. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. (required)
     * @param  string $breakdown Use this path parameter to define a dimension for segmenting analytics data. You must use &#x60;kebab-case&#x60; for path parameters.  These are the available dimensions:  - &#x60;media-id&#x60;: Returns analytics based on the unique identifiers of a video or a live stream. - &#x60;media-type&#x60;: Returns analytics based on the type of content. Possible values: &#x60;video&#x60; and &#x60;live-stream&#x60;.  - &#x60;continent&#x60;: Returns analytics based on the viewers&#39; continent. The list of supported continents names are based on the [GeoNames public database](https://www.geonames.org/countries/). Possible values are: &#x60;AS&#x60;, &#x60;AF&#x60;, &#x60;NA&#x60;, &#x60;SA&#x60;, &#x60;AN&#x60;, &#x60;EU&#x60;, &#x60;AZ&#x60;.  - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). - &#x60;device-type&#x60;: Returns analytics based on the type of device used by the viewers. Response values can include: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operating-system&#x60;: Returns analytics based on the operating system used by the viewers. Response values can include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers. Response values can include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. (required)
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetMetricsBreakdownRequest(string $metric, string $breakdown, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $from = array_key_exists('from', $queryParams) ? $queryParams['from'] : null;
        $to = array_key_exists('to', $queryParams) ? $queryParams['to'] : null;
        $filterBy = array_key_exists('filterBy', $queryParams) ? $queryParams['filterBy'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'metric' is set
        if ($metric === null || (is_array($metric) && count($metric) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $metric when calling '
            );
        }
        // verify the required parameter 'breakdown' is set
        if ($breakdown === null || (is_array($breakdown) && count($breakdown) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $breakdown when calling '
            );
        }

        $resourcePath = '/data/buckets/{metric}/{breakdown}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // from query params
        if (is_array($from)) {
            $from = ObjectSerializer::serializeCollection($from, 'form', true);
        }
        if ($from !== null) {
            $queryParams['from'] = $from;
        }

        // to query params
        if (is_array($to)) {
            $to = ObjectSerializer::serializeCollection($to, 'form', true);
        }
        if ($to !== null) {
            $queryParams['to'] = $to;
        }

        // filterBy query params
        if ($filterBy !== null) {
            if(is_array($filterBy)) {
                $queryParams["filterBy"] = array();
                foreach($filterBy as $key => $value) {
                    $queryParams['filterBy'][$key] = $value;
                }
            }
            else {
                throw new \InvalidArgumentException('invalid value for "$filterBy" when calling AnalyticsApi.GetMetricsBreakdown, must be an array.');
            }
        }

        // currentPage query params
        if ($currentPage !== null) {
            $queryParams['currentPage'] = $currentPage;
        }

        // pageSize query params
        if ($pageSize !== null) {
            $queryParams['pageSize'] = $pageSize;
        }

        // path params
        if ($metric !== null) {
            $resourcePath = str_replace(
                '{' . 'metric' . '}',
                ObjectSerializer::toPathValue($metric),
                $resourcePath
            );
        }
        // path params
        if ($breakdown !== null) {
            $resourcePath = str_replace(
                '{' . 'breakdown' . '}',
                ObjectSerializer::toPathValue($breakdown),
                $resourcePath
            );
        }



        $query = \http_build_query($queryParams);

        return new Request(
            'GET',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Retrieve metrics over time
     *
     * @param  string $metric Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. - &#x60;play-rate&#x60; is the ratio that calculates the number of plays your content receives divided by its impressions. - &#x60;start&#x60; is the number of times playback was started. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponse|\ApiVideo\Client\Model\AnalyticsPlays400Error|\ApiVideo\Client\Model\UnrecognizedRequestUrl|\ApiVideo\Client\Model\TooManyRequests
     */
    public function getMetricsOverTime(string $metric, array $queryParams = []): \ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponse
    {
        $request = $this->buildGetMetricsOverTimeRequest($metric, $queryParams);

        $model = new \ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getMetricsOverTime'
     *
     * @param  string $metric Use this path parameter to select a metric that you want analytics for.  - &#x60;play&#x60; is the number of times your content has been played. - &#x60;play-rate&#x60; is the ratio that calculates the number of plays your content receives divided by its impressions. - &#x60;start&#x60; is the number of times playback was started. - &#x60;end&#x60; is the number of times playback has ended with the content watch until the end. - &#x60;impression&#x60; is the number of times your content has been loaded and was ready for playback. (required)
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetMetricsOverTimeRequest(string $metric, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $from = array_key_exists('from', $queryParams) ? $queryParams['from'] : null;
        $to = array_key_exists('to', $queryParams) ? $queryParams['to'] : null;
        $interval = array_key_exists('interval', $queryParams) ? $queryParams['interval'] : null;
        $filterBy = array_key_exists('filterBy', $queryParams) ? $queryParams['filterBy'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'metric' is set
        if ($metric === null || (is_array($metric) && count($metric) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $metric when calling '
            );
        }

        $resourcePath = '/data/timeseries/{metric}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // from query params
        if (is_array($from)) {
            $from = ObjectSerializer::serializeCollection($from, 'form', true);
        }
        if ($from !== null) {
            $queryParams['from'] = $from;
        }

        // to query params
        if (is_array($to)) {
            $to = ObjectSerializer::serializeCollection($to, 'form', true);
        }
        if ($to !== null) {
            $queryParams['to'] = $to;
        }

        // interval query params
        if (is_array($interval)) {
            $interval = ObjectSerializer::serializeCollection($interval, 'form', true);
        }
        if ($interval !== null) {
            $queryParams['interval'] = $interval;
        }

        // filterBy query params
        if ($filterBy !== null) {
            if(is_array($filterBy)) {
                $queryParams["filterBy"] = array();
                foreach($filterBy as $key => $value) {
                    $queryParams['filterBy'][$key] = $value;
                }
            }
            else {
                throw new \InvalidArgumentException('invalid value for "$filterBy" when calling AnalyticsApi.GetMetricsOverTime, must be an array.');
            }
        }

        // currentPage query params
        if ($currentPage !== null) {
            $queryParams['currentPage'] = $currentPage;
        }

        // pageSize query params
        if ($pageSize !== null) {
            $queryParams['pageSize'] = $pageSize;
        }

        // path params
        if ($metric !== null) {
            $resourcePath = str_replace(
                '{' . 'metric' . '}',
                ObjectSerializer::toPathValue($metric),
                $resourcePath
            );
        }



        $query = \http_build_query($queryParams);

        return new Request(
            'GET',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


}
