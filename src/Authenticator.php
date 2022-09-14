<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Manages authentication
 */
class Authenticator
{
    private const PROP_ACCESS_TOKEN = 'access_token';
    private const AUTH_PATH = '/auth/api-key';

    /**
     * @var BaseClient
     */
    private $client;

    /**
     * @var string
     */
    private $apiKey;

    /**
     * @var string|null
     */
    private $accessToken;

    /**
     * @var string
     */
    private $originAppHeaderValue;

    /**
     * @var string
     */
    private $originClientHeaderValue;

    /**
     * @var string
     */
    private $originSdkHeaderValue;

    /**
     * @param BaseClient $client
     * @param string     $apiKey
     * @param string     $originClientHeaderValue
     */
    public function __construct(BaseClient $client, string $apiKey, string $originClientHeaderValue)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
        $this->originClientHeaderValue = $originClientHeaderValue;
    }

    /**
     * @param String $originAppHeaderValue
     */
    public function setOriginAppHeaderValue($originAppHeaderValue): void
    {
        $this->originAppHeaderValue = $originAppHeaderValue;
    }

    /**
     * @param String $originSdkHeaderValue
     */
    public function setOriginSdkHeaderValue($originSdkHeaderValue): void
    {
        $this->originSdkHeaderValue = $originSdkHeaderValue;
    }

    /**
     * @throws ClientExceptionInterface
     */
    public function authenticate(): void
    {
        $request = new Request(
            'POST',
            self::AUTH_PATH,
            [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'AV-Origin-Client' => $this->originClientHeaderValue,
            ],
            json_encode(['apiKey' => $this->apiKey])
        );

        if($this->originAppHeaderValue) {
            $request = $request->setHeader('AV-Origin-App', $this->originAppHeaderValue);
        }

        if($this->originSdkHeaderValue) {
            $request = $request->setHeader('AV-Origin-Sdk', $this->originSdkHeaderValue);
        }

        $properties = $this->client->request($request, true);

        $this->accessToken = $properties[self::PROP_ACCESS_TOKEN];
    }

    /**
     * @param RequestInterface $request
     *
     * @return RequestInterface
     * @throws ClientExceptionInterface
     */
    public function authenticateRequest(RequestInterface $request): RequestInterface
    {
        if (is_null($this->accessToken) && self::AUTH_PATH !== $request->getUri()->getPath()) {
            $this->authenticate();
        }

        return $request->withHeader(
            'Authorization',
            sprintf('Bearer %s', $this->accessToken)
        );
    }

    /**
     * @param ResponseInterface $response
     *
     * @return bool
     */
    public static function isExpiredAuthTokenResponse(ResponseInterface $response): bool
    {
        return '401' === (string) $response->getStatusCode();
    }
}
