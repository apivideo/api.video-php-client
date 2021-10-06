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
 * VideoSourceLiveStream Class Doc Comment
 *
 * @category Class
 * @description This appears if the video is from a Live Record.
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoSourceLiveStream implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-source-live-stream',
            [
                'liveStreamId' => 'string',
                'links' => '\ApiVideo\Client\Model\VideoSourceLiveStreamLink[]'
            ],
            [
                'liveStreamId' => null,
                'links' => null
            ],
            [
                'liveStreamId' => 'liveStreamId',
                'links' => 'links'
            ],
            [
                'liveStreamId' => 'setLiveStreamId',
                'links' => 'setLinks'
            ],
            [
                'liveStreamId' => 'getLiveStreamId',
                'links' => 'getLinks'
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
        $this->container['liveStreamId'] = $data['liveStreamId'] ?? null;
        $this->container['links'] = isset($data['links']) ?  array_map(function(array $value): VideoSourceLiveStreamLink { return new VideoSourceLiveStreamLink($value); }, $data['links']) : null;
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
     * Gets liveStreamId
     *
     * @return string|null
     */
    public function getLiveStreamId()
    {
        return $this->container['liveStreamId'];
    }

    /**
     * Sets liveStreamId
     *
     * @param string|null $liveStreamId The unique identifier for the live stream.
     *
     * @return self
     */
    public function setLiveStreamId($liveStreamId)
    {
        $this->container['liveStreamId'] = $liveStreamId;

        return $this;
    }

    /**
     * Gets links
     *
     * @return \ApiVideo\Client\Model\VideoSourceLiveStreamLink[]|null
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \ApiVideo\Client\Model\VideoSourceLiveStreamLink[]|null $links links
     *
     * @return self
     */
    public function setLinks($links)
    {
        $this->container['links'] = $links;

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


