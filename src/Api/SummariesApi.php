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
     * @param  \ApiVideo\Client\Model\InlineObject $inlineObject inlineObject (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\SummaryObject|\ApiVideo\Client\Model\ConflictError
     */
    public function create(\ApiVideo\Client\Model\InlineObject $inlineObject): \ApiVideo\Client\Model\SummaryObject
    {
        $request = $this->buildCreateRequest($inlineObject);

        $model = new \ApiVideo\Client\Model\SummaryObject($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'create'
     *
     * @param  \ApiVideo\Client\Model\InlineObject $inlineObject (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildCreateRequest(\ApiVideo\Client\Model\InlineObject $inlineObject): Request
    {
        // verify the required parameter 'inlineObject' is set
        if ($inlineObject === null || (is_array($inlineObject) && count($inlineObject) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $inlineObject when calling '
            );
        }

        $resourcePath = '/summaries';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;


        if ($inlineObject) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($inlineObject));
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
     * Get summary details
     *
     * @param  string $summaryId The unique identifier of the summary source you want to retrieve. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\SummarySource|\ApiVideo\Client\Model\NotFound
     */
    public function get(string $summaryId): \ApiVideo\Client\Model\SummarySource
    {
        $request = $this->buildGetRequest($summaryId);

        $model = new \ApiVideo\Client\Model\SummarySource($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'get'
     *
     * @param  string $summaryId The unique identifier of the summary source you want to retrieve. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetRequest(string $summaryId): Request
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


    /**
     * Update summary details
     *
     * @param  string $summaryId The unique identifier of the summary source you want to update. (required)
     * @param  \ApiVideo\Client\Model\UpdateSummaryRequest $updateSummaryRequest updateSummaryRequest (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\SummarySource|\ApiVideo\Client\Model\ConflictError
     */
    public function update(string $summaryId, \ApiVideo\Client\Model\UpdateSummaryRequest $updateSummaryRequest): \ApiVideo\Client\Model\SummarySource
    {
        $request = $this->buildUpdateRequest($summaryId, $updateSummaryRequest);

        $model = new \ApiVideo\Client\Model\SummarySource($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'update'
     *
     * @param  string $summaryId The unique identifier of the summary source you want to update. (required)
     * @param  \ApiVideo\Client\Model\UpdateSummaryRequest $updateSummaryRequest (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUpdateRequest(string $summaryId, \ApiVideo\Client\Model\UpdateSummaryRequest $updateSummaryRequest): Request
    {
        // verify the required parameter 'summaryId' is set
        if ($summaryId === null || (is_array($summaryId) && count($summaryId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $summaryId when calling '
            );
        }
        // verify the required parameter 'updateSummaryRequest' is set
        if ($updateSummaryRequest === null || (is_array($updateSummaryRequest) && count($updateSummaryRequest) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $updateSummaryRequest when calling '
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

        if ($updateSummaryRequest) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($updateSummaryRequest));
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
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\GetSummaries
     */
    public function list(): \ApiVideo\Client\Model\GetSummaries
    {
        $request = $this->buildListRequest();

        $model = new \ApiVideo\Client\Model\GetSummaries($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'list'
     *
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildListRequest(): Request
    {

        $resourcePath = '/summaries';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;




        $query = \http_build_query($queryParams);

        return new Request(
            'GET',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


}
