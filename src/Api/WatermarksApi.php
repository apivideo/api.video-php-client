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
class WatermarksApi implements ApiInterface
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
     * Upload a watermark
     *
     * @param  \SplFileObject $file The &#x60;.jpg&#x60; or &#x60;.png&#x60; image to be added as a watermark. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Watermark|\ApiVideo\Client\Model\BadRequest
     */
    public function upload(\SplFileObject $file): \ApiVideo\Client\Model\Watermark
    {
        $request = $this->buildUploadRequest($file);

        $model = new \ApiVideo\Client\Model\Watermark($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'upload'
     *
     * @param  \SplFileObject $file The &#x60;.jpg&#x60; or &#x60;.png&#x60; image to be added as a watermark. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUploadRequest(\SplFileObject $file): Request
    {
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }

        $resourcePath = '/watermarks';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;



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


    /**
     * Delete a watermark
     *
     * @param  string $watermarkId The watermark ID for the watermark you want to delete. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete(string $watermarkId): void
    {
        $request = $this->buildDeleteRequest($watermarkId);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  string $watermarkId The watermark ID for the watermark you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteRequest(string $watermarkId): Request
    {
        // verify the required parameter 'watermarkId' is set
        if ($watermarkId === null || (is_array($watermarkId) && count($watermarkId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $watermarkId when calling '
            );
        }

        $resourcePath = '/watermarks/{watermarkId}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($watermarkId !== null) {
            $resourcePath = str_replace(
                '{' . 'watermarkId' . '}',
                ObjectSerializer::toPathValue($watermarkId),
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
     * List all watermarks
     *
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\WatermarksListResponse|\ApiVideo\Client\Model\BadRequest
     */
    public function list(array $queryParams = []): \ApiVideo\Client\Model\WatermarksListResponse
    {
        $request = $this->buildListRequest($queryParams);

        $model = new \ApiVideo\Client\Model\WatermarksListResponse($this->client->request($request));

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


        $resourcePath = '/watermarks';
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
