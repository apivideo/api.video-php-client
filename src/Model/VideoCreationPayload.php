<?php

/**
* api.video PHP API client
* api.video is an API that encodes on the go to facilitate immediate playback, enhancing viewer streaming experiences across multiple devices and platforms. You can stream live or on-demand online videos within minutes.
*
* The version of the OpenAPI document: 1
* Contact: ecosystem@api.video
*
* NOTE: This class is auto generated.
* Do not edit the class manually.
*/


namespace ApiVideo\Client\Model;

use ApiVideo\Client\ObjectSerializer;

/**
 * VideoCreationPayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoCreationPayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-creation-payload',
            [
                'title' => 'string',
                'description' => 'string',
                'source' => 'string',
                'public' => 'bool',
                'panoramic' => 'bool',
                'mp4Support' => 'bool',
                'playerId' => 'string',
                'tags' => 'string[]',
                'metadata' => '\ApiVideo\Client\Model\Metadata[]',
                'clip' => '\ApiVideo\Client\Model\VideoClip',
                'watermark' => '\ApiVideo\Client\Model\VideoWatermark'
            ],
            [
                'title' => null,
                'description' => null,
                'source' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null,
                'playerId' => null,
                'tags' => null,
                'metadata' => null,
                'clip' => null,
                'watermark' => null
            ],
            [
                'title' => 'title',
                'description' => 'description',
                'source' => 'source',
                'public' => 'public',
                'panoramic' => 'panoramic',
                'mp4Support' => 'mp4Support',
                'playerId' => 'playerId',
                'tags' => 'tags',
                'metadata' => 'metadata',
                'clip' => 'clip',
                'watermark' => 'watermark'
            ],
            [
                'title' => 'setTitle',
                'description' => 'setDescription',
                'source' => 'setSource',
                'public' => 'setPublic',
                'panoramic' => 'setPanoramic',
                'mp4Support' => 'setMp4Support',
                'playerId' => 'setPlayerId',
                'tags' => 'setTags',
                'metadata' => 'setMetadata',
                'clip' => 'setClip',
                'watermark' => 'setWatermark'
            ],
            [
                'title' => 'getTitle',
                'description' => 'getDescription',
                'source' => 'getSource',
                'public' => 'getPublic',
                'panoramic' => 'getPanoramic',
                'mp4Support' => 'getMp4Support',
                'playerId' => 'getPlayerId',
                'tags' => 'getTags',
                'metadata' => 'getMetadata',
                'clip' => 'getClip',
                'watermark' => 'getWatermark'
            ],
            [
                'title' => null,
                'description' => null,
                'source' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null,
                'playerId' => null,
                'tags' => null,
                'metadata' => null,
                'clip' => null,
                'watermark' => null
            ],
            null
        );
    }


    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['title'] = $data['title'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['source'] = $data['source'] ?? null;
        $this->container['public'] = $data['public'] ?? true;
        $this->container['panoramic'] = $data['panoramic'] ?? false;
        $this->container['mp4Support'] = $data['mp4Support'] ?? true;
        $this->container['playerId'] = $data['playerId'] ?? null;
        $this->container['tags'] = $data['tags'] ?? null;
        $this->container['metadata'] = isset($data['metadata']) ?  array_map(function(array $value): Metadata { return new Metadata($value); }, $data['metadata']) : null;
        $this->container['clip'] = isset($data['clip']) ? new VideoClip($data['clip']) : null;
        $this->container['watermark'] = isset($data['watermark']) ? new VideoWatermark($data['watermark']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['title'] === null) {
            $invalidProperties[] = "'title' can't be null";
        }
        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string $title The title of your new video.
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description A brief description of your video.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source You can either add a video already on the web, by entering the URL of the video, or you can also enter the `videoId` of one of the videos you already have on your api.video acccount, and this will generate a copy of your video. Creating a copy of a video can be especially useful if you want to keep your original video and trim or apply a watermark onto the copy you would create.
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets public
     *
     * @return bool|null
     */
    public function getPublic()
    {
        return $this->container['public'];
    }

    /**
     * Sets public
     *
     * @param bool|null $public Default: True. If set to `false` the video will become private. More information on private videos can be found [here](https://docs.api.video/delivery-analytics/video-privacy-access-management)
     *
     * @return self
     */
    public function setPublic($public)
    {
        $this->container['public'] = $public;

        return $this;
    }

    /**
     * Gets panoramic
     *
     * @return bool|null
     */
    public function getPanoramic()
    {
        return $this->container['panoramic'];
    }

    /**
     * Sets panoramic
     *
     * @param bool|null $panoramic Indicates if your video is a 360/immersive video.
     *
     * @return self
     */
    public function setPanoramic($panoramic)
    {
        $this->container['panoramic'] = $panoramic;

        return $this;
    }

    /**
     * Gets mp4Support
     *
     * @return bool|null
     */
    public function getMp4Support()
    {
        return $this->container['mp4Support'];
    }

    /**
     * Sets mp4Support
     *
     * @param bool|null $mp4Support Enables mp4 version in addition to streamed version.
     *
     * @return self
     */
    public function setMp4Support($mp4Support)
    {
        $this->container['mp4Support'] = $mp4Support;

        return $this;
    }

    /**
     * Gets playerId
     *
     * @return string|null
     */
    public function getPlayerId()
    {
        return $this->container['playerId'];
    }

    /**
     * Sets playerId
     *
     * @param string|null $playerId The unique identification number for your video player.
     *
     * @return self
     */
    public function setPlayerId($playerId)
    {
        $this->container['playerId'] = $playerId;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return string[]|null
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string[]|null $tags A list of tags you want to use to describe your video.
     *
     * @return self
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return \ApiVideo\Client\Model\Metadata[]|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param \ApiVideo\Client\Model\Metadata[]|null $metadata A list of key value pairs that you use to provide metadata for your video. These pairs can be made dynamic, allowing you to segment your audience. Read more on [dynamic metadata](https://api.video/blog/endpoints/dynamic-metadata/).
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets clip
     *
     * @return \ApiVideo\Client\Model\VideoClip|null
     */
    public function getClip()
    {
        return $this->container['clip'];
    }

    /**
     * Sets clip
     *
     * @param \ApiVideo\Client\Model\VideoClip|null $clip clip
     *
     * @return self
     */
    public function setClip($clip)
    {
        $this->container['clip'] = $clip;

        return $this;
    }

    /**
     * Gets watermark
     *
     * @return \ApiVideo\Client\Model\VideoWatermark|null
     */
    public function getWatermark()
    {
        return $this->container['watermark'];
    }

    /**
     * Sets watermark
     *
     * @param \ApiVideo\Client\Model\VideoWatermark|null $watermark watermark
     *
     * @return self
     */
    public function setWatermark($watermark)
    {
        $this->container['watermark'] = $watermark;

        return $this;
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
       return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }
}


