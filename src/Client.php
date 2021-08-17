<?php declare(strict_types = 1);

namespace ApiVideo\Client;

use ApiVideo\Client\Service\ServiceInterface;
use ApiVideo\Client\Service\VideoService;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestFactoryInterface;
use Psr\Http\Message\StreamFactoryInterface;

const MIN_CHUNK_SIZE = 5 * 1024 * 1024;
const MAX_CHUNK_SIZE = 128 * 1024 * 1024;
const DEFAULT_CHUNK_SIZE = 50 * 1024 * 1024;

/**
 * Api.video client
 */
class Client
{
    /**
     * @var BaseClient
     */
    private $baseClient;

    /**
     * @var ServiceInterface[]
     */
    private $services = [];

    /**
     * @param string                       $baseUri
     * @param string|null                  $apiKey
     * @param ClientInterface              $httpClient
     * @param RequestFactoryInterface|null $requestFactory
     * @param StreamFactoryInterface|null  $streamFactory
     * @param int|null                     $chunkSize
     */
    public function __construct(string $baseUri, ?string $apiKey, ClientInterface $httpClient, ?RequestFactoryInterface $requestFactory = null, ?StreamFactoryInterface $streamFactory = null, ?int $chunkSize = DEFAULT_CHUNK_SIZE)
    {
        if ($httpClient instanceof RequestFactoryInterface) {
            $requestFactory = $httpClient;
        }

        if ($httpClient instanceof StreamFactoryInterface) {
            $streamFactory = $httpClient;
        }

        if($chunkSize < MIN_CHUNK_SIZE || $chunkSize > MAX_CHUNK_SIZE) {
            throw new \InvalidArgumentException('Invalid chunk size value. Must be greater than $MIN_CHUNK_SIZE bytes and lower than $MAX_CHUNK_SIZE bytes.');
        }

        $this->baseClient = new BaseClient($baseUri, $apiKey, $httpClient, $requestFactory, $streamFactory, $chunkSize);
    }

    
    /**
     * @return \ApiVideo\Client\Api\CaptionsApi
     */
    public function captions(): \ApiVideo\Client\Api\CaptionsApi
    {
        if (!array_key_exists('captions', $this->services)) {
            $this->services['captions'] = new \ApiVideo\Client\Api\CaptionsApi($this->baseClient);
        }

        return $this->services['captions'];
    }
    
    /**
     * @return \ApiVideo\Client\Api\ChaptersApi
     */
    public function chapters(): \ApiVideo\Client\Api\ChaptersApi
    {
        if (!array_key_exists('chapters', $this->services)) {
            $this->services['chapters'] = new \ApiVideo\Client\Api\ChaptersApi($this->baseClient);
        }

        return $this->services['chapters'];
    }
    
    /**
     * @return \ApiVideo\Client\Api\LiveStreamsApi
     */
    public function liveStreams(): \ApiVideo\Client\Api\LiveStreamsApi
    {
        if (!array_key_exists('liveStreams', $this->services)) {
            $this->services['liveStreams'] = new \ApiVideo\Client\Api\LiveStreamsApi($this->baseClient);
        }

        return $this->services['liveStreams'];
    }
    
    /**
     * @return \ApiVideo\Client\Api\PlayerThemesApi
     */
    public function playerThemes(): \ApiVideo\Client\Api\PlayerThemesApi
    {
        if (!array_key_exists('playerThemes', $this->services)) {
            $this->services['playerThemes'] = new \ApiVideo\Client\Api\PlayerThemesApi($this->baseClient);
        }

        return $this->services['playerThemes'];
    }
    
    /**
     * @return \ApiVideo\Client\Api\RawStatisticsApi
     */
    public function rawStatistics(): \ApiVideo\Client\Api\RawStatisticsApi
    {
        if (!array_key_exists('rawStatistics', $this->services)) {
            $this->services['rawStatistics'] = new \ApiVideo\Client\Api\RawStatisticsApi($this->baseClient);
        }

        return $this->services['rawStatistics'];
    }
    
    /**
     * @return \ApiVideo\Client\Api\UploadTokensApi
     */
    public function uploadTokens(): \ApiVideo\Client\Api\UploadTokensApi
    {
        if (!array_key_exists('uploadTokens', $this->services)) {
            $this->services['uploadTokens'] = new \ApiVideo\Client\Api\UploadTokensApi($this->baseClient);
        }

        return $this->services['uploadTokens'];
    }
    
    /**
     * @return \ApiVideo\Client\Api\VideosApi
     */
    public function videos(): \ApiVideo\Client\Api\VideosApi
    {
        if (!array_key_exists('videos', $this->services)) {
            $this->services['videos'] = new \ApiVideo\Client\Api\VideosApi($this->baseClient);
        }

        return $this->services['videos'];
    }
    
    /**
     * @return \ApiVideo\Client\Api\WebhooksApi
     */
    public function webhooks(): \ApiVideo\Client\Api\WebhooksApi
    {
        if (!array_key_exists('webhooks', $this->services)) {
            $this->services['webhooks'] = new \ApiVideo\Client\Api\WebhooksApi($this->baseClient);
        }

        return $this->services['webhooks'];
    }
    
}
