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
class PlayerThemesApi implements ApiInterface
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
     * Delete a player
     *
     * @param  string $playerId The unique identifier for the player you want to delete. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete(string $playerId): void
    {
        $request = $this->buildDeleteRequest($playerId);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  string $playerId The unique identifier for the player you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteRequest(string $playerId): Request
    {
        // verify the required parameter 'playerId' is set
        if ($playerId === null || (is_array($playerId) && count($playerId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $playerId when calling '
            );
        }

        $resourcePath = '/players/{playerId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($playerId !== null) {
            $resourcePath = str_replace(
                '{' . 'playerId' . '}',
                ObjectSerializer::toPathValue($playerId),
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
     * Delete logo
     *
     * @param  string $playerId The unique identifier for the player. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function deleteLogo(string $playerId): void
    {
        $request = $this->buildDeleteLogoRequest($playerId);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'deleteLogo'
     *
     * @param  string $playerId The unique identifier for the player. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteLogoRequest(string $playerId): Request
    {
        // verify the required parameter 'playerId' is set
        if ($playerId === null || (is_array($playerId) && count($playerId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $playerId when calling '
            );
        }

        $resourcePath = '/players/{playerId}/logo';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($playerId !== null) {
            $resourcePath = str_replace(
                '{' . 'playerId' . '}',
                ObjectSerializer::toPathValue($playerId),
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
     * List all players
     *
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\PlayerThemesListResponse|\ApiVideo\Client\Model\BadRequest
     */
    public function list(array $queryParams = []): \ApiVideo\Client\Model\PlayerThemesListResponse
    {
        $request = $this->buildListRequest($queryParams);

        $model = new \ApiVideo\Client\Model\PlayerThemesListResponse($this->client->request($request));

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


        $resourcePath = '/players';
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

    /**
     * Show a player
     *
     * @param  string $playerId The unique identifier for the player you want to retrieve. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\PlayerTheme|\ApiVideo\Client\Model\NotFound
     */
    public function get(string $playerId): \ApiVideo\Client\Model\PlayerTheme
    {
        $request = $this->buildGetRequest($playerId);

        $model = new \ApiVideo\Client\Model\PlayerTheme($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'get'
     *
     * @param  string $playerId The unique identifier for the player you want to retrieve. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetRequest(string $playerId): Request
    {
        // verify the required parameter 'playerId' is set
        if ($playerId === null || (is_array($playerId) && count($playerId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $playerId when calling '
            );
        }

        $resourcePath = '/players/{playerId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($playerId !== null) {
            $resourcePath = str_replace(
                '{' . 'playerId' . '}',
                ObjectSerializer::toPathValue($playerId),
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
     * Update a player
     *
     * @param  string $playerId The unique identifier for the player. (required)
     * @param  \ApiVideo\Client\Model\PlayerThemeUpdatePayload $playerThemeUpdatePayload playerThemeUpdatePayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\PlayerTheme|\ApiVideo\Client\Model\NotFound
     */
    public function update(string $playerId, \ApiVideo\Client\Model\PlayerThemeUpdatePayload $playerThemeUpdatePayload): \ApiVideo\Client\Model\PlayerTheme
    {
        $request = $this->buildUpdateRequest($playerId, $playerThemeUpdatePayload);

        $model = new \ApiVideo\Client\Model\PlayerTheme($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'update'
     *
     * @param  string $playerId The unique identifier for the player. (required)
     * @param  \ApiVideo\Client\Model\PlayerThemeUpdatePayload $playerThemeUpdatePayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUpdateRequest(string $playerId, \ApiVideo\Client\Model\PlayerThemeUpdatePayload $playerThemeUpdatePayload): Request
    {
        // verify the required parameter 'playerId' is set
        if ($playerId === null || (is_array($playerId) && count($playerId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $playerId when calling '
            );
        }
        // verify the required parameter 'playerThemeUpdatePayload' is set
        if ($playerThemeUpdatePayload === null || (is_array($playerThemeUpdatePayload) && count($playerThemeUpdatePayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $playerThemeUpdatePayload when calling '
            );
        }

        $resourcePath = '/players/{playerId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($playerId !== null) {
            $resourcePath = str_replace(
                '{' . 'playerId' . '}',
                ObjectSerializer::toPathValue($playerId),
                $resourcePath
            );
        }

        if ($playerThemeUpdatePayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($playerThemeUpdatePayload));
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
     * Create a player
     *
     * @param  \ApiVideo\Client\Model\PlayerThemeCreationPayload $playerThemeCreationPayload playerThemeCreationPayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\PlayerTheme
     */
    public function create(\ApiVideo\Client\Model\PlayerThemeCreationPayload $playerThemeCreationPayload): \ApiVideo\Client\Model\PlayerTheme
    {
        $request = $this->buildCreateRequest($playerThemeCreationPayload);

        $model = new \ApiVideo\Client\Model\PlayerTheme($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'create'
     *
     * @param  \ApiVideo\Client\Model\PlayerThemeCreationPayload $playerThemeCreationPayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildCreateRequest(\ApiVideo\Client\Model\PlayerThemeCreationPayload $playerThemeCreationPayload): Request
    {
        // verify the required parameter 'playerThemeCreationPayload' is set
        if ($playerThemeCreationPayload === null || (is_array($playerThemeCreationPayload) && count($playerThemeCreationPayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $playerThemeCreationPayload when calling '
            );
        }

        $resourcePath = '/players';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;


        if ($playerThemeCreationPayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($playerThemeCreationPayload));
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
     * Upload a logo
     *
     * @param  string $playerId The unique identifier for the player. (required)
     * @param  \SplFileObject $file The name of the file you want to use for your logo. (required)
     * @param  string $link A public link that you want to advertise in your player. For example, you could add a link to your company. When a viewer clicks on your logo, they will be taken to this address. (optional)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\PlayerTheme|\ApiVideo\Client\Model\BadRequest|\ApiVideo\Client\Model\NotFound
     */
    public function uploadLogo(string $playerId, \SplFileObject $file, string $link = null): \ApiVideo\Client\Model\PlayerTheme
    {
        $request = $this->buildUploadLogoRequest($playerId, $file, $link);

        $model = new \ApiVideo\Client\Model\PlayerTheme($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'uploadLogo'
     *
     * @param  string $playerId The unique identifier for the player. (required)
     * @param  \SplFileObject $file The name of the file you want to use for your logo. (required)
     * @param  string $link A public link that you want to advertise in your player. For example, you could add a link to your company. When a viewer clicks on your logo, they will be taken to this address. (optional)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUploadLogoRequest(string $playerId, \SplFileObject $file, string $link = null): Request
    {
        // verify the required parameter 'playerId' is set
        if ($playerId === null || (is_array($playerId) && count($playerId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $playerId when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }

        $resourcePath = '/players/{playerId}/logo';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($playerId !== null) {
            $resourcePath = str_replace(
                '{' . 'playerId' . '}',
                ObjectSerializer::toPathValue($playerId),
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
        // form params
        if ($link !== null) {
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
