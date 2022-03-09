<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use ApiVideo\Client\Exception\ExpiredAuthTokenException;
use ApiVideo\Client\Exception\HttpException;
use ApiVideo\Client\Resource\Video\Video;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamFactoryInterface;

/**
 * Internal client
 */
class BaseClient
{
    /**
     * @var Authenticator
     */
    public $authenticator;

    /**
     * @var string
     */
    private $baseUri;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var RequestFactoryInterface
     */
    private $requestFactory;

    /**
     * @var StreamFactoryInterface
     */
    private $streamFactory;

    /**
     * @var int
     */
    private $chunkSize;

    /**
     * @var string
     */
    private $originAppHeaderValue;



    /**
     * @param string                  $baseUri
     * @param string|null             $apiKey
     * @param ClientInterface         $httpClient
     * @param RequestFactoryInterface $requestFactory
     * @param StreamFactoryInterface  $streamFactory
     * @param int                     $chunkSize
     */
    public function __construct(string $baseUri, ?string $apiKey, ClientInterface $httpClient, RequestFactoryInterface $requestFactory, StreamFactoryInterface $streamFactory, int $chunkSize)
    {
        $this->baseUri = $baseUri;
        $this->httpClient = $httpClient;
        $this->requestFactory = $requestFactory;
        $this->streamFactory = $streamFactory;
        $this->chunkSize = $chunkSize;
        $this->originAppHeaderValue = "";

        if ($apiKey) {
            $this->authenticator = new Authenticator($this, $apiKey, 'php:1.2.2');
        }
    }

    /**
     * @param Request $commandRequest
     *
     * @return array|null
     * @throws ClientExceptionInterface
     */
    public function request(Request $commandRequest): ?array
    {
        $stream = $commandRequest->getStream();

        if (is_null($stream)) {
            $stream = $this->streamFactory->createStream($commandRequest->getBody() ?? '');
        }

        $request = $this->requestFactory
            ->createRequest($commandRequest->getMethod(), $this->baseUri.$commandRequest->getPath())
            ->withBody($stream)
        ;

        foreach ($commandRequest->getHeaders() as $name => $value) {
            $request = $request->withHeader($name, $value);
        }

        if($this->originAppHeaderValue) {
            $request = $request->withHeader('AV-Origin-App', $this->originAppHeaderValue);
        }
        $request = $request->withHeader('AV-Origin-Client', 'php:1.2.2');

        return $this->sendRequest($request);
    }

    /**
     * @param string $applicationName the application name. Allowed characters: A-Z, a-z, 0-9, -. Max length: 50.
     * @param string $applicationVersion the application version (optional). Pattern: xxx[.yyy][.zzz].
     */
    public function setApplicationName(string $applicationName, string $applicationVersion = "") {
        if($applicationVersion && !$applicationName) {
            throw new \InvalidArgumentException("applicationName is mandatory when applicationVersion is set.");
        }

        if ($applicationName && !preg_match_all('/^[\w\-]{1,50}$/m', $applicationName)) {
            throw new \InvalidArgumentException('Invalid applicationName value. Allowed characters: A-Z, a-z, 0-9, "-", "_". Max length: 50.');
        }

        if ($applicationVersion && !preg_match_all('/^\d{1,3}(\.\d{1,3}(\.\d{1,3})?)?$/m', $applicationVersion)) {
            throw new \InvalidArgumentException('Invalid applicationVersion value. The version should match the xxx[.yyy][.zzz] pattern.');
        }

        $this->originAppHeaderValue = $applicationVersion
            ? $applicationName . ":" . $applicationVersion
            : $applicationName;

        if($this->authenticator) {
            $this->authenticator->setOriginAppHeaderValue($this->originAppHeaderValue);
        }
    }

    /**
     * @return int
     */
    public function getChunkSize(): int
    {
        return $this->chunkSize;
    }

    /**
     * @return StreamFactoryInterface
     */
    public function getStreamFactory(): StreamFactoryInterface
    {
        return $this->streamFactory;
    }

    /**
     * @param RequestInterface $request
     *
     * @return array|null
     * @throws ClientExceptionInterface
     */
    private function sendRequest(RequestInterface $request): ?array
    {
        if ($this->authenticator) {
            $request = $this->authenticator->authenticateRequest($request);
        }

        try {
            $response = $this->httpClient->sendRequest($request);

            if (Authenticator::isExpiredAuthTokenResponse($response)) {
                throw new ExpiredAuthTokenException();
            }

            if (400 <= $response->getStatusCode()) {
                throw new HttpException($request, $response);
            }

            return json_decode($response->getBody()->getContents(), true);
        } catch (ExpiredAuthTokenException $e) {
            $this->authenticator->authenticate();

            return $this->sendRequest($request);
        }
    }
}
