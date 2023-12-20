<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Exception\HttpException;
use SplFileObject;

class ChaptersApiTest extends AbstractApiTest
{
    /**
     * Removes existing data
     */
    public function setUp(): void
    {
        parent::setUp();

        $videos = $this->client->videos()->list([]);
        foreach ($videos->getData() as $video) {
            $chapters = $this->client->chapters()->list($video->getVideoId());
            foreach ($chapters->getData() as $chapter) {
                $this->client->chapters()->delete($video->getVideoId(), $chapter->getLanguage());
            }
            $this->client->videos()->delete($video->getVideoId());
        }
    }

    public function testList()
    {
        $video = (new Helper($this->client))->createVideo();

        foreach (['fr', 'ja', 'en', 'de', 'es'] as $language) {
            $this->client->chapters()->upload(
                $video->getVideoId(),
                $language,
                new SplFileObject(__DIR__ . '/../resources/chapters.vtt')
            );
        }

        $chapters = $this->client->chapters()->list($video->getVideoId());

        $this->assertCount(5, $chapters->getData());
    }

    /**
     * @covers \ApiVideo\Client\Api\ChaptersApi::upload
     * @covers \ApiVideo\Client\Api\ChaptersApi::get
     * @covers \ApiVideo\Client\Api\ChaptersApi::delete
     */
    public function testUpload()
    {
        $video = (new Helper($this->client))->createVideo();

        $chapter = $this->client->chapters()->upload(
            $video->getVideoId(),
            'en',
            new SplFileObject(__DIR__ . '/../resources/chapters.vtt')
        );

        $this->assertNotNull($chapter->getUri());
        $this->assertNotNull($chapter->getSrc());
        $this->assertEquals('en', $chapter->getLanguage());

        // Get

        $retrievedChapter = $this->client->chapters()->get($video->getVideoId(), 'en');
        $this->assertEquals($chapter->getUri(), $retrievedChapter->getUri());

        // Get (error : no chapter for this language)

        try {
            $this->client->chapters()->get($video->getVideoId(), 'fr');
            $this->fail();
        } catch (HttpException $e) {
            $this->assertEquals(404, $e->getCode());
        }

        // Delete

        $this->client->chapters()->delete($video->getVideoId(), 'en');

        try {
            $this->client->chapters()->get($video->getVideoId(), 'en');
            $this->fail();
        } catch (HttpException $e) {
            $this->assertEquals(404, $e->getCode());
        }
    }
}
