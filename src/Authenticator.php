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
     * @param BaseClient $client
     * @param string     $apiKey
     */
    public function __construct(BaseClient $client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
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
            ],
            json_encode(['apiKey' => $this->apiKey])
        );

        $properties = $this->client->request($request);

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
