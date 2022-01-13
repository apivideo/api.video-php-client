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
 * Video Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Video implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video',
            [
                'videoId' => 'string',
                'createdAt' => '\DateTime',
                'title' => 'string',
                'description' => 'string',
                'publishedAt' => 'string',
                'updatedAt' => '\DateTime',
                'tags' => 'string[]',
                'metadata' => '\ApiVideo\Client\Model\Metadata[]',
                'source' => '\ApiVideo\Client\Model\VideoSource',
                'assets' => '\ApiVideo\Client\Model\VideoAssets',
                'playerId' => 'string',
                'public' => 'bool',
                'panoramic' => 'bool',
                'mp4Support' => 'bool'
            ],
            [
                'videoId' => null,
                'createdAt' => 'date-time',
                'title' => null,
                'description' => null,
                'publishedAt' => null,
                'updatedAt' => 'date-time',
                'tags' => null,
                'metadata' => null,
                'source' => null,
                'assets' => null,
                'playerId' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null
            ],
            [
                'videoId' => 'videoId',
                'createdAt' => 'createdAt',
                'title' => 'title',
                'description' => 'description',
                'publishedAt' => 'publishedAt',
                'updatedAt' => 'updatedAt',
                'tags' => 'tags',
                'metadata' => 'metadata',
                'source' => 'source',
                'assets' => 'assets',
                'playerId' => 'playerId',
                'public' => 'public',
                'panoramic' => 'panoramic',
                'mp4Support' => 'mp4Support'
            ],
            [
                'videoId' => 'setVideoId',
                'createdAt' => 'setCreatedAt',
                'title' => 'setTitle',
                'description' => 'setDescription',
                'publishedAt' => 'setPublishedAt',
                'updatedAt' => 'setUpdatedAt',
                'tags' => 'setTags',
                'metadata' => 'setMetadata',
                'source' => 'setSource',
                'assets' => 'setAssets',
                'playerId' => 'setPlayerId',
                'public' => 'setPublic',
                'panoramic' => 'setPanoramic',
                'mp4Support' => 'setMp4Support'
            ],
            [
                'videoId' => 'getVideoId',
                'createdAt' => 'getCreatedAt',
                'title' => 'getTitle',
                'description' => 'getDescription',
                'publishedAt' => 'getPublishedAt',
                'updatedAt' => 'getUpdatedAt',
                'tags' => 'getTags',
                'metadata' => 'getMetadata',
                'source' => 'getSource',
                'assets' => 'getAssets',
                'playerId' => 'getPlayerId',
                'public' => 'getPublic',
                'panoramic' => 'getPanoramic',
                'mp4Support' => 'getMp4Support'
            ],
            [
                'videoId' => null,
                'createdAt' => null,
                'title' => null,
                'description' => null,
                'publishedAt' => null,
                'updatedAt' => null,
                'tags' => null,
                'metadata' => null,
                'source' => null,
                'assets' => null,
                'playerId' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null
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
        $this->container['videoId'] = $data['videoId'] ?? null;
        $this->container['createdAt'] = isset($data['createdAt']) ? new \DateTime($data['createdAt']) : null;
        $this->container['title'] = $data['title'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['publishedAt'] = $data['publishedAt'] ?? null;
        $this->container['updatedAt'] = isset($data['updatedAt']) ? new \DateTime($data['updatedAt']) : null;
        $this->container['tags'] = $data['tags'] ?? null;
        $this->container['metadata'] = isset($data['metadata']) ?  array_map(function(array $value): Metadata { return new Metadata($value); }, $data['metadata']) : null;
        $this->container['source'] = isset($data['source']) ? new VideoSource($data['source']) : null;
        $this->container['assets'] = isset($data['assets']) ? new VideoAssets($data['assets']) : null;
        $this->container['playerId'] = $data['playerId'] ?? null;
        $this->container['public'] = $data['public'] ?? null;
        $this->container['panoramic'] = $data['panoramic'] ?? null;
        $this->container['mp4Support'] = $data['mp4Support'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['videoId'] === null) {
            $invalidProperties[] = "'videoId' can't be null";
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
     * Gets videoId
     *
     * @return string
     */
    public function getVideoId()
    {
        return $this->container['videoId'];
    }

    /**
     * Sets videoId
     *
     * @param string $videoId The unique identifier of the video object.
     *
     * @return self
     */
    public function setVideoId($videoId)
    {
        $this->container['videoId'] = $videoId;

        return $this;
    }

    /**
     * Gets createdAt
     *
     * @return \DateTime|null
     */
    public function getCreatedAt()
    {
        return $this->container['createdAt'];
    }

    /**
     * Sets createdAt
     *
     * @param \DateTime|null $createdAt When a video was created, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string|null $title The title of the video content.
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
     * @param string|null $description A description for the video content.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets publishedAt
     *
     * @return string|null
     */
    public function getPublishedAt()
    {
        return $this->container['publishedAt'];
    }

    /**
     * Sets publishedAt
     *
     * @param string|null $publishedAt The date and time the API created the video. Date and time are provided using ISO-8601 UTC format.
     *
     * @return self
     */
    public function setPublishedAt($publishedAt)
    {
        $this->container['publishedAt'] = $publishedAt;

        return $this;
    }

    /**
     * Gets updatedAt
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updatedAt'];
    }

    /**
     * Sets updatedAt
     *
     * @param \DateTime|null $updatedAt The date and time the video was updated. Date and time are provided using ISO-8601 UTC format.
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->container['updatedAt'] = $updatedAt;

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
     * @param string[]|null $tags One array of tags (each tag is a string) in order to categorize a video. Tags may include spaces.
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
     * @param \ApiVideo\Client\Model\Metadata[]|null $metadata Metadata you can use to categorise and filter videos. Metadata is a list of dictionaries, where each dictionary represents a key value pair for categorising a video. [Dynamic Metadata](https://api.video/blog/endpoints/dynamic-metadata) allows you to define a key that allows any value pair.
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets source
     *
     * @return \ApiVideo\Client\Model\VideoSource|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param \ApiVideo\Client\Model\VideoSource|null $source source
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets assets
     *
     * @return \ApiVideo\Client\Model\VideoAssets|null
     */
    public function getAssets()
    {
        return $this->container['assets'];
    }

    /**
     * Sets assets
     *
     * @param \ApiVideo\Client\Model\VideoAssets|null $assets assets
     *
     * @return self
     */
    public function setAssets($assets)
    {
        $this->container['assets'] = $assets;

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
     * @param string|null $playerId The id of the player that will be applied on the video.
     *
     * @return self
     */
    public function setPlayerId($playerId)
    {
        $this->container['playerId'] = $playerId;

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
     * @param bool|null $public Defines if the content is publicly reachable or if a unique token is needed for each play session. Default is true. Tutorials on [private videos](https://api.video/blog/endpoints/private-videos).
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
     * @param bool|null $panoramic Defines if video is panoramic.
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
     * @param bool|null $mp4Support This lets you know whether mp4 is supported. If enabled, an mp4 URL will be provided in the response for the video.
     *
     * @return self
     */
    public function setMp4Support($mp4Support)
    {
        $this->container['mp4Support'] = $mp4Support;

        return $this;
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     * @link https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed Returns data which can be serialized by json_encode(), which is a value
     * of any type other than a resource.
     */
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


