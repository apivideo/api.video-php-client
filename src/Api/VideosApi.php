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
class VideosApi implements ApiInterface
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
     * Create a video
     *
     * @param  \ApiVideo\Client\Model\VideoCreationPayload $videoCreationPayload video to create (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\BadRequest
     */
    public function create(\ApiVideo\Client\Model\VideoCreationPayload $videoCreationPayload): \ApiVideo\Client\Model\Video
    {
        $request = $this->buildCreateRequest($videoCreationPayload);

        $model = new \ApiVideo\Client\Model\Video($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'create'
     *
     * @param  \ApiVideo\Client\Model\VideoCreationPayload $videoCreationPayload video to create (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildCreateRequest(\ApiVideo\Client\Model\VideoCreationPayload $videoCreationPayload): Request
    {
        // verify the required parameter 'videoCreationPayload' is set
        if ($videoCreationPayload === null || (is_array($videoCreationPayload) && count($videoCreationPayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoCreationPayload when calling '
            );
        }

        $resourcePath = '/videos';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;


        if ($videoCreationPayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($videoCreationPayload));
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
     * Upload a video
     *
     * @param  string $videoId Enter the videoId you want to use to upload your video. (required)
     * @param  \SplFileObject $file The path to the video you would like to upload. The path must be local. If you want to use a video from an online source, you must use the \\\&quot;/videos\\\&quot; endpoint and add the \\\&quot;source\\\&quot; parameter when you create a new video. (required)
     * @param  string $contentRange Content-Range can be used if you want to split your file. You can do this by parts, or by chunk. * If you split your file by parts (recommended option), the &#x60;Content-Range&#x60; header value must match the following pattern: &#x60;part &lt;part&gt;/&lt;total_parts&gt;&#x60;:   * &#x60;&lt;part&gt;&#x60; is a positive integer representing the part number. The first sequential part number is always 1.   * &#x60;&lt;total_parts&gt;&#x60; is a positive integer representing the total parts of the video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * If you split your file by bytes, bear in mind byte ranges are inclusive, meaning that bytes 0-5242879 represents the first 5,242,880 bytes in a file or object. Also, the Content-Range header value must match the following pattern: &#x60;bytes &lt;from_byte&gt;-&lt;to_byte&gt;/&lt;total_bytes&gt;&#x60;:   * &#x60;&lt;from_byte&gt;&#x60; is a positive integer or 0. It represents the range start (aka lower bound), i.e., the first byte of the chunk compared to the total bytes composing the full video source. The first sequential range always starts at 0.   * &#x60;&lt;to_byte&gt;&#x60; is a positive integer representing the range end (aka upper bound), i.e., the last byte of the chunk compared to the total bytes composing the full video source.   * &#x60;&lt;total_bytes&gt;&#x60; is a positive integer representing the total bytes composing the full video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * Ordering and chunk or part size   * The order in which the chunks are received on our side does not matter.      * Example: &#x60;part 3/_*&#x60; then &#x60;part 2/_*&#x60; then &#x60;part 1/3&#x60; works.   * The chunks can be sent concurrently. We have a lock mechanism to ensure they are still technically processed one by one to ensure the \&quot;completion\&quot; check behaves as expected.   * The only chunk that can be smaller than our minimum allowed chunk size (5 MiB) is the last sequential one (i.e., the last sequential range for the \&quot;byte-range\&quot; system and the last part for the \&quot;part\&quot; system.     * For instance, if your video is 10.5 MiB big, your last chunk would be 500 KiB, and that would work.      * Another example is if your video is 2 MiB big, then your first and last chunk will be 2MiB and that will work as well. (optional)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\BadRequest|\ApiVideo\Client\Model\NotFound
     */
    public function upload(string $videoId, \SplFileObject $file, string $contentRange = null): \ApiVideo\Client\Model\Video
    {
        $videoUploader = new VideoUploader($this->client);
        $model = $videoUploader->upload($videoId, $file, $contentRange);

        return $model;
    }

    /**
     * Create request for operation 'upload'
     *
     * @param  string $videoId Enter the videoId you want to use to upload your video. (required)
     * @param  \SplFileObject $file The path to the video you would like to upload. The path must be local. If you want to use a video from an online source, you must use the \\\&quot;/videos\\\&quot; endpoint and add the \\\&quot;source\\\&quot; parameter when you create a new video. (required)
     * @param  string $contentRange Content-Range can be used if you want to split your file. You can do this by parts, or by chunk. * If you split your file by parts (recommended option), the &#x60;Content-Range&#x60; header value must match the following pattern: &#x60;part &lt;part&gt;/&lt;total_parts&gt;&#x60;:   * &#x60;&lt;part&gt;&#x60; is a positive integer representing the part number. The first sequential part number is always 1.   * &#x60;&lt;total_parts&gt;&#x60; is a positive integer representing the total parts of the video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * If you split your file by bytes, bear in mind byte ranges are inclusive, meaning that bytes 0-5242879 represents the first 5,242,880 bytes in a file or object. Also, the Content-Range header value must match the following pattern: &#x60;bytes &lt;from_byte&gt;-&lt;to_byte&gt;/&lt;total_bytes&gt;&#x60;:   * &#x60;&lt;from_byte&gt;&#x60; is a positive integer or 0. It represents the range start (aka lower bound), i.e., the first byte of the chunk compared to the total bytes composing the full video source. The first sequential range always starts at 0.   * &#x60;&lt;to_byte&gt;&#x60; is a positive integer representing the range end (aka upper bound), i.e., the last byte of the chunk compared to the total bytes composing the full video source.   * &#x60;&lt;total_bytes&gt;&#x60; is a positive integer representing the total bytes composing the full video source. It can also be &#x60;*&#x60; if or as long as it is unknown. Technically, this value is required only one time and cannot differ in several requests. * Ordering and chunk or part size   * The order in which the chunks are received on our side does not matter.      * Example: &#x60;part 3/_*&#x60; then &#x60;part 2/_*&#x60; then &#x60;part 1/3&#x60; works.   * The chunks can be sent concurrently. We have a lock mechanism to ensure they are still technically processed one by one to ensure the \&quot;completion\&quot; check behaves as expected.   * The only chunk that can be smaller than our minimum allowed chunk size (5 MiB) is the last sequential one (i.e., the last sequential range for the \&quot;byte-range\&quot; system and the last part for the \&quot;part\&quot; system.     * For instance, if your video is 10.5 MiB big, your last chunk would be 500 KiB, and that would work.      * Another example is if your video is 2 MiB big, then your first and last chunk will be 2MiB and that will work as well. (optional)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUploadRequest(string $videoId, \SplFileObject $file, string $contentRange = null): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }
        if ($contentRange !== null && !preg_match("/(?:bytes (?<from>\\d+)-(?<to>\\d+)|part (?<part>\\d+))/(?<total>\\d+|\\*)/", $contentRange)) {
            throw new \InvalidArgumentException("invalid value for \"contentRange\" when calling VideosApi.Upload, must conform to the pattern /(?:bytes (?<from>\\d+)-(?<to>\\d+)|part (?<part>\\d+))/(?<total>\\d+|\\*)/.");
        }


        $resourcePath = '/videos/{videoId}/source';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // header params
        if ($contentRange !== null) {
            $headerParams['Content-Range'] = ObjectSerializer::toHeaderValue($contentRange);
        }
        // path params
        if ($videoId !== null) {
            $resourcePath = str_replace(
                '{' . 'videoId' . '}',
                ObjectSerializer::toPathValue($videoId),
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


    public function createUploadProgressiveSession(string $videoId) {
        $resourcePath = '/videos/{videoId}/source';
        // path params
        if ($videoId !== null) {
            $resourcePath = str_replace(
                '{' . 'videoId' . '}',
                ObjectSerializer::toPathValue($videoId),
                $resourcePath
            );
        }

        return new ProgressiveUploadSession($this->client, $resourcePath);
    }

    /**
     * Upload with an upload token
     *
     * @param  \SplFileObject $file The path to the video you want to upload. (required)
     * @param  string $contentRange Content-Range represents the range of bytes that will be returned as a result of the request. Byte ranges are inclusive, meaning that bytes 0-999 represents the first 1000 bytes in a file or object. (optional)
     * @param  string $videoId The video id returned by the first call to this endpoint in a large video upload scenario. (optional)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\BadRequest
     */
    public function uploadWithUploadToken(string $token, \SplFileObject $file, string $contentRange = null, string $videoId = null): \ApiVideo\Client\Model\Video
    {
        $videoUploader = new VideoUploader($this->client);
        $model = $videoUploader->uploadWithUploadToken($token, $file, $contentRange, $videoId);

        return $model;
    }

    /**
     * Create request for operation 'uploadWithUploadToken'
     *
     * @param  \SplFileObject $file The path to the video you want to upload. (required)
     * @param  string $contentRange Content-Range represents the range of bytes that will be returned as a result of the request. Byte ranges are inclusive, meaning that bytes 0-999 represents the first 1000 bytes in a file or object. (optional)
     * @param  string $videoId The video id returned by the first call to this endpoint in a large video upload scenario. (optional)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUploadWithUploadTokenRequest(string $token, \SplFileObject $file, string $contentRange = null, string $videoId = null): Request
    {
        // verify the required parameter 'token' is set
        if ($token === null || (is_array($token) && count($token) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $token when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }
        if ($contentRange !== null && !preg_match("/^bytes [0-9]*-[0-9]*_\/[0-9]*$/", $contentRange)) {
            throw new \InvalidArgumentException("invalid value for \"contentRange\" when calling VideosApi.UploadWithUploadToken, must conform to the pattern /^bytes [0-9]*-[0-9]*_\/[0-9]*$/.");
        }


        $resourcePath = '/upload';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // token query params
        if ($token !== null) {
            $queryParams['token'] = $token;
        }

        // header params
        if ($contentRange !== null) {
            $headerParams['Content-Range'] = ObjectSerializer::toHeaderValue($contentRange);
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
        if ($videoId !== null) {
        }

        $query = \http_build_query($queryParams);

        return new Request(
            'POST',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    public function createUploadWithUploadTokenProgressiveSession(string $token, string $videoId = null) {
        $resourcePath = '/upload';

        $queryParams = [];

        // token query params
        if ($token !== null) {
            $queryParams['token'] = $token;
        }

        $query = \http_build_query($queryParams);
        $resourcePath = $resourcePath . ($query ? "?{$query}" : '');

        return new ProgressiveUploadSession($this->client, $resourcePath, $videoId);
    }

    /**
     * Retrieve a video
     *
     * @param  string $videoId The unique identifier for the video you want details about. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\NotFound
     */
    public function get(string $videoId): \ApiVideo\Client\Model\Video
    {
        $request = $this->buildGetRequest($videoId);

        $model = new \ApiVideo\Client\Model\Video($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'get'
     *
     * @param  string $videoId The unique identifier for the video you want details about. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetRequest(string $videoId): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }

        $resourcePath = '/videos/{videoId}';
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



        $query = \http_build_query($queryParams);

        return new Request(
            'GET',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * Update a video
     *
     * @param  string $videoId The video ID for the video you want to delete. (required)
     * @param  \ApiVideo\Client\Model\VideoUpdatePayload $videoUpdatePayload videoUpdatePayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\BadRequest|\ApiVideo\Client\Model\NotFound
     */
    public function update(string $videoId, \ApiVideo\Client\Model\VideoUpdatePayload $videoUpdatePayload): \ApiVideo\Client\Model\Video
    {
        $request = $this->buildUpdateRequest($videoId, $videoUpdatePayload);

        $model = new \ApiVideo\Client\Model\Video($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'update'
     *
     * @param  string $videoId The video ID for the video you want to delete. (required)
     * @param  \ApiVideo\Client\Model\VideoUpdatePayload $videoUpdatePayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUpdateRequest(string $videoId, \ApiVideo\Client\Model\VideoUpdatePayload $videoUpdatePayload): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'videoUpdatePayload' is set
        if ($videoUpdatePayload === null || (is_array($videoUpdatePayload) && count($videoUpdatePayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoUpdatePayload when calling '
            );
        }

        $resourcePath = '/videos/{videoId}';
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

        if ($videoUpdatePayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($videoUpdatePayload));
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
     * Delete a video
     *
     * @param  string $videoId The video ID for the video you want to delete. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return void
     */
    public function delete(string $videoId): void
    {
        $request = $this->buildDeleteRequest($videoId);

        $this->client->request($request);
    }

    /**
     * Create request for operation 'delete'
     *
     * @param  string $videoId The video ID for the video you want to delete. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildDeleteRequest(string $videoId): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }

        $resourcePath = '/videos/{videoId}';
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



        $query = \http_build_query($queryParams);

        return new Request(
            'DELETE',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


    /**
     * List all videos
     *
     * @param  array $queryParams
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\VideosListResponse|\ApiVideo\Client\Model\BadRequest
     */
    public function list(array $queryParams = []): \ApiVideo\Client\Model\VideosListResponse
    {
        $request = $this->buildListRequest($queryParams);

        $model = new \ApiVideo\Client\Model\VideosListResponse($this->client->request($request));

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
        $title = array_key_exists('title', $queryParams) ? $queryParams['title'] : null;
        $tags = array_key_exists('tags', $queryParams) ? $queryParams['tags'] : null;
        $metadata = array_key_exists('metadata', $queryParams) ? $queryParams['metadata'] : null;
        $description = array_key_exists('description', $queryParams) ? $queryParams['description'] : null;
        $liveStreamId = array_key_exists('liveStreamId', $queryParams) ? $queryParams['liveStreamId'] : null;
        $sortBy = array_key_exists('sortBy', $queryParams) ? $queryParams['sortBy'] : null;
        $sortOrder = array_key_exists('sortOrder', $queryParams) ? $queryParams['sortOrder'] : null;
        $currentPage = array_key_exists('currentPage', $queryParams) ? $queryParams['currentPage'] : 1;
        $pageSize = array_key_exists('pageSize', $queryParams) ? $queryParams['pageSize'] : 25;


        $resourcePath = '/videos';
        $formParams = [];
        $queryParams = [];
        $headers = [];
        $httpBody = '';
        $multipart = false;

        // title query params
        if ($title !== null) {
            $queryParams['title'] = $title;
        }

        // tags query params
        if ($tags !== null) {
            $queryParams['tags'] = $tags;
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
                throw new \InvalidArgumentException('invalid value for "$metadata" when calling VideosApi.List, must be an array.');
            }
        }

        // description query params
        if ($description !== null) {
            $queryParams['description'] = $description;
        }

        // liveStreamId query params
        if ($liveStreamId !== null) {
            $queryParams['liveStreamId'] = $liveStreamId;
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
     * Upload a thumbnail
     *
     * @param  string $videoId Unique identifier of the chosen video (required)
     * @param  \SplFileObject $file The image to be added as a thumbnail. The mime type should be image/jpeg, image/png or image/webp. The max allowed size is 8 MiB. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\BadRequest|\ApiVideo\Client\Model\NotFound
     */
    public function uploadThumbnail(string $videoId, \SplFileObject $file): \ApiVideo\Client\Model\Video
    {
        $request = $this->buildUploadThumbnailRequest($videoId, $file);

        $model = new \ApiVideo\Client\Model\Video($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'uploadThumbnail'
     *
     * @param  string $videoId Unique identifier of the chosen video (required)
     * @param  \SplFileObject $file The image to be added as a thumbnail. The mime type should be image/jpeg, image/png or image/webp. The max allowed size is 8 MiB. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildUploadThumbnailRequest(string $videoId, \SplFileObject $file): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'file' is set
        if ($file === null || (is_array($file) && count($file) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $file when calling '
            );
        }

        $resourcePath = '/videos/{videoId}/thumbnail';
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
     * Pick a thumbnail
     *
     * @param  string $videoId Unique identifier of the video you want to add a thumbnail to, where you use a section of your video as the thumbnail. (required)
     * @param  \ApiVideo\Client\Model\VideoThumbnailPickPayload $videoThumbnailPickPayload videoThumbnailPickPayload (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\Video|\ApiVideo\Client\Model\NotFound
     */
    public function pickThumbnail(string $videoId, \ApiVideo\Client\Model\VideoThumbnailPickPayload $videoThumbnailPickPayload): \ApiVideo\Client\Model\Video
    {
        $request = $this->buildPickThumbnailRequest($videoId, $videoThumbnailPickPayload);

        $model = new \ApiVideo\Client\Model\Video($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'pickThumbnail'
     *
     * @param  string $videoId Unique identifier of the video you want to add a thumbnail to, where you use a section of your video as the thumbnail. (required)
     * @param  \ApiVideo\Client\Model\VideoThumbnailPickPayload $videoThumbnailPickPayload (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildPickThumbnailRequest(string $videoId, \ApiVideo\Client\Model\VideoThumbnailPickPayload $videoThumbnailPickPayload): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }
        // verify the required parameter 'videoThumbnailPickPayload' is set
        if ($videoThumbnailPickPayload === null || (is_array($videoThumbnailPickPayload) && count($videoThumbnailPickPayload) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoThumbnailPickPayload when calling '
            );
        }

        $resourcePath = '/videos/{videoId}/thumbnail';
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

        if ($videoThumbnailPickPayload) {
            $httpBody = json_encode(ObjectSerializer::sanitizeForSerialization($videoThumbnailPickPayload));
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
     * Retrieve video status
     *
     * @param  string $videoId The unique identifier for the video you want the status for. (required)
     *
     * @throws \ApiVideo\Client\ApiException on non-2xx response
     * @throws \InvalidArgumentException
     * @return \ApiVideo\Client\Model\VideoStatus|\ApiVideo\Client\Model\NotFound
     */
    public function getStatus(string $videoId): \ApiVideo\Client\Model\VideoStatus
    {
        $request = $this->buildGetStatusRequest($videoId);

        $model = new \ApiVideo\Client\Model\VideoStatus($this->client->request($request));

        return $model;
    }

    /**
     * Create request for operation 'getStatus'
     *
     * @param  string $videoId The unique identifier for the video you want the status for. (required)
     *
     * @throws \InvalidArgumentException
     * @return Request
     */
    private function buildGetStatusRequest(string $videoId): Request
    {
        // verify the required parameter 'videoId' is set
        if ($videoId === null || (is_array($videoId) && count($videoId) === 0)) {
            throw new \InvalidArgumentException(
                'Missing the required parameter $videoId when calling '
            );
        }

        $resourcePath = '/videos/{videoId}/status';
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



        $query = \http_build_query($queryParams);

        return new Request(
            'GET',
            $resourcePath . ($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }


}
