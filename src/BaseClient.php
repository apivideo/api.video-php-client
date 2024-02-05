<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use ApiVideo\Client\Exception\AuthenticationFailedException;
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
     * @var string
     */
    private $originSdkHeaderValue;



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
        $this->originSdkHeaderValue = "";

        if ($apiKey) {
            $this->authenticator = new Authenticator($this, $apiKey, 'php:1.3.1');
        }
    }

    /**
     * @param Request $commandRequest
     *
     * @return array|null
     * @throws ClientExceptionInterface|AuthenticationFailedException
     */
    public function request(Request $commandRequest, bool $skipAuthRequest = false): ?array
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
        if($this->originSdkHeaderValue) {
            $request = $request->withHeader('AV-Origin-Sdk', $this->originSdkHeaderValue);
        }
        $request = $request->withHeader('AV-Origin-Client', 'php:1.3.1');

        return $this->sendRequest($request, $skipAuthRequest);
    }

    /**
     * @param string $applicationName the application name. Allowed characters: A-Z, a-z, 0-9, -. Max length: 50.
     * @param string $applicationVersion the application version. Pattern: xxx[.yyy][.zzz].
     */
    public function setApplicationName(string $applicationName, string $applicationVersion) {
        $this->validateOrigin('application', $applicationName, $applicationVersion);

        $this->originAppHeaderValue = $applicationName . ":" . $applicationVersion;

        if($this->authenticator) {
            $this->authenticator->setOriginAppHeaderValue($this->originAppHeaderValue);
        }
    }

    /**
     * @param string $sdkName the SDK name. Allowed characters: A-Z, a-z, 0-9, -. Max length: 50.
     * @param string $sdkVersion the SDK version. Pattern: xxx[.yyy][.zzz].
     */
    public function setSdkName(string $sdkName, string $sdkVersion) {
        $this->validateOrigin('sdk', $sdkName, $sdkVersion);

        $this->originSdkHeaderValue = $sdkName . ":" . $sdkVersion;

        if($this->authenticator) {
            $this->authenticator->setOriginSdkHeaderValue($this->originSdkHeaderValue);
        }
    }

    private function validateOrigin(string $type, string $name, string $version) {
        $nameIsSet = isset($name) && trim($name) != '';
        $versionIsSet = isset($version) && trim($version) != '';

        if(!$nameIsSet && !$versionIsSet) {
            return;
        }
        if(!$nameIsSet) {
            throw new \InvalidArgumentException($type . " name is mandatory when " . $type . " version is set.");
        }
        if(!$versionIsSet) {
            throw new \InvalidArgumentException($type . " version is mandatory when " . $type . " name is set.");
        }
        if (!preg_match_all('/^[\w\-]{1,50}$/m', $name)) {
            throw new \InvalidArgumentException('Invalid  ' . $type . ' name value. Allowed characters: A-Z, a-z, 0-9, "-", "_". Max length: 50.');
        }
        if (!preg_match_all('/^\d{1,3}(\.\d{1,3}(\.\d{1,3})?)?$/m', $version)) {
            throw new \InvalidArgumentException('Invalid ' . $type . ' version value. The version should match the xxx[.yyy][.zzz] pattern.');
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
     * @return ClientInterface
     */
    public function getHttpClient(): ClientInterface
    {
        return $this->httpClient;
    }

    /**
     * @param RequestInterface $request
     *
     * @return array|null
     * @throws ClientExceptionInterface
     * @throws AuthenticationFailedException
     */
    private function sendRequest(RequestInterface $request, bool $skipAuthRequest = false): ?array
    {
        if ($this->authenticator && !$skipAuthRequest) {
            $request = $this->authenticator->authenticateRequest($request);
        }

        $response = $this->httpClient->sendRequest($request);

        if (Authenticator::isExpiredAuthTokenResponse($response)) {
            if(!$skipAuthRequest) {
                $this->authenticator->authenticate();
                return $this->sendRequest($request);
            }
            throw new AuthenticationFailedException();
        }

        if (400 <= $response->getStatusCode()) {
            throw new HttpException($request, $response);
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
