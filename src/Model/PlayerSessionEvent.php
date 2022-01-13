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
 * PlayerSessionEvent Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class PlayerSessionEvent implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'player-session-event',
            [
                'type' => 'string',
                'emittedAt' => '\DateTime',
                'at' => 'int',
                'from' => 'int',
                'to' => 'int'
            ],
            [
                'type' => null,
                'emittedAt' => 'date-time',
                'at' => null,
                'from' => null,
                'to' => null
            ],
            [
                'type' => 'type',
                'emittedAt' => 'emittedAt',
                'at' => 'at',
                'from' => 'from',
                'to' => 'to'
            ],
            [
                'type' => 'setType',
                'emittedAt' => 'setEmittedAt',
                'at' => 'setAt',
                'from' => 'setFrom',
                'to' => 'setTo'
            ],
            [
                'type' => 'getType',
                'emittedAt' => 'getEmittedAt',
                'at' => 'getAt',
                'from' => 'getFrom',
                'to' => 'getTo'
            ],
            [
                'type' => null,
                'emittedAt' => null,
                'at' => null,
                'from' => null,
                'to' => null
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
        $this->container['type'] = $data['type'] ?? null;
        $this->container['emittedAt'] = isset($data['emittedAt']) ? new \DateTime($data['emittedAt']) : null;
        $this->container['at'] = $data['at'] ?? null;
        $this->container['from'] = $data['from'] ?? null;
        $this->container['to'] = $data['to'] ?? null;
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
     * @param string|null $type Possible values are: ready, play, pause, resume, seek.backward, seek.forward, end
     *
     * @return self
     */
    public function setType($type)
    {
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets emittedAt
     *
     * @return \DateTime|null
     */
    public function getEmittedAt()
    {
        return $this->container['emittedAt'];
    }

    /**
     * Sets emittedAt
     *
     * @param \DateTime|null $emittedAt When an event occurred, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setEmittedAt($emittedAt)
    {
        $this->container['emittedAt'] = $emittedAt;

        return $this;
    }

    /**
     * Gets at
     *
     * @return int|null
     */
    public function getAt()
    {
        return $this->container['at'];
    }

    /**
     * Sets at
     *
     * @param int|null $at at
     *
     * @return self
     */
    public function setAt($at)
    {
        $this->container['at'] = $at;

        return $this;
    }

    /**
     * Gets from
     *
     * @return int|null
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param int|null $from from
     *
     * @return self
     */
    public function setFrom($from)
    {
        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets to
     *
     * @return int|null
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param int|null $to to
     *
     * @return self
     */
    public function setTo($to)
    {
        $this->container['to'] = $to;

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


