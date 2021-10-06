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
class LiveStreamsApi implements ApiInterface
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
     * Delete a live stream
     *
     * @param  string $liveStreamId The unique ID for the live stream that you want to remove. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete(string $liveStreamId): void
    {
        $request = $this->buildDeleteRequest($liveStreamId);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  string $liveStreamId The unique ID for the live stream that you want to remove. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteRequest(string $liveStreamId): Request
    {
        // verify the required parameter 'liveStreamId' is set
        if ($liveStreamId === null || (is_array($liveStreamId) && count($liveStreamId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamId when calling '
            );
        }

        $resourcePath = '/live-streams/{liveStreamId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

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
            'DELETE',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Delete a thumbnail
     *
     * @param  string $liveStreamId The unique identifier for the live stream you want to delete. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\LiveStream|\ApiVideo\Client\Model\NotFound
     */
    public function deleteThumbnail(string $liveStreamId): \ApiVideo\Client\Model\LiveStream
    {
        $request = $this->buildDeleteThumbnailRequest($liveStreamId);

        $model = new \ApiVideo\Client\Model\LiveStream($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'deleteThumbnail'
     *
     * @param  string $liveStreamId The unique identifier for the live stream you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteThumbnailRequest(string $liveStreamId): Request
    {
        // verify the required parameter 'liveStreamId' is set
        if ($liveStreamId === null || (is_array($liveStreamId) && count($liveStreamId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamId when calling '
            );
        }

        $resourcePath = '/live-streams/{liveStreamId}/thumbnail';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

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
            'DELETE',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * List all live streams
     *
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\LiveStreamListResponse
     */
    public function list(array $queryParams = []): \ApiVideo\Client\Model\LiveStreamListResponse
    {
        $request = $this->buildListRequest($queryParams);

        $model = new \ApiVideo\Client\Model\LiveStreamListResponse($this->client->request($request));

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
        $streamKey = array_key_exists('streamKey', $queryParams) ? $queryParams['streamKey'] : null;
        $name = array_key_exists('name', $queryParams) ? $queryParams['name'] : null;
        $sortBy = array_key_exists('sortBy', $queryParams) ? $queryParams['sortBy'] : null;
        $sortOrder = array_key_exists('sortOrder', $queryParams) ? $queryParams['sortOrder'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;


        $resourcePath = '/live-streams';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // streamKey query params
        if ($streamKey !== null) {
            $queryParams['streamKey'] = $streamKey;
        }

        // name query params
        if ($name !== null) {
            $queryParams['name'] = $name;
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
     * Show live stream
     *
     * @param  string $liveStreamId The unique ID for the live stream you want to watch. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\LiveStream
     */
    public function get(string $liveStreamId): \ApiVideo\Client\Model\LiveStream
    {
        $request = $this->buildGetRequest($liveStreamId);

        $model = new \ApiVideo\Client\Model\LiveStream($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'get'
     *
     * @param  string $liveStreamId The unique ID for the live stream you want to watch. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetRequest(string $liveStreamId): Request
    {
        // verify the required parameter 'liveStreamId' is set
        if ($liveStreamId === null || (is_array($liveStreamId) && count($liveStreamId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamId when calling '
            );
        }

        $resourcePath = '/live-streams/{liveStreamId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

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
     * Update a live stream
     *
     * @param  string $liveStreamId The unique ID for the live stream that you want to update information for such as player details, or whether you want the recording on or off. (required)
     * @param  \ApiVideo\Client\Model\LiveStreamUpdatePayload $liveStreamUpdatePayload liveStreamUpdatePayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\LiveStream|\ApiVideo\Client\Model\BadRequest
     */
    public function update(string $liveStreamId, \ApiVideo\Client\Model\LiveStreamUpdatePayload $liveStreamUpdatePayload): \ApiVideo\Client\Model\LiveStream
    {
        $request = $this->buildUpdateRequest($liveStreamId, $liveStreamUpdatePayload);

        $model = new \ApiVideo\Client\Model\LiveStream($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'update'
     *
     * @param  string $liveStreamId The unique ID for the live stream that you want to update information for such as player details, or whether you want the recording on or off. (required)
     * @param  \ApiVideo\Client\Model\LiveStreamUpdatePayload $liveStreamUpdatePayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUpdateRequest(string $liveStreamId, \ApiVideo\Client\Model\LiveStreamUpdatePayload $liveStreamUpdatePayload): Request
    {
        // verify the required parameter 'liveStreamId' is set
        if ($liveStreamId === null || (is_array($liveStreamId) && count($liveStreamId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamId when calling '
            );
        }
        // verify the required parameter 'liveStreamUpdatePayload' is set
        if ($liveStreamUpdatePayload === null || (is_array($liveStreamUpdatePayload) && count($liveStreamUpdatePayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamUpdatePayload when calling '
            );
        }

        $resourcePath = '/live-streams/{liveStreamId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($liveStreamId !== null) {
            $resourcePath = str_replace(
                '{' . 'liveStreamId' . '}',
                ObjectSerializer::toPathValue($liveStreamId),
                $resourcePath
            );
        }

        if ($liveStreamUpdatePayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($liveStreamUpdatePayload));
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
     * Create live stream
     *
     * @param  \ApiVideo\Client\Model\LiveStreamCreationPayload $liveStreamCreationPayload liveStreamCreationPayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\LiveStream|\ApiVideo\Client\Model\BadRequest
     */
    public function create(\ApiVideo\Client\Model\LiveStreamCreationPayload $liveStreamCreationPayload): \ApiVideo\Client\Model\LiveStream
    {
        $request = $this->buildCreateRequest($liveStreamCreationPayload);

        $model = new \ApiVideo\Client\Model\LiveStream($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'create'
     *
     * @param  \ApiVideo\Client\Model\LiveStreamCreationPayload $liveStreamCreationPayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildCreateRequest(\ApiVideo\Client\Model\LiveStreamCreationPayload $liveStreamCreationPayload): Request
    {
        // verify the required parameter 'liveStreamCreationPayload' is set
        if ($liveStreamCreationPayload === null || (is_array($liveStreamCreationPayload) && count($liveStreamCreationPayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamCreationPayload when calling '
            );
        }

        $resourcePath = '/live-streams';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;


        if ($liveStreamCreationPayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($liveStreamCreationPayload));
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
     * Upload a thumbnail
     *
     * @param  string $liveStreamId The unique ID for the live stream you want to upload. (required)
     * @param  \SplFileObject $file The image to be added as a thumbnail. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\LiveStream|\ApiVideo\Client\Model\BadRequest|\ApiVideo\Client\Model\NotFound
     */
    public function uploadThumbnail(string $liveStreamId, \SplFileObject $file): \ApiVideo\Client\Model\LiveStream
    {
        $request = $this->buildUploadThumbnailRequest($liveStreamId, $file);

        $model = new \ApiVideo\Client\Model\LiveStream($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'uploadThumbnail'
     *
     * @param  string $liveStreamId The unique ID for the live stream you want to upload. (required)
     * @param  \SplFileObject $file The image to be added as a thumbnail. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUploadThumbnailRequest(string $liveStreamId, \SplFileObject $file): Request
    {
        // verify the required parameter 'liveStreamId' is set
        if ($liveStreamId === null || (is_array($liveStreamId) && count($liveStreamId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $liveStreamId when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }

        $resourcePath = '/live-streams/{liveStreamId}/thumbnail';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($liveStreamId !== null) {
            $resourcePath = str_replace(
                '{' . 'liveStreamId' . '}',
                ObjectSerializer::toPathValue($liveStreamId),
                $resourcePath
            );
        }


        // form params
        if ($file !== null) {
            $builder = new MultipartStreamBuilder($this->client->getStreamFactory());
            $builder->addResource('file', $file->fread($file->getSize()), [
                'filename' => basename($file->getRealPath()),
                'headers' => ['Content-Type' => 'application/octet-stream']]
            );
            $request = new Request(
                'POST',
                $resourcePath,
                [
                    'Accept' => 'application/json',
                    'Content-Type' => 'multipart/form-data; boundary="'.$builder->getBoundary().'"',
                ]
            );
            $request->setStream($builder->build());

            return $request;
        }

        $query = \http_build_query($queryParams);

        return new Request(
            'POST',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

}
