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
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse|\ApiVideo\Client\Model\NotFound
     */
    public function listLiveStreamSessions(string $liveStreamId, array $queryParams = []): \ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse
    {
        $request = $this->buildListLiveStreamSessionsRequest($liveStreamId, $queryParams);

        $model = new \ApiVideo\Client\Model\RawStatisticsListLiveStreamAnalyticsResponse($this->client->request($request));
        ModelPreprocessor::execute($model);

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
    private function buildListLiveStreamSessionsRequest(string $liveStreamId, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $period = array_key_exists('period', $queryParams) ? $queryParams['period'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'liveStreamId' is set
        if ($liveStreamId === null || (is_array($liveStreamId) && count($liveStreamId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamId when calling '
            );
        }

        $resourcePath = '/analytics/live-streams/{liveStreamId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($period !== null) {
            if('form' === 'form' && is_array($period)) {
                foreach($period as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['period'] = $period;
            }
        }
        // query params
        if ($currentPage !== null) {
            if('form' === 'form' && is_array($currentPage)) {
                foreach($currentPage as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['currentPage'] = $currentPage;
            }
        }
        // query params
        if ($pageSize !== null) {
            if('form' === 'form' && is_array($pageSize)) {
                foreach($pageSize as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['pageSize'] = $pageSize;
            }
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
        ModelPreprocessor::execute($model);

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

        // query params
        if ($currentPage !== null) {
            if('form' === 'form' && is_array($currentPage)) {
                foreach($currentPage as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['currentPage'] = $currentPage;
            }
        }
        // query params
        if ($pageSize !== null) {
            if('form' === 'form' && is_array($pageSize)) {
                foreach($pageSize as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['pageSize'] = $pageSize;
            }
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
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\RawStatisticsListSessionsResponse|\ApiVideo\Client\Model\NotFound
     */
    public function listVideoSessions(string $videoId, array $queryParams = []): \ApiVideo\Client\Model\RawStatisticsListSessionsResponse
    {
        $request = $this->buildListVideoSessionsRequest($videoId, $queryParams);

        $model = new \ApiVideo\Client\Model\RawStatisticsListSessionsResponse($this->client->request($request));
        ModelPreprocessor::execute($model);

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
    private function buildListVideoSessionsRequest(string $videoId, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $period = array_key_exists('period', $queryParams) ? $queryParams['period'] : null;
        $metadata = array_key_exists('metadata', $queryParams) ? $queryParams['metadata'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }

        $resourcePath = '/analytics/videos/{videoId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // query params
        if ($period !== null) {
            if('form' === 'form' && is_array($period)) {
                foreach($period as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['period'] = $period;
            }
        }
        // query params
        if ($metadata !== null) {
            if('form' === 'form' && is_array($metadata)) {
                foreach($metadata as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['metadata'] = $metadata;
            }
        }
        // query params
        if ($currentPage !== null) {
            if('form' === 'form' && is_array($currentPage)) {
                foreach($currentPage as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['currentPage'] = $currentPage;
            }
        }
        // query params
        if ($pageSize !== null) {
            if('form' === 'form' && is_array($pageSize)) {
                foreach($pageSize as $key => $value) {
                    $queryParams[$key] = $value;
                }
            }
            else {
                $queryParams['pageSize'] = $pageSize;
            }
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
