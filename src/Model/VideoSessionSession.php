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
 * VideoSessionSession Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoSessionSession implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-session-session',
            [
                'sessionId' => 'string',
                'loadedAt' => '\DateTime',
                'endedAt' => '\DateTime',
                'metadata' => '\ApiVideo\Client\Model\Metadata[]'
            ],
            [
                'sessionId' => null,
                'loadedAt' => 'date-time',
                'endedAt' => 'date-time',
                'metadata' => null
            ],
            [
                'sessionId' => 'sessionId',
                'loadedAt' => 'loadedAt',
                'endedAt' => 'endedAt',
                'metadata' => 'metadata'
            ],
            [
                'sessionId' => 'setSessionId',
                'loadedAt' => 'setLoadedAt',
                'endedAt' => 'setEndedAt',
                'metadata' => 'setMetadata'
            ],
            [
                'sessionId' => 'getSessionId',
                'loadedAt' => 'getLoadedAt',
                'endedAt' => 'getEndedAt',
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
        $this->container['sessionId'] = $data['sessionId'] ?? null;
        $this->container['loadedAt'] = isset($data['loadedAt']) ? new \DateTime($data['loadedAt']) : null;
        $this->container['endedAt'] = isset($data['endedAt']) ? new \DateTime($data['endedAt']) : null;
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
     * Gets sessionId
     *
     * @return string|null
     */
    public function getSessionId()
    {
        return $this->container['sessionId'];
    }

    /**
     * Sets sessionId
     *
     * @param string|null $sessionId The unique identifier for the session that you can use to track what happens during it.
     *
     * @return self
     */
    public function setSessionId($sessionId)
    {
        $this->container['sessionId'] = $sessionId;

        return $this;
    }

    /**
     * Gets loadedAt
     *
     * @return \DateTime|null
     */
    public function getLoadedAt()
    {
        return $this->container['loadedAt'];
    }

    /**
     * Sets loadedAt
     *
     * @param \DateTime|null $loadedAt When the video session started, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setLoadedAt($loadedAt)
    {
        $this->container['loadedAt'] = $loadedAt;

        return $this;
    }

    /**
     * Gets endedAt
     *
     * @return \DateTime|null
     */
    public function getEndedAt()
    {
        return $this->container['endedAt'];
    }

    /**
     * Sets endedAt
     *
     * @param \DateTime|null $endedAt When the video session ended, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setEndedAt($endedAt)
    {
        $this->container['endedAt'] = $endedAt;

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
     * @param \ApiVideo\Client\Model\Metadata[]|null $metadata A list of key value pairs that you use to provide metadata for your video. These pairs can be made dynamic, allowing you to segment your audience. You can also just use the pairs as another way to tag and categorize your videos.
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


