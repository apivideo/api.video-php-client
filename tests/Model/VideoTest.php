<?php declare(strict_types=1);

namespace ApiVideo\Client\Tests\Api;

use ApiVideo\Client\Model\Metadata;
use ApiVideo\Client\Model\Video;
use PHPUnit\Framework\TestCase;

class VideoTest extends TestCase
{
    public function testDeserialization()
    {
        $json = json_decode(VIDEO_JSON, true);
        $video = new Video($json);

        $this->assertEquals("vi4k0jvEUuaTdRAEjQ4Jfrgz", $video->getVideoId());
        $this->assertEquals("pl45KFKdlddgk654dspkze", $video->getPlayerId());
        $this->assertEquals("Maths video", $video->getTitle());
        $this->assertEquals("An amazing video explaining string theory", $video->getDescription());
        $this->assertEquals(false, $video->getPublic());
        $this->assertEquals(false, $video->getPanoramic());
        $this->assertEquals(true, $video->getMp4Support());
        $this->assertEquals(array("maths", "string theory", "video"), $video->getTags());
        $this->assertEquals(array(new Metadata(["key" => "Author", "value" => "John Doe"]), new Metadata(["key" =>"Format", "value" => "Tutorial"])), $video->getMetadata());
        $this->assertEquals(new \DateTime("2019-12-16T08:25:51+00:00"), $video->getPublishedAt());
        $this->assertEquals(new \DateTime("2019-12-16T08:48:49+00:00"), $video->getUpdatedAt());
        $this->assertEquals("/videos/vi4k0jvEUuaTdRAEjQ4Jfrgz/source", $video->getSource()->getUri());
        $this->assertEquals("/videos/vi4k0jvEUuaTdRAEjQ4Jfrgz/source", $video->getSource()->getUri());
        $this->assertEquals("<iframe src=\"//embed.api.video/vi4k0jvEUuaTdRAEjQ4Jfrgz?token=831a9bd9-9f50-464c-a369-8e9d914371ae\" width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"\"></iframe>", $video->getAssets()->getIframe());
        $this->assertEquals("https://embed.api.video/vi4k0jvEUuaTdRAEjQ4Jfrgz?token=831a9bd9-9f50-464c-a369-8e9d914371ae", $video->getAssets()->getPlayer());
        $this->assertEquals("https://cdn.api.video/stream/831a9bd9-9f50-464c-a369-8e9d914371ae/hls/manifest.m3u8", $video->getAssets()->getHls());
        $this->assertEquals("https://cdn.api.video/stream/831a9bd9-9f50-464c-a369-8e9d914371ae/thumbnail.jpg", $video->getAssets()->getThumbnail());
        $this->assertEquals("https://cdn.api.video/vod/vi4k0jvEUuaTdRAEjQ4Jfrgz/token/8fd70443-d9f0-45d2-b01c-12c8cfc707c9/mp4/720/source.mp4", $video->getAssets()->getMp4());

        $this->assertEquals(json_decode(json_encode($video->jsonSerialize()), TRUE), $json);
    }

}


const VIDEO_JSON = <<<JSON
{
  "videoId" : "vi4k0jvEUuaTdRAEjQ4Jfrgz",
  "playerId" : "pl45KFKdlddgk654dspkze",
  "title" : "Maths video",
  "description" : "An amazing video explaining string theory",
  "public" : false,
  "panoramic" : false,
  "mp4Support" : true,
  "tags" : [ "maths", "string theory", "video" ],
  "metadata" : [ {
    "key" : "Author",
    "value" : "John Doe"
  }, {
    "key" : "Format",
    "value" : "Tutorial"
  } ],
  "publishedAt" : "2019-12-16T08:25:51+00:00",
  "updatedAt" : "2019-12-16T08:48:49+00:00",
  "source" : {
    "uri" : "/videos/vi4k0jvEUuaTdRAEjQ4Jfrgz/source"
  },
  "assets" : {
    "iframe" : "<iframe src=\"//embed.api.video/vi4k0jvEUuaTdRAEjQ4Jfrgz?token=831a9bd9-9f50-464c-a369-8e9d914371ae\" width=\"100%\" height=\"100%\" frameborder=\"0\" scrolling=\"no\" allowfullscreen=\"\"></iframe>",
    "player" : "https://embed.api.video/vi4k0jvEUuaTdRAEjQ4Jfrgz?token=831a9bd9-9f50-464c-a369-8e9d914371ae",
    "hls" : "https://cdn.api.video/stream/831a9bd9-9f50-464c-a369-8e9d914371ae/hls/manifest.m3u8",
    "thumbnail" : "https://cdn.api.video/stream/831a9bd9-9f50-464c-a369-8e9d914371ae/thumbnail.jpg",
    "mp4" : "https://cdn.api.video/vod/vi4k0jvEUuaTdRAEjQ4Jfrgz/token/8fd70443-d9f0-45d2-b01c-12c8cfc707c9/mp4/720/source.mp4"
  }
}
JSON;
