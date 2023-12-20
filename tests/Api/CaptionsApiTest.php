<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Exception\HttpException;
use ApiVideo\Client\Model\CaptionsUpdatePayload;
use SplFileObject;

class CaptionsApiTest extends AbstractApiTest
{
    /**
     * Removes existing data
     */
    public function setUp(): void
    {
        parent::setUp();

        $videos = $this->client->videos()->list([]);
        foreach ($videos->getData() as $video) {
            $captions = $this->client->captions()->list($video->getVideoId());
            foreach ($captions->getData() as $caption) {
                $this->client->captions()->delete($video->getVideoId(), $caption->getSrclang());
            }
            $this->client->videos()->delete($video->getVideoId());
        }
    }

    public function testList()
    {
        $video = (new Helper($this->client))->createVideo();

        foreach (['fr', 'ja', 'en', 'de', 'es'] as $language) {
            $this->client->captions()->upload(
                $video->getVideoId(),
                $language,
                new SplFileObject(__DIR__ . '/../resources/caption.vtt')
            );
        }

        $captions = $this->client->captions()->list($video->getVideoId());

        $this->assertCount(5, $captions->getData());
    }

    /**
     * @covers \ApiVideo\Client\Api\CaptionsApi::upload
     * @covers \ApiVideo\Client\Api\CaptionsApi::update
     * @covers \ApiVideo\Client\Api\CaptionsApi::get
     * @covers \ApiVideo\Client\Api\CaptionsApi::delete
     */
    public function testUpload()
    {
        $video = (new Helper($this->client))->createVideo();

        $caption = $this->client->captions()->upload(
            $video->getVideoId(),
            'en',
            new SplFileObject(__DIR__ . '/../resources/caption.vtt')
        );

        $this->assertNotNull($caption->getUri());
        $this->assertNotNull($caption->getSrc());
        $this->assertFalse($caption->getDefault());

        // Update

        $payload = (new CaptionsUpdatePayload())->setDefault(true);
        $updatedCaption = $this->client->captions()->update($video->getVideoId(), 'en', $payload);

        $this->assertTrue($updatedCaption->getDefault());

        // Get

        $retrievedCaption = $this->client->captions()->get($video->getVideoId(), 'en');
        $this->assertEquals($caption->getUri(), $retrievedCaption->getUri());

        // Get (error : no caption for this language)

        try {
            $this->client->captions()->get($video->getVideoId(), 'fr');
            $this->fail();
        } catch (HttpException $e) {
            $this->assertEquals(404, $e->getCode());
        }

        // Delete

        $this->client->captions()->delete($video->getVideoId(), 'en');

        try {
            $this->client->captions()->get($video->getVideoId(), 'en');
            $this->fail();
        } catch (HttpException $e) {
            $this->assertEquals(404, $e->getCode());
        }
    }
}
