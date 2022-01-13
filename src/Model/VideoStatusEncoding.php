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
 * VideoStatusEncoding Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoStatusEncoding implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-status-encoding',
            [
                'playable' => 'bool',
                'qualities' => '\ApiVideo\Client\Model\Quality[]',
                'metadata' => '\ApiVideo\Client\Model\VideoStatusEncodingMetadata'
            ],
            [
                'playable' => null,
                'qualities' => null,
                'metadata' => null
            ],
            [
                'playable' => 'playable',
                'qualities' => 'qualities',
                'metadata' => 'metadata'
            ],
            [
                'playable' => 'setPlayable',
                'qualities' => 'setQualities',
                'metadata' => 'setMetadata'
            ],
            [
                'playable' => 'getPlayable',
                'qualities' => 'getQualities',
                'metadata' => 'getMetadata'
            ],
            [
                'playable' => null,
                'qualities' => null,
                'metadata' => null
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
        $this->container['playable'] = $data['playable'] ?? null;
        $this->container['qualities'] = isset($data['qualities']) ?  array_map(function(array $value): Quality { return new Quality($value); }, $data['qualities']) : null;
        $this->container['metadata'] = isset($data['metadata']) ? new VideoStatusEncodingMetadata($data['metadata']) : null;
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
     * Gets playable
     *
     * @return bool|null
     */
    public function getPlayable()
    {
        return $this->container['playable'];
    }

    /**
     * Sets playable
     *
     * @param bool|null $playable Whether the video is playable or not.
     *
     * @return self
     */
    public function setPlayable($playable)
    {
        $this->container['playable'] = $playable;

        return $this;
    }

    /**
     * Gets qualities
     *
     * @return \ApiVideo\Client\Model\Quality[]|null
     */
    public function getQualities()
    {
        return $this->container['qualities'];
    }

    /**
     * Sets qualities
     *
     * @param \ApiVideo\Client\Model\Quality[]|null $qualities Available qualities the video can be viewed in.
     *
     * @return self
     */
    public function setQualities($qualities)
    {
        $this->container['qualities'] = $qualities;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return \ApiVideo\Client\Model\VideoStatusEncodingMetadata|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param \ApiVideo\Client\Model\VideoStatusEncodingMetadata|null $metadata metadata
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


