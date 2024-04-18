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
     * Get play events for live stream
     *
     * @param  \DateTime $from Use this query parameter to set the start date for the time period that you want analytics for. - The API returns analytics data including the day you set in &#x60;from&#x60;. - The date you set must be **within the last 30 days**. - The value you provide must follow the &#x60;YYYY-MM-DD&#x60; format. (required)
     * @param  string $dimension Use this query parameter to define the dimension that you want analytics for. - &#x60;liveStreamId&#x60;: Returns analytics based on the public live stream identifiers. - &#x60;emittedAt&#x60;: Returns analytics based on the times of the play events. The API returns data in specific interval groups. When the date period you set in &#x60;from&#x60; and &#x60;to&#x60; is less than or equals to 2 days, the response for this dimension is grouped in hourly intervals. Otherwise, it is grouped in daily intervals. - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). - &#x60;deviceType&#x60;: Returns analytics based on the type of device used by the viewers during the play event. Possible response values are: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operatingSystem&#x60;: Returns analytics based on the operating system used by the viewers during the play event. Response values include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers during the play event. Response values include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\AnalyticsPlaysResponse|\ApiVideo\Client\Model\AnalyticsPlays400Error|\ApiVideo\Client\Model\Model403ErrorSchema|\ApiVideo\Client\Model\NotFound|\ApiVideo\Client\Model\TooManyRequests
     */
    public function getLiveStreamsPlays(\DateTime $from, string $dimension, array $queryParams = []): \ApiVideo\Client\Model\AnalyticsPlaysResponse
    {
        $request = $this->buildGetLiveStreamsPlaysRequest($from, $dimension, $queryParams);

        $model = new \ApiVideo\Client\Model\AnalyticsPlaysResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getLiveStreamsPlays'
     *
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetLiveStreamsPlaysRequest(\DateTime $from, string $dimension, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $to = array_key_exists('to', $queryParams) ? $queryParams['to'] : null;
        $filter = array_key_exists('filter', $queryParams) ? $queryParams['filter'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'from' is set
        if ($from === null || (is_array($from) && count($from) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $from when calling '
            );
        }
        // verify the required parameter 'dimension' is set
        if ($dimension === null || (is_array($dimension) && count($dimension) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dimension when calling '
            );
        }

        $resourcePath = '/analytics/live-streams/plays';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // from query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::sanitizeForSerialization($from, 'date');
        }

        // to query params
        if ($to !== null) {
            $queryParams['to'] = ObjectSerializer::sanitizeForSerialization($to, 'date');
        }

        // dimension query params
        if (is_array($dimension)) {
            $dimension = ObjectSerializer::serializeCollection($dimension, 'form', true);
        }
        if ($dimension !== null) {
            $queryParams['dimension'] = $dimension;
        }

        // filter query params
        if (is_array($filter)) {
            $filter = ObjectSerializer::serializeCollection($filter, 'form', true);
        }
        if ($filter !== null) {
            $queryParams['filter'] = $filter;
        }

        // currentPage query params
        if ($currentPage !== null) {
            $queryParams['currentPage'] = $currentPage;
        }

        // pageSize query params
        if ($pageSize !== null) {
            $queryParams['pageSize'] = $pageSize;
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
     * Get play events for video
     *
     * @param  \DateTime $from Use this query parameter to set the start date for the time period that you want analytics for. - The API returns analytics data including the day you set in &#x60;from&#x60;. - The date you set must be **within the last 30 days**. - The value you provide must follow the &#x60;YYYY-MM-DD&#x60; format. (required)
     * @param  string $dimension Use this query parameter to define the dimension that you want analytics for. - &#x60;videoId&#x60;: Returns analytics based on the public video identifiers. - &#x60;emittedAt&#x60;: Returns analytics based on the times of the play events. The API returns data in specific interval groups. When the date period you set in &#x60;from&#x60; and &#x60;to&#x60; is less than or equals to 2 days, the response for this dimension is grouped in hourly intervals. Otherwise, it is grouped in daily intervals. - &#x60;country&#x60;: Returns analytics based on the viewers&#39; country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). - &#x60;deviceType&#x60;: Returns analytics based on the type of device used by the viewers during the play event. Possible response values are: &#x60;computer&#x60;, &#x60;phone&#x60;, &#x60;tablet&#x60;, &#x60;tv&#x60;, &#x60;console&#x60;, &#x60;wearable&#x60;, &#x60;unknown&#x60;. - &#x60;operatingSystem&#x60;: Returns analytics based on the operating system used by the viewers during the play event. Response values include &#x60;windows&#x60;, &#x60;mac osx&#x60;, &#x60;android&#x60;, &#x60;ios&#x60;, &#x60;linux&#x60;. - &#x60;browser&#x60;: Returns analytics based on the browser used by the viewers during the play event. Response values include &#x60;chrome&#x60;, &#x60;firefox&#x60;, &#x60;edge&#x60;, &#x60;opera&#x60;. (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\AnalyticsPlaysResponse|\ApiVideo\Client\Model\AnalyticsPlays400Error|\ApiVideo\Client\Model\Model403ErrorSchema|\ApiVideo\Client\Model\NotFound|\ApiVideo\Client\Model\TooManyRequests
     */
    public function getVideosPlays(\DateTime $from, string $dimension, array $queryParams = []): \ApiVideo\Client\Model\AnalyticsPlaysResponse
    {
        $request = $this->buildGetVideosPlaysRequest($from, $dimension, $queryParams);

        $model = new \ApiVideo\Client\Model\AnalyticsPlaysResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getVideosPlays'
     *
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetVideosPlaysRequest(\DateTime $from, string $dimension, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $to = array_key_exists('to', $queryParams) ? $queryParams['to'] : null;
        $filter = array_key_exists('filter', $queryParams) ? $queryParams['filter'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'from' is set
        if ($from === null || (is_array($from) && count($from) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $from when calling '
            );
        }
        // verify the required parameter 'dimension' is set
        if ($dimension === null || (is_array($dimension) && count($dimension) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $dimension when calling '
            );
        }

        $resourcePath = '/analytics/videos/plays';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // from query params
        if ($from !== null) {
            $queryParams['from'] = ObjectSerializer::sanitizeForSerialization($from, 'date');
        }

        // to query params
        if ($to !== null) {
            $queryParams['to'] = ObjectSerializer::sanitizeForSerialization($to, 'date');
        }

        // dimension query params
        if (is_array($dimension)) {
            $dimension = ObjectSerializer::serializeCollection($dimension, 'form', true);
        }
        if ($dimension !== null) {
            $queryParams['dimension'] = $dimension;
        }

        // filter query params
        if (is_array($filter)) {
            $filter = ObjectSerializer::serializeCollection($filter, 'form', true);
        }
        if ($filter !== null) {
            $queryParams['filter'] = $filter;
        }

        // currentPage query params
        if ($currentPage !== null) {
            $queryParams['currentPage'] = $currentPage;
        }

        // pageSize query params
        if ($pageSize !== null) {
            $queryParams['pageSize'] = $pageSize;
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
