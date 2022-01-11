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
 * TokenCreationPayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class TokenCreationPayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'token-creation-payload',
            [
                'ttl' => 'int'
            ],
            [
                'ttl' => null
            ],
            [
                'ttl' => 'ttl'
            ],
            [
                'ttl' => 'setTtl'
            ],
            [
                'ttl' => 'getTtl'
            ],
            [
                'ttl' => null
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
        $this->container['ttl'] = $data['ttl'] ?? 0;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['ttl']) && ($this->container['ttl'] > 2147483647)) {
            $invalidProperties[] = "invalid value for 'ttl', must be smaller than or equal to 2147483647.";
        }

        if (!is_null($this->container['ttl']) && ($this->container['ttl'] < 0)) {
            $invalidProperties[] = "invalid value for 'ttl', must be bigger than or equal to 0.";
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
     * Gets ttl
     *
     * @return int|null
     */
    public function getTtl()
    {
        return $this->container['ttl'];
    }

    /**
     * Sets ttl
     *
     * @param int|null $ttl Time in seconds that the token will be active. A value of 0 means that the token has no exipration date. The default is to have no expiration.
     *
     * @return self
     */
    public function setTtl($ttl)
    {

        if (!is_null($ttl) && ($ttl > 2147483647)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling TokenCreationPayload., must be smaller than or equal to 2147483647.');
        }
        if (!is_null($ttl) && ($ttl < 0)) {
            throw new \InvalidArgumentException('invalid value for $ttl when calling TokenCreationPayload., must be bigger than or equal to 0.');
        }

        $this->container['ttl'] = $ttl;

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


