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
 * LiveStream Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class LiveStream implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'live-stream',
            [
                'liveStreamId' => 'string',
                'name' => 'string',
                'streamKey' => 'string',
                'public' => 'bool',
                'assets' => '\ApiVideo\Client\Model\LiveStreamAssets',
                'playerId' => 'string',
                'broadcasting' => 'bool',
                'restreams' => '\ApiVideo\Client\Model\RestreamsResponseObject[]',
                'createdAt' => '\DateTime',
                'updatedAt' => '\DateTime'
            ],
            [
                'liveStreamId' => null,
                'name' => null,
                'streamKey' => null,
                'public' => null,
                'assets' => null,
                'playerId' => null,
                'broadcasting' => null,
                'restreams' => null,
                'createdAt' => 'date-time',
                'updatedAt' => 'date-time'
            ],
            [
                'liveStreamId' => 'liveStreamId',
                'name' => 'name',
                'streamKey' => 'streamKey',
                'public' => 'public',
                'assets' => 'assets',
                'playerId' => 'playerId',
                'broadcasting' => 'broadcasting',
                'restreams' => 'restreams',
                'createdAt' => 'createdAt',
                'updatedAt' => 'updatedAt'
            ],
            [
                'liveStreamId' => 'setLiveStreamId',
                'name' => 'setName',
                'streamKey' => 'setStreamKey',
                'public' => 'setPublic',
                'assets' => 'setAssets',
                'playerId' => 'setPlayerId',
                'broadcasting' => 'setBroadcasting',
                'restreams' => 'setRestreams',
                'createdAt' => 'setCreatedAt',
                'updatedAt' => 'setUpdatedAt'
            ],
            [
                'liveStreamId' => 'getLiveStreamId',
                'name' => 'getName',
                'streamKey' => 'getStreamKey',
                'public' => 'getPublic',
                'assets' => 'getAssets',
                'playerId' => 'getPlayerId',
                'broadcasting' => 'getBroadcasting',
                'restreams' => 'getRestreams',
                'createdAt' => 'getCreatedAt',
                'updatedAt' => 'getUpdatedAt'
            ],
            [
                'liveStreamId' => null,
                'name' => null,
                'streamKey' => null,
                'public' => null,
                'assets' => null,
                'playerId' => null,
                'broadcasting' => null,
                'restreams' => null,
                'createdAt' => null,
                'updatedAt' => null
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
        $this->container['name'] = $data['name'] ?? null;
        $this->container['streamKey'] = $data['streamKey'] ?? null;
        $this->container['public'] = $data['public'] ?? null;
        $this->container['assets'] = isset($data['assets']) ? new LiveStreamAssets($data['assets']) : null;
        $this->container['playerId'] = $data['playerId'] ?? null;
        $this->container['broadcasting'] = $data['broadcasting'] ?? null;
        $this->container['restreams'] = isset($data['restreams']) ?  array_map(function(array $value): RestreamsResponseObject { return new RestreamsResponseObject($value); }, $data['restreams']) : null;
        $this->container['createdAt'] = isset($data['createdAt']) ? new \DateTime($data['createdAt']) : null;
        $this->container['updatedAt'] = isset($data['updatedAt']) ? new \DateTime($data['updatedAt']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['liveStreamId'] === null) {
            $invalidProperties[] = "'liveStreamId' can't be null";
        }
        if ($this->container['restreams'] === null) {
            $invalidProperties[] = "'restreams' can't be null";
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
     * Gets liveStreamId
     *
     * @return string
     */
    public function getLiveStreamId()
    {
        return $this->container['liveStreamId'];
    }

    /**
     * Sets liveStreamId
     *
     * @param string $liveStreamId The unique identifier for the live stream. Live stream IDs begin with \"li.\"
     *
     * @return self
     */
    public function setLiveStreamId($liveStreamId)
    {
        $this->container['liveStreamId'] = $liveStreamId;

        return $this;
    }

    /**
     * Gets name
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name
     *
     * @param string|null $name The name of your live stream.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets streamKey
     *
     * @return string|null
     */
    public function getStreamKey()
    {
        return $this->container['streamKey'];
    }

    /**
     * Sets streamKey
     *
     * @param string|null $streamKey The unique, private stream key that you use to begin streaming.
     *
     * @return self
     */
    public function setStreamKey($streamKey)
    {
        $this->container['streamKey'] = $streamKey;

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
     * @param bool|null $public Whether your video can be viewed by everyone, or requires authentication to see it. A setting of false will require a unique token for each view. Learn more about the Private Video feature [here](https://docs.api.video/delivery-analytics/video-privacy-access-management).
     *
     * @return self
     */
    public function setPublic($public)
    {
        $this->container['public'] = $public;

        return $this;
    }

    /**
     * Gets assets
     *
     * @return \ApiVideo\Client\Model\LiveStreamAssets|null
     */
    public function getAssets()
    {
        return $this->container['assets'];
    }

    /**
     * Sets assets
     *
     * @param \ApiVideo\Client\Model\LiveStreamAssets|null $assets assets
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
     * @param string|null $playerId The unique identifier for the player.
     *
     * @return self
     */
    public function setPlayerId($playerId)
    {
        $this->container['playerId'] = $playerId;

        return $this;
    }

    /**
     * Gets broadcasting
     *
     * @return bool|null
     */
    public function getBroadcasting()
    {
        return $this->container['broadcasting'];
    }

    /**
     * Sets broadcasting
     *
     * @param bool|null $broadcasting Whether or not you are broadcasting the live video you recorded for others to see. True means you are broadcasting to viewers, false means you are not.
     *
     * @return self
     */
    public function setBroadcasting($broadcasting)
    {
        $this->container['broadcasting'] = $broadcasting;

        return $this;
    }

    /**
     * Gets restreams
     *
     * @return \ApiVideo\Client\Model\RestreamsResponseObject[]
     */
    public function getRestreams()
    {
        return $this->container['restreams'];
    }

    /**
     * Sets restreams
     *
     * @param \ApiVideo\Client\Model\RestreamsResponseObject[] $restreams Returns the list of RTMP restream destinations.
     *
     * @return self
     */
    public function setRestreams($restreams)
    {
        $this->container['restreams'] = $restreams;

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
     * @param \DateTime|null $createdAt When the player was created, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

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
     * @param \DateTime|null $updatedAt When the player was last updated, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->container['updatedAt'] = $updatedAt;

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


