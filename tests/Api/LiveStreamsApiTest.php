<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Model\LiveStreamCreationPayload;
use ApiVideo\Client\Model\LiveStreamUpdatePayload;
use SplFileObject;

class LiveStreamsApiTest extends AbstractApiTest
{
    /**
     * Removes existing data
     */
    public function setUp(): void
    {
        parent::setUp();

        $liveStreams = $this->client->liveStreams()->list();
        foreach ($liveStreams->getData() as $liveStream) {
            $this->client->liveStreams()->delete($liveStream->getLiveStreamId());
        }
    }

    public function testDelete()
    {
        $liveStreams = $this->client->liveStreams()->list();
        $this->assertCount(0, $liveStreams->getData());

        $createdLiveStream = (new Helper($this->client))->createLiveStream();

        $liveStreams = $this->client->liveStreams()->list();
        $this->assertCount(1, $liveStreams->getData());

        $this->client->liveStreams()->delete($createdLiveStream->getLiveStreamId());

        $liveStreams = $this->client->liveStreams()->list();
        $this->assertCount(0, $liveStreams->getData());
    }

    public function testList()
    {
        for ($i = 0; $i < 5; $i++) {
            (new Helper($this->client))->createLiveStream();
        }

        $liveStreams = $this->client->liveStreams()->list();

        $this->assertCount(5, $liveStreams->getData());
    }

    public function testGet()
    {
        $liveStreamId = (new Helper($this->client))->createLiveStream()->getLiveStreamId();

        $liveStream = $this->client->liveStreams()->get($liveStreamId);

        $this->assertEquals($liveStreamId, $liveStream->getLiveStreamId());
    }

    public function testUpdate()
    {
        $payload = new LiveStreamCreationPayload();
        $payload
            ->setName('Test live stream')
            ->setPublic(false)
            ->setRecord(true)
        ;

        $liveStream = $this->client->liveStreams()->create($payload);

        $this->assertEquals('Test live stream', $liveStream->getName());
        $this->assertEquals(false, $liveStream->getPublic());
        $this->assertEquals(true, $liveStream->getRecord());

        $payload = new LiveStreamUpdatePayload();
        $payload
            ->setName('New name')
            ->setPublic(true)
            ->setRecord(false)
        ;

        $liveStream = $this->client->liveStreams()->update($liveStream->getLiveStreamId(), $payload);

        $this->assertEquals('New name', $liveStream->getName());
        $this->assertEquals(true, $liveStream->getPublic());
        $this->assertEquals(false, $liveStream->getRecord());
    }

    public function testCreate()
    {
        $liveStream = (new Helper($this->client))->createLiveStream();

        $this->assertNotNull($liveStream->getLiveStreamId());
    }

    /**
     * @covers \ApiVideo\Client\Api\LiveStreamsApi::uploadThumbnail
     * @covers \ApiVideo\Client\Api\LiveStreamsApi::deleteThumbnail
     *
     * The file sent may take a long time to be available online,
     * so we only test the return of the request and not the presence
     * or absence of the file online.
     */
    public function testUploadThumbnail()
    {
        $liveStreamId = (new Helper($this->client))->createLiveStream()->getLiveStreamId();

        $liveStream = $this->client->liveStreams()->uploadThumbnail(
            $liveStreamId,
            new SplFileObject(__DIR__ . '/../resources/thumbnail.jpeg')
        );

        $this->assertEquals('thumbnail.jpg', basename($liveStream->getAssets()->getThumbnail()));

        // Delete thumbnail

        $this->client->liveStreams()->deleteThumbnail($liveStreamId);

        $liveStream = $this->client->liveStreams()->get($liveStreamId);

        $this->assertEquals('thumbnail.jpg', basename($liveStream->getAssets()->getThumbnail()));
    }
}
