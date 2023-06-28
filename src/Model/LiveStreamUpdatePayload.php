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
 * LiveStreamUpdatePayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class LiveStreamUpdatePayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'live-stream-update-payload',
            [
                'name' => 'string',
                'public' => 'bool',
                'record' => 'bool',
                'playerId' => 'string',
                'restreams' => '\ApiVideo\Client\Model\RestreamsRequestObject[]'
            ],
            [
                'name' => null,
                'public' => null,
                'record' => null,
                'playerId' => null,
                'restreams' => null
            ],
            [
                'name' => 'name',
                'public' => 'public',
                'record' => 'record',
                'playerId' => 'playerId',
                'restreams' => 'restreams'
            ],
            [
                'name' => 'setName',
                'public' => 'setPublic',
                'record' => 'setRecord',
                'playerId' => 'setPlayerId',
                'restreams' => 'setRestreams'
            ],
            [
                'name' => 'getName',
                'public' => 'getPublic',
                'record' => 'getRecord',
                'playerId' => 'getPlayerId',
                'restreams' => 'getRestreams'
            ],
            [
                'name' => null,
                'public' => null,
                'record' => null,
                'playerId' => null,
                'restreams' => null
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
        $this->container['name'] = $data['name'] ?? null;
        $this->container['public'] = $data['public'] ?? null;
        $this->container['record'] = $data['record'] ?? null;
        $this->container['playerId'] = $data['playerId'] ?? null;
        $this->container['restreams'] = isset($data['restreams']) ?  array_map(function(array $value): RestreamsRequestObject { return new RestreamsRequestObject($value); }, $data['restreams']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['restreams']) && (count($this->container['restreams']) > 5)) {
            $invalidProperties[] = "invalid value for 'restreams', number of items must be less than or equal to 5.";
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
     * @param string|null $name The name you want to use for your live stream.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

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
     * @param bool|null $public Whether your video can be viewed by everyone, or requires authentication to see it. A setting of false will require a unique token for each view. Learn more about the Private Video feature [here](https://docs.api.video/docs/private-videos).
     *
     * @return self
     */
    public function setPublic($public)
    {
        $this->container['public'] = $public;

        return $this;
    }

    /**
     * Gets record
     *
     * @return bool|null
     */
    public function getRecord()
    {
        return $this->container['record'];
    }

    /**
     * Sets record
     *
     * @param bool|null $record Use this to indicate whether you want the recording on or off. On is true, off is false.
     *
     * @return self
     */
    public function setRecord($record)
    {
        $this->container['record'] = $record;

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
     * @param string|null $playerId The unique ID for the player associated with a live stream that you want to update.
     *
     * @return self
     */
    public function setPlayerId($playerId)
    {
        $this->container['playerId'] = $playerId;

        return $this;
    }

    /**
     * Gets restreams
     *
     * @return \ApiVideo\Client\Model\RestreamsRequestObject[]|null
     */
    public function getRestreams()
    {
        return $this->container['restreams'];
    }

    /**
     * Sets restreams
     *
     * @param \ApiVideo\Client\Model\RestreamsRequestObject[]|null $restreams Use this parameter to add, edit, or remove RTMP services where you want to restream a live stream. The list can only contain up to 5 destinations. This operation updates all restream destinations in the same request. If you do not want to modify an existing restream destination, you need to include it in your request, otherwise it is removed.
     *
     * @return self
     */
    public function setRestreams($restreams)
    {

        if (!is_null($restreams) && (count($restreams) > 5)) {
            throw new \InvalidArgumentException('invalid value for $restreams when calling LiveStreamUpdatePayload., number of items must be less than or equal to 5.');
        }
        $this->container['restreams'] = $restreams;

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


