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
class WebhooksApi implements ApiInterface
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
     * Delete a Webhook
     *
     * @param  string $webhookId The webhook you wish to delete. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete(string $webhookId): void
    {
        $request = $this->buildDeleteRequest($webhookId);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  string $webhookId The webhook you wish to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteRequest(string $webhookId): Request
    {
        // verify the required parameter 'webhookId' is set
        if ($webhookId === null || (is_array($webhookId) && count($webhookId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $webhookId when calling '
            );
        }

        $resourcePath = '/webhooks/{webhookId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($webhookId !== null) {
            $resourcePath = str_replace(
                '{' . 'webhookId' . '}',
                ObjectSerializer::toPathValue($webhookId),
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
     * Show Webhook details
     *
     * @param  string $webhookId The unique webhook you wish to retreive details on. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Webhook
     */
    public function get(string $webhookId): \ApiVideo\Client\Model\Webhook
    {
        $request = $this->buildGetRequest($webhookId);

        $model = new \ApiVideo\Client\Model\Webhook($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'get'
     *
     * @param  string $webhookId The unique webhook you wish to retreive details on. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetRequest(string $webhookId): Request
    {
        // verify the required parameter 'webhookId' is set
        if ($webhookId === null || (is_array($webhookId) && count($webhookId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $webhookId when calling '
            );
        }

        $resourcePath = '/webhooks/{webhookId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($webhookId !== null) {
            $resourcePath = str_replace(
                '{' . 'webhookId' . '}',
                ObjectSerializer::toPathValue($webhookId),
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
     * List all webhooks
     *
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\WebhooksListResponse
     */
    public function list(array $queryParams = []): \ApiVideo\Client\Model\WebhooksListResponse
    {
        $request = $this->buildListRequest($queryParams);

        $model = new \ApiVideo\Client\Model\WebhooksListResponse($this->client->request($request));

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
        $events = array_key_exists('events', $queryParams) ? $queryParams['events'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;


        $resourcePath = '/webhooks';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // events query params
        if ($events !== null) {
            $queryParams['events'] = $events;
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
     * Create Webhook
     *
     * @param  \ApiVideo\Client\Model\WebhooksCreationPayload $webhooksCreationPayload webhooksCreationPayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Webhook|\ApiVideo\Client\Model\BadRequest
     */
    public function create(\ApiVideo\Client\Model\WebhooksCreationPayload $webhooksCreationPayload): \ApiVideo\Client\Model\Webhook
    {
        $request = $this->buildCreateRequest($webhooksCreationPayload);

        $model = new \ApiVideo\Client\Model\Webhook($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'create'
     *
     * @param  \ApiVideo\Client\Model\WebhooksCreationPayload $webhooksCreationPayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildCreateRequest(\ApiVideo\Client\Model\WebhooksCreationPayload $webhooksCreationPayload): Request
    {
        // verify the required parameter 'webhooksCreationPayload' is set
        if ($webhooksCreationPayload === null || (is_array($webhooksCreationPayload) && count($webhooksCreationPayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $webhooksCreationPayload when calling '
            );
        }

        $resourcePath = '/webhooks';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;


        if ($webhooksCreationPayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($webhooksCreationPayload));
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
