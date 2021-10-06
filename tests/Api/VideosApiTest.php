<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Client;
use ApiVideo\Client\Model\VideoCreationPayload;
use ApiVideo\Client\Model\VideosListResponse;
use ApiVideo\Client\Model\VideoThumbnailPickPayload;
use ApiVideo\Client\Model\VideoUpdatePayload;
use ApiVideo\Client\Model\Metadata;
use SplFileObject;
use Symfony\Component\HttpClient\Psr18Client;

class VideosApiTest extends AbstractApiTest
{
    /**
     * Removes existing videos
     */
    public function setUp(): void
    {
        parent::setUp();

        $videos = $this->client->videos()->list([]);
        foreach ($videos->getData() as $video) {
            $this->client->videos()->delete($video->getVideoId());
        }
    }

    public function testCreate()
    {
        $payload = (new VideoCreationPayload())
            ->setTitle('Test video creation')
            ->setDescription('Test description');

        $video = $this->client->videos()->create($payload);

        $this->assertNotNull($video->getVideoId());
        $this->assertEquals('Test video creation', $video->getTitle());
        $this->assertEquals('Test description', $video->getDescription());
    }

    /**
     * @covers \ApiVideo\Client\Api\VideosApi::upload
     * @covers \ApiVideo\Client\Api\VideosApi::pickThumbnail
     * @covers \ApiVideo\Client\Api\VideosApi::getStatus
     */
    public function testUpload()
    {
        $createdVideo = $this->client->videos()->create((new VideoCreationPayload())->setTitle('Test video upload'));
        $uploadedVideo = $this->client->videos()->upload(
            $createdVideo->getVideoId(),
            new SplFileObject(__DIR__ . '/../resources/558k.mp4')
        );

        $this->assertNotNull($uploadedVideo->getAssets()->getPlayer());

        // Pick thumbnail

        $payload = (new VideoThumbnailPickPayload())
            ->setTimecode('00:00:09.000');

        $pickedThumbnailVideo = $this->client->videos()->pickThumbnail($uploadedVideo->getVideoId(), $payload);

        $this->assertNotNull($uploadedVideo->getVideoId(), $pickedThumbnailVideo->getVideoId());

        // Get status

        $videoStatus = $this->client->videos()->getStatus($uploadedVideo->getVideoId());

        $this->assertContains($videoStatus->getIngest()->getStatus(), ['uploaded', 'uploading']);
    }

    public function testTags() {
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video A'));
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video B')
            ->setTags(array("TAG1","TAG2")));
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video C')
            ->setTags(array("TAG2")));

        $videos = $this->client->videos()->list(['tags' => 'TAG2,TAG1']);
        $this->assertCount(1, $videos->getData());
        $this->assertEquals('Video B', $videos->getData()[0]->getTitle());

        $videos = $this->client->videos()->list(['tags' => ['TAG2','TAG1']]);
        $this->assertCount(1, $videos->getData());
        $this->assertEquals('Video B', $videos->getData()[0]->getTitle());

        $videos = $this->client->videos()->list(['tags' => ['TAG2']]);
        $this->assertCount(2, $videos->getData());

        $videos = $this->client->videos()->list(['tags' => 'TAG2']);
        $this->assertCount(2, $videos->getData());
    }

    public function testMetadata() {
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video A'));
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video B')
            ->setMetadata(array(
                new Metadata(['key' => 'key1', 'value' => 'key1value1']),
                new Metadata(['key' => 'key2', 'value' => 'key2value1']))));
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video C')
            ->setMetadata(array(new Metadata(['key' => 'key1', 'value' => 'key1value1']))));

        $videos = $this->client->videos()->list(['metadata' => ['key1' => 'key1value1']]);
        $this->assertCount(2, $videos->getData());

        $videos = $this->client->videos()->list(['metadata' => ['key2' => 'key2value1']]);
        $this->assertCount(1, $videos->getData());
        $this->assertEquals('Video B', $videos->getData()[0]->getTitle());

        $videos = $this->client->videos()->list(['metadata' => ['key1' => 'key1value1', 'key2' => 'key2value1']]);
        $this->assertCount(1, $videos->getData());
        $this->assertEquals('Video B', $videos->getData()[0]->getTitle());
    }

    public function testList()
    {
        /** @var VideosListResponse $videos */
        $videos = $this->client->videos()->list([]);
        $this->assertCount(0, $videos->getData());

        $this->client->videos()->create((new VideoCreationPayload())->setTitle('Video A'));
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video B')
            ->setMetadata(array(new Metadata(['key' => 'k', 'value' => 'v']))));
        $this->client->videos()->create((new VideoCreationPayload())
            ->setTitle('Video C')
            ->setMetadata(array(new Metadata(['key' => 'k', 'value' => 'v']))));

        $videos = $this->client->videos()->list([]);
        $this->assertCount(3, $videos->getData());

        // Title filter

        $videos = $this->client->videos()->list(['title' => 'A']);
        $this->assertCount(1, $videos->getData());

        $videos = $this->client->videos()->list(['title' => 'Video']);
        $this->assertCount(3, $videos->getData());

        // Sorting asc

        $videos = $this->client->videos()->list(['sortBy' => 'title', 'sortOrder' => 'asc']);
        $this->assertEquals('Video A', $videos->getData()[0]->getTitle());
        $this->assertEquals('Video B', $videos->getData()[1]->getTitle());
        $this->assertEquals('Video C', $videos->getData()[2]->getTitle());

        // Sorting desc

        $videos = $this->client->videos()->list(['sortBy' => 'title', 'sortOrder' => 'desc', 'metadata' => ['k' => 'v']]);
        $this->assertCount(2, $videos->getData());
        $this->assertEquals('Video C', $videos->getData()[0]->getTitle());
        $this->assertEquals('Video B', $videos->getData()[1]->getTitle());
    }

    public function testGet()
    {
        $payload = (new VideoCreationPayload())
            ->setTitle('Test video creation')
            ->setDescription('Test description');

        $videoId = $this->client->videos()->create($payload)->getVideoId();

        $video = $this->client->videos()->get($videoId);

        $this->assertEquals('Test video creation', $video->getTitle());
        $this->assertEquals('Test description', $video->getDescription());
    }

    public function testUpdate()
    {
        $payload = (new VideoCreationPayload())
            ->setTitle('Test video creation')
            ->setDescription('Test description');
        $videoId = $this->client->videos()->create($payload)->getVideoId();

        $payload = (new VideoUpdatePayload())
            ->setTitle('Title second version')
            ->setDescription('Description second version');
        $video = $this->client->videos()->update($videoId, $payload);

        $this->assertEquals('Title second version', $video->getTitle());
        $this->assertEquals('Description second version', $video->getDescription());
    }

    public function testUploadThumbnail()
    {
        $payload = (new VideoCreationPayload())
            ->setTitle('Test video creation')
            ->setDescription('Test description');
        $videoId = $this->client->videos()->create($payload)->getVideoId();

        $video = $this->client->videos()->uploadThumbnail(
            $videoId,
            new SplFileObject(__DIR__ . '/../resources/thumbnail.jpeg')
        );

        $this->assertEquals('thumbnail.jpg', basename($video->getAssets()->getThumbnail()));
    }

    public function testUploadWithUploadToken()
    {
        $token = (new Helper($this->client))->createUploadToken();

        // No authorization needed for this endpoint
        $client = new Client(
            $_ENV['BASE_URI'],
            null,
            new Psr18Client()
        );

        $uploadedVideo = $client->videos()->uploadWithUploadToken(
            $token->getToken(),
            new SplFileObject(__DIR__ . '/../resources/558k.mp4')
        );

        $this->assertNotNull($uploadedVideo->getAssets()->getPlayer());
    }
}
