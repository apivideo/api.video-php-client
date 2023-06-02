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
class UploadTokensApi implements ApiInterface
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
     * Generate an upload token
     *
     * @param  \ApiVideo\Client\Model\TokenCreationPayload $tokenCreationPayload tokenCreationPayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\UploadToken|\ApiVideo\Client\Model\BadRequest
     */
    public function createToken(\ApiVideo\Client\Model\TokenCreationPayload $tokenCreationPayload): \ApiVideo\Client\Model\UploadToken
    {
        $request = $this->buildCreateTokenRequest($tokenCreationPayload);

        $model = new \ApiVideo\Client\Model\UploadToken($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'createToken'
     *
     * @param  \ApiVideo\Client\Model\TokenCreationPayload $tokenCreationPayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildCreateTokenRequest(\ApiVideo\Client\Model\TokenCreationPayload $tokenCreationPayload): Request
    {
        // verify the required parameter 'tokenCreationPayload' is set
        if ($tokenCreationPayload === null || (is_array($tokenCreationPayload) && count($tokenCreationPayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $tokenCreationPayload when calling '
            );
        }

        $resourcePath = '/upload-tokens';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;


        if ($tokenCreationPayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($tokenCreationPayload));
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
     * Retrieve upload token
     *
     * @param  string $uploadToken The unique identifier for the token you want information about. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\UploadToken|\ApiVideo\Client\Model\NotFound
     */
    public function getToken(string $uploadToken): \ApiVideo\Client\Model\UploadToken
    {
        $request = $this->buildGetTokenRequest($uploadToken);

        $model = new \ApiVideo\Client\Model\UploadToken($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getToken'
     *
     * @param  string $uploadToken The unique identifier for the token you want information about. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetTokenRequest(string $uploadToken): Request
    {
        // verify the required parameter 'uploadToken' is set
        if ($uploadToken === null || (is_array($uploadToken) && count($uploadToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $uploadToken when calling '
            );
        }

        $resourcePath = '/upload-tokens/{uploadToken}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($uploadToken !== null) {
            $resourcePath = str_replace(
                '{' . 'uploadToken' . '}',
                ObjectSerializer::toPathValue($uploadToken),
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
     * Delete an upload token
     *
     * @param  string $uploadToken The unique identifier for the upload token you want to delete. Deleting a token will make it so the token can no longer be used for authentication. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteToken(string $uploadToken): void
    {
        $request = $this->buildDeleteTokenRequest($uploadToken);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'deleteToken'
     *
     * @param  string $uploadToken The unique identifier for the upload token you want to delete. Deleting a token will make it so the token can no longer be used for authentication. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteTokenRequest(string $uploadToken): Request
    {
        // verify the required parameter 'uploadToken' is set
        if ($uploadToken === null || (is_array($uploadToken) && count($uploadToken) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $uploadToken when calling '
            );
        }

        $resourcePath = '/upload-tokens/{uploadToken}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($uploadToken !== null) {
            $resourcePath = str_replace(
                '{' . 'uploadToken' . '}',
                ObjectSerializer::toPathValue($uploadToken),
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
     * List all active upload tokens
     *
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\TokenListResponse
     */
    public function list(array $queryParams = []): \ApiVideo\Client\Model\TokenListResponse
    {
        $request = $this->buildListRequest($queryParams);

        $model = new \ApiVideo\Client\Model\TokenListResponse($this->client->request($request));

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
        $sortBy = array_key_exists('sortBy', $queryParams) ? $queryParams['sortBy'] : null;
        $sortOrder = array_key_exists('sortOrder', $queryParams) ? $queryParams['sortOrder'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;


        $resourcePath = '/upload-tokens';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

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


}
