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
    private const DEFAULT_USER_AGENT = 'api.video client (php; v:1.2.1; )';

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
    private $userAgent;


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
        $this->userAgent = self::DEFAULT_USER_AGENT;

        if ($apiKey) {
            $this->authenticator = new Authenticator($this, $apiKey);
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

        $request = $request->withHeader('User-Agent', $this->userAgent);

        return $this->sendRequest($request);
    }

    /**
     * @param string $applicationName the application name. Allowed characters: A-Z, a-z, 0-9, -, _, /. Max length: 50.
     */
    public function setApplicationName(string $applicationName) {
        if($applicationName) {
            if (!preg_match_all('/^[\w\-.\/]{1,50}$/m', $applicationName)) {
                throw new \InvalidArgumentException(
                    'Invalid application name. Allowed characters: A-Z, a-z, 0-9, \'-\', \'_\', \'/\'. Max length: 50.'
                );
            }
            $this->userAgent = self::DEFAULT_USER_AGENT . " " . $applicationName;
            print("setted" . $this->userAgent . "\n");
        } else {
            $this->userAgent = self::DEFAULT_USER_AGENT;
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
