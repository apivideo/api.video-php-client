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
class SummariesApi implements ApiInterface
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
     * Generate video summary
     *
     * @param  \ApiVideo\Client\Model\SummaryCreationPayload $summaryCreationPayload summaryCreationPayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Summary|\ApiVideo\Client\Model\ConflictError
     */
    public function create(\ApiVideo\Client\Model\SummaryCreationPayload $summaryCreationPayload): \ApiVideo\Client\Model\Summary
    {
        $request = $this->buildCreateRequest($summaryCreationPayload);

        $model = new \ApiVideo\Client\Model\Summary($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'create'
     *
     * @param  \ApiVideo\Client\Model\SummaryCreationPayload $summaryCreationPayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildCreateRequest(\ApiVideo\Client\Model\SummaryCreationPayload $summaryCreationPayload): Request
    {
        // verify the required parameter 'summaryCreationPayload' is set
        if ($summaryCreationPayload === null || (is_array($summaryCreationPayload) && count($summaryCreationPayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $summaryCreationPayload when calling '
            );
        }

        $resourcePath = '/summaries';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;


        if ($summaryCreationPayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($summaryCreationPayload));
        }


        $query = \http_build_query($queryParams);

        return new Request(
            'POST',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Update summary details
     *
     * @param  string $summaryId The unique identifier of the summary source you want to update. (required)
     * @param  \ApiVideo\Client\Model\SummaryUpdatePayload $summaryUpdatePayload summaryUpdatePayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\SummarySource|\ApiVideo\Client\Model\ConflictError
     */
    public function update(string $summaryId, \ApiVideo\Client\Model\SummaryUpdatePayload $summaryUpdatePayload): \ApiVideo\Client\Model\SummarySource
    {
        $request = $this->buildUpdateRequest($summaryId, $summaryUpdatePayload);

        $model = new \ApiVideo\Client\Model\SummarySource($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'update'
     *
     * @param  string $summaryId The unique identifier of the summary source you want to update. (required)
     * @param  \ApiVideo\Client\Model\SummaryUpdatePayload $summaryUpdatePayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUpdateRequest(string $summaryId, \ApiVideo\Client\Model\SummaryUpdatePayload $summaryUpdatePayload): Request
    {
        // verify the required parameter 'summaryId' is set
        if ($summaryId === null || (is_array($summaryId) && count($summaryId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $summaryId when calling '
            );
        }
        // verify the required parameter 'summaryUpdatePayload' is set
        if ($summaryUpdatePayload === null || (is_array($summaryUpdatePayload) && count($summaryUpdatePayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $summaryUpdatePayload when calling '
            );
        }

        $resourcePath = '/summaries/{summaryId}/source';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($summaryId !== null) {
            $resourcePath = str_replace(
                '{' . 'summaryId' . '}',
                ObjectSerializer::toPathValue($summaryId),
                $resourcePath
            );
        }

        if ($summaryUpdatePayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($summaryUpdatePayload));
        }


        $query = \http_build_query($queryParams);

        return new Request(
            'PATCH',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Delete video summary
     *
     * @param  string $summaryId The unique identifier of the summary you want to delete. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete(string $summaryId): void
    {
        $request = $this->buildDeleteRequest($summaryId);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  string $summaryId The unique identifier of the summary you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteRequest(string $summaryId): Request
    {
        // verify the required parameter 'summaryId' is set
        if ($summaryId === null || (is_array($summaryId) && count($summaryId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $summaryId when calling '
            );
        }

        $resourcePath = '/summaries/{summaryId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($summaryId !== null) {
            $resourcePath = str_replace(
                '{' . 'summaryId' . '}',
                ObjectSerializer::toPathValue($summaryId),
                $resourcePath
            );
        }



        $query = \http_build_query($queryParams);

        return new Request(
            'DELETE',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * List summaries
     *
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\SummariesListResponse
     */
    public function list(array $queryParams = []): \ApiVideo\Client\Model\SummariesListResponse
    {
        $request = $this->buildListRequest($queryParams);

        $model = new \ApiVideo\Client\Model\SummariesListResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'list'
     *
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildListRequest(array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $videoId = array_key_exists('videoId', $queryParams) ? $queryParams['videoId'] : null;
        $origin = array_key_exists('origin', $queryParams) ? $queryParams['origin'] : null;
        $sourceStatus = array_key_exists('sourceStatus', $queryParams) ? $queryParams['sourceStatus'] : null;
        $sortBy = array_key_exists('sortBy', $queryParams) ? $queryParams['sortBy'] : null;
        $sortOrder = array_key_exists('sortOrder', $queryParams) ? $queryParams['sortOrder'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;


        $resourcePath = '/summaries';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // videoId query params
        if ($videoId !== null) {
            $queryParams['videoId'] = $videoId;
        }

        // origin query params
        if ($origin !== null) {
            $queryParams['origin'] = $origin;
        }

        // sourceStatus query params
        if ($sourceStatus !== null) {
            $queryParams['sourceStatus'] = $sourceStatus;
        }

        // sortBy query params
        if ($sortBy !== null) {
            $queryParams['sortBy'] = $sortBy;
        }

        // sortOrder query params
        if ($sortOrder !== null) {
            $queryParams['sortOrder'] = $sortOrder;
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
     * Get summary details
     *
     * @param  string $summaryId The unique identifier of the summary source you want to retrieve. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\SummarySource|\ApiVideo\Client\Model\NotFound
     */
    public function getSummarySource(string $summaryId): \ApiVideo\Client\Model\SummarySource
    {
        $request = $this->buildGetSummarySourceRequest($summaryId);

        $model = new \ApiVideo\Client\Model\SummarySource($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getSummarySource'
     *
     * @param  string $summaryId The unique identifier of the summary source you want to retrieve. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetSummarySourceRequest(string $summaryId): Request
    {
        // verify the required parameter 'summaryId' is set
        if ($summaryId === null || (is_array($summaryId) && count($summaryId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $summaryId when calling '
            );
        }

        $resourcePath = '/summaries/{summaryId}/source';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($summaryId !== null) {
            $resourcePath = str_replace(
                '{' . 'summaryId' . '}',
                ObjectSerializer::toPathValue($summaryId),
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
