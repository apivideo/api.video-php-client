<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Client;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpClient\Psr18Client;

abstract class AbstractApiTest extends TestCase
{
    /**
     * @var Client
     */
    protected $client;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        $httpClient = new Psr18Client();

        $this->client = new Client(
            $_ENV['BASE_URI'],
            $_ENV['API_KEY'],
            $httpClient
        );
        
        $this->client->setApplicationName("client-integration-tests");
    }
}
