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
 * VideoSource Class Doc Comment
 *
 * @category Class
 * @description Source information about the video.
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoSource implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-source',
            [
                'uri' => 'string',
                'type' => 'string',
                'liveStream' => '\ApiVideo\Client\Model\VideoSourceLiveStream'
            ],
            [
                'uri' => null,
                'type' => null,
                'liveStream' => null
            ],
            [
                'uri' => 'uri',
                'type' => 'type',
                'liveStream' => 'liveStream'
            ],
            [
                'uri' => 'setUri',
                'type' => 'setType',
                'liveStream' => 'setLiveStream'
            ],
            [
                'uri' => 'getUri',
                'type' => 'getType',
                'liveStream' => 'getLiveStream'
            ],
            [
                'uri' => null,
                'type' => null,
                'liveStream' => null
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
        $this->container['uri'] = $data['uri'] ?? null;
        $this->container['type'] = $data['type'] ?? null;
        $this->container['liveStream'] = isset($data['liveStream']) ? new VideoSourceLiveStream($data['liveStream']) : null;
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
     * Gets uri
     *
     * @return string|null
     */
    public function getUri()
    {
        return $this->container['uri'];
    }

    /**
     * Sets uri
     *
     * @param string|null $uri The URL where the video is stored.
     *
     * @return self
     */
    public function setUri($uri)
    {
        $this->container['uri'] = $uri;

        return $this;
    }

    /**
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type type
     *
     * @return self
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets liveStream
     *
     * @return \ApiVideo\Client\Model\VideoSourceLiveStream|null
     */
    public function getLiveStream()
    {
        return $this->container['liveStream'];
    }

    /**
     * Sets liveStream
     *
     * @param \ApiVideo\Client\Model\VideoSourceLiveStream|null $liveStream liveStream
     *
     * @return self
     */
    public function setLiveStream($liveStream)
    {
        $this->container['liveStream'] = $liveStream;

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


