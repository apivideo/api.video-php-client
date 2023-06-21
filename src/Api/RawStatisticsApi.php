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
class RawStatisticsApi implements ApiInterface
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
     * List live stream player sessions
     *
     * @param  string $liveStreamId The unique identifier for the live stream you want to retrieve analytics for. (required)
     * @param  string $period Period must have one of the following formats:  - For a day : \&quot;2018-01-01\&quot;, - For a week: \&quot;2018-W01\&quot;,  - For a month: \&quot;2018-01\&quot; - For a year: \&quot;2018\&quot; For a range period:  -  Date range: \&quot;2018-01-01/2018-01-15\&quot; (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse|\ApiVideo\Client\Model\NotFound
     */
    public function listLiveStreamSessions(string $liveStreamId, string $period, array $queryParams = []): \ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse
    {
        $request = $this->buildListLiveStreamSessionsRequest($liveStreamId, $period, $queryParams);

        $model = new \ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'listLiveStreamSessions'
     *
     * @param  string $liveStreamId The unique identifier for the live stream you want to retrieve analytics for. (required)
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildListLiveStreamSessionsRequest(string $liveStreamId, string $period, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'liveStreamId' is set
        if ($liveStreamId === null || (is_array($liveStreamId) && count($liveStreamId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamId when calling '
            );
        }
        // verify the required parameter 'period' is set
        if ($period === null || (is_array($period) && count($period) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $period when calling '
            );
        }

        $resourcePath = '/analytics/live-streams/{liveStreamId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // period query params
        if ($period !== null) {
            $queryParams['period'] = $period;
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
        if ($liveStreamId !== null) {
            $resourcePath = str_replace(
                '{' . 'liveStreamId' . '}',
                ObjectSerializer::toPathValue($liveStreamId),
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
     * List player session events
     *
     * @param  string $sessionId A unique identifier you can use to reference and track a session with. (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\RawStatisticsListPlayerSessionEventsResponse|\ApiVideo\Client\Model\NotFound
     */
    public function listSessionEvents(string $sessionId, array $queryParams = []): \ApiVideo\Client\Model\RawStatisticsListPlayerSessionEventsResponse
    {
        $request = $this->buildListSessionEventsRequest($sessionId, $queryParams);

        $model = new \ApiVideo\Client\Model\RawStatisticsListPlayerSessionEventsResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'listSessionEvents'
     *
     * @param  string $sessionId A unique identifier you can use to reference and track a session with. (required)
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildListSessionEventsRequest(string $sessionId, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'sessionId' is set
        if ($sessionId === null || (is_array($sessionId) && count($sessionId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $sessionId when calling '
            );
        }

        $resourcePath = '/analytics/sessions/{sessionId}/events';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // currentPage query params
        if ($currentPage !== null) {
            $queryParams['currentPage'] = $currentPage;
        }

        // pageSize query params
        if ($pageSize !== null) {
            $queryParams['pageSize'] = $pageSize;
        }

        // path params
        if ($sessionId !== null) {
            $resourcePath = str_replace(
                '{' . 'sessionId' . '}',
                ObjectSerializer::toPathValue($sessionId),
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
     * List video player sessions
     *
     * @param  string $videoId The unique identifier for the video you want to retrieve session information for. (required)
     * @param  string $period Period must have one of the following formats:  - For a day : 2018-01-01, - For a week: 2018-W01,  - For a month: 2018-01 - For a year: 2018 For a range period:  -  Date range: 2018-01-01/2018-01-15 (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\RawStatisticsListSessionsResponse|\ApiVideo\Client\Model\NotFound
     */
    public function listVideoSessions(string $videoId, string $period, array $queryParams = []): \ApiVideo\Client\Model\RawStatisticsListSessionsResponse
    {
        $request = $this->buildListVideoSessionsRequest($videoId, $period, $queryParams);

        $model = new \ApiVideo\Client\Model\RawStatisticsListSessionsResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'listVideoSessions'
     *
     * @param  string $videoId The unique identifier for the video you want to retrieve session information for. (required)
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildListVideoSessionsRequest(string $videoId, string $period, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $metadata = array_key_exists('metadata', $queryParams) ? $queryParams['metadata'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'period' is set
        if ($period === null || (is_array($period) && count($period) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $period when calling '
            );
        }

        $resourcePath = '/analytics/videos/{videoId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // period query params
        if ($period !== null) {
            $queryParams['period'] = $period;
        }

        // metadata query params
        if ($metadata !== null) {
            if(is_array($metadata)) {
                $queryParams["metadata"] = array();
                foreach($metadata as $key => $value) {
                    $queryParams['metadata'][$key] = $value;
                }
            }
            else {
                throw new \InvalidArgumentException('invalid value for "$metadata" when calling RawStatisticsApi.ListVideoSessions, must be an array.');
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
        if ($videoId !== null) {
            $resourcePath = str_replace(
                '{' . 'videoId' . '}',
                ObjectSerializer::toPathValue($videoId),
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
