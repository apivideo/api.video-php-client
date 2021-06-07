<?php

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Client;
use ApiVideo\Client\Model\LiveStream;
use ApiVideo\Client\Model\LiveStreamCreationPayload;
use ApiVideo\Client\Model\TokenCreationPayload;
use ApiVideo\Client\Model\UploadToken;
use ApiVideo\Client\Model\Video;
use ApiVideo\Client\Model\VideoCreationPayload;

class Helper
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function createUploadToken(int $ttl = 0): UploadToken
    {
        $payload = (new TokenCreationPayload())
            ->setTtl($ttl);

        return $this->client->uploadTokens()->createToken($payload);
    }

    public function createLiveStream(): LiveStream
    {
        $payload = (new LiveStreamCreationPayload())
            ->setName('Test live stream');

        return $this->client->liveStreams()->create($payload);
    }

    public function createVideo(): Video
    {
        $payload = (new VideoCreationPayload())
            ->setTitle('Test video creation');

        return $this->client->videos()->create($payload);
    }
}
