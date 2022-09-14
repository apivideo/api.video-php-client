<?php declare(strict_types = 1);

namespace ApiVideo\Client\Tests\Api;

/**
 * Note : Unable to test `listSessionEvents`
 */
class RawStatisticsApiTest extends AbstractApiTest
{
    public function testListLiveStreamSessions()
    {
        $liveStream = (new Helper($this->client))->createLiveStream();

        $response = $this->client->rawStatistics()->listLiveStreamSessions($liveStream->getLiveStreamId(), ['period' => '2022-01']);

        $this->assertCount(0, $response->getData());
    }

    public function testListVideoSessions()
    {
        $video = (new Helper($this->client))->createVideo();

        $response = $this->client->rawStatistics()->listVideoSessions($video->getVideoId(), ['period' => '2022-01']);

        $this->assertCount(0, $response->getData());
    }
}
