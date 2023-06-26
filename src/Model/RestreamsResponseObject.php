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
 * RestreamsResponseObject Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class RestreamsResponseObject implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'restreams-response-object',
            [
                'name' => 'string',
                'serverUrl' => 'string',
                'streamKey' => 'string'
            ],
            [
                'name' => null,
                'serverUrl' => null,
                'streamKey' => null
            ],
            [
                'name' => 'name',
                'serverUrl' => 'serverUrl',
                'streamKey' => 'streamKey'
            ],
            [
                'name' => 'setName',
                'serverUrl' => 'setServerUrl',
                'streamKey' => 'setStreamKey'
            ],
            [
                'name' => 'getName',
                'serverUrl' => 'getServerUrl',
                'streamKey' => 'getStreamKey'
            ],
            [
                'name' => null,
                'serverUrl' => null,
                'streamKey' => null
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
        $this->container['serverUrl'] = $data['serverUrl'] ?? null;
        $this->container['streamKey'] = $data['streamKey'] ?? null;
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
     * @param string|null $name Returns the name of a restream destination.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets serverUrl
     *
     * @return string|null
     */
    public function getServerUrl()
    {
        return $this->container['serverUrl'];
    }

    /**
     * Sets serverUrl
     *
     * @param string|null $serverUrl Returns the RTMP URL of a restream destination.
     *
     * @return self
     */
    public function setServerUrl($serverUrl)
    {
        $this->container['serverUrl'] = $serverUrl;

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
     * @param string|null $streamKey Returns the unique key of the live stream that is set up for restreaming.
     *
     * @return self
     */
    public function setStreamKey($streamKey)
    {
        $this->container['streamKey'] = $streamKey;

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


