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
 * VideoUpdatePayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoUpdatePayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-update-payload',
            [
                'playerId' => 'string',
                'title' => 'string',
                'description' => 'string',
                'public' => 'bool',
                'panoramic' => 'bool',
                'mp4Support' => 'bool',
                'tags' => 'string[]',
                'metadata' => '\ApiVideo\Client\Model\Metadata[]'
            ],
            [
                'playerId' => null,
                'title' => null,
                'description' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null,
                'tags' => null,
                'metadata' => null
            ],
            [
                'playerId' => 'playerId',
                'title' => 'title',
                'description' => 'description',
                'public' => 'public',
                'panoramic' => 'panoramic',
                'mp4Support' => 'mp4Support',
                'tags' => 'tags',
                'metadata' => 'metadata'
            ],
            [
                'playerId' => 'setPlayerId',
                'title' => 'setTitle',
                'description' => 'setDescription',
                'public' => 'setPublic',
                'panoramic' => 'setPanoramic',
                'mp4Support' => 'setMp4Support',
                'tags' => 'setTags',
                'metadata' => 'setMetadata'
            ],
            [
                'playerId' => 'getPlayerId',
                'title' => 'getTitle',
                'description' => 'getDescription',
                'public' => 'getPublic',
                'panoramic' => 'getPanoramic',
                'mp4Support' => 'getMp4Support',
                'tags' => 'getTags',
                'metadata' => 'getMetadata'
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
        $this->container['playerId'] = $data['playerId'] ?? null;
        $this->container['title'] = $data['title'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['public'] = $data['public'] ?? null;
        $this->container['panoramic'] = $data['panoramic'] ?? null;
        $this->container['mp4Support'] = $data['mp4Support'] ?? null;
        $this->container['tags'] = $data['tags'] ?? null;
        $this->container['metadata'] = isset($data['metadata']) ?  array_map(function(array $value): Metadata { return new Metadata($value); }, $data['metadata']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * @param string|null $playerId The unique ID for the player you want to associate with your video.
     *
     * @return self
     */
    public function setPlayerId($playerId)
    {
        $this->container['playerId'] = $playerId;

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
     * @param string|null $title The title you want to use for your video.
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
     * @param string|null $description A brief description of the video.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

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
     * @param bool|null $public Whether the video is publicly available or not. False means it is set to private. Default is true. Tutorials on [private videos](https://api.video/blog/endpoints/private-videos).
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
     * @param bool|null $panoramic Whether the video is a 360 degree or immersive video.
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
     * @param bool|null $mp4Support Whether the player supports the mp4 format.
     *
     * @return self
     */
    public function setMp4Support($mp4Support)
    {
        $this->container['mp4Support'] = $mp4Support;

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
     * @param string[]|null $tags A list of terms or words you want to tag the video with. Make sure the list includes all the tags you want as whatever you send in this list will overwrite the existing list for the video.
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
     * @param \ApiVideo\Client\Model\Metadata[]|null $metadata A list (array) of dictionaries where each dictionary contains a key value pair that describes the video. As with tags, you must send the complete list of metadata you want as whatever you send here will overwrite the existing metadata for the video. [Dynamic Metadata](https://api.video/blog/endpoints/dynamic-metadata) allows you to define a key that allows any value pair.
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        $this->container['metadata'] = $metadata;

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


