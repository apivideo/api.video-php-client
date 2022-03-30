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
class ChaptersApi implements ApiInterface
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
     * Upload a chapter
     *
     * @param  string $videoId The unique identifier for the video you want to upload a chapter for. (required)
     * @param  string $language A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. (required)
     * @param  \SplFileObject $file The VTT file describing the chapters you want to upload. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Chapter|\ApiVideo\Client\Model\BadRequest|\ApiVideo\Client\Model\NotFound
     */
    public function upload(string $videoId, string $language, \SplFileObject $file): \ApiVideo\Client\Model\Chapter
    {
        $request = $this->buildUploadRequest($videoId, $language, $file);

        $model = new \ApiVideo\Client\Model\Chapter($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'upload'
     *
     * @param  string $videoId The unique identifier for the video you want to upload a chapter for. (required)
     * @param  string $language A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. (required)
     * @param  \SplFileObject $file The VTT file describing the chapters you want to upload. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUploadRequest(string $videoId, string $language, \SplFileObject $file): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'language' is set
        if ($language === null || (is_array($language) && count($language) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $language when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }

        $resourcePath = '/videos/{videoId}/chapters/{language}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($videoId !== null) {
            $resourcePath = str_replace(
                '{' . 'videoId' . '}',
                ObjectSerializer::toPathValue($videoId),
                $resourcePath
            );
        }
        // path params
        if ($language !== null) {
            $resourcePath = str_replace(
                '{' . 'language' . '}',
                ObjectSerializer::toPathValue($language),
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


    /**
     * Retrieve a chapter
     *
     * @param  string $videoId The unique identifier for the video you want to show a chapter for. (required)
     * @param  string $language A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Chapter|\ApiVideo\Client\Model\NotFound
     */
    public function get(string $videoId, string $language): \ApiVideo\Client\Model\Chapter
    {
        $request = $this->buildGetRequest($videoId, $language);

        $model = new \ApiVideo\Client\Model\Chapter($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'get'
     *
     * @param  string $videoId The unique identifier for the video you want to show a chapter for. (required)
     * @param  string $language A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetRequest(string $videoId, string $language): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'language' is set
        if ($language === null || (is_array($language) && count($language) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $language when calling '
            );
        }

        $resourcePath = '/videos/{videoId}/chapters/{language}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($videoId !== null) {
            $resourcePath = str_replace(
                '{' . 'videoId' . '}',
                ObjectSerializer::toPathValue($videoId),
                $resourcePath
            );
        }
        // path params
        if ($language !== null) {
            $resourcePath = str_replace(
                '{' . 'language' . '}',
                ObjectSerializer::toPathValue($language),
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
     * Delete a chapter
     *
     * @param  string $videoId The unique identifier for the video you want to delete a chapter from. (required)
     * @param  string $language A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete(string $videoId, string $language): void
    {
        $request = $this->buildDeleteRequest($videoId, $language);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  string $videoId The unique identifier for the video you want to delete a chapter from. (required)
     * @param  string $language A valid [BCP 47](https://github.com/libyal/libfwnt/wiki/Language-Code-identifiers) language representation. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteRequest(string $videoId, string $language): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'language' is set
        if ($language === null || (is_array($language) && count($language) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $language when calling '
            );
        }

        $resourcePath = '/videos/{videoId}/chapters/{language}';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // path params
        if ($videoId !== null) {
            $resourcePath = str_replace(
                '{' . 'videoId' . '}',
                ObjectSerializer::toPathValue($videoId),
                $resourcePath
            );
        }
        // path params
        if ($language !== null) {
            $resourcePath = str_replace(
                '{' . 'language' . '}',
                ObjectSerializer::toPathValue($language),
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
     * List video chapters
     *
     * @param  string $videoId The unique identifier for the video you want to retrieve a list of chapters for. (required)
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\ChaptersListResponse|\ApiVideo\Client\Model\NotFound
     */
    public function list(string $videoId, array $queryParams = []): \ApiVideo\Client\Model\ChaptersListResponse
    {
        $request = $this->buildListRequest($videoId, $queryParams);

        $model = new \ApiVideo\Client\Model\ChaptersListResponse($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'list'
     *
     * @param  string $videoId The unique identifier for the video you want to retrieve a list of chapters for. (required)
     * @param  array $queryParams
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildListRequest(string $videoId, array $queryParams = []): Request
    {
        // unbox the parameters from the associative array
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;

        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }

        $resourcePath = '/videos/{videoId}/chapters';
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
