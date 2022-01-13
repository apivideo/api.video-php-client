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
 * Watermark Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Watermark implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'watermark',
            [
                'watermarkId' => 'string',
                'createdAt' => '\DateTime'
            ],
            [
                'watermarkId' => null,
                'createdAt' => 'date-time'
            ],
            [
                'watermarkId' => 'watermarkId',
                'createdAt' => 'createdAt'
            ],
            [
                'watermarkId' => 'setWatermarkId',
                'createdAt' => 'setCreatedAt'
            ],
            [
                'watermarkId' => 'getWatermarkId',
                'createdAt' => 'getCreatedAt'
            ],
            [
                'watermarkId' => null,
                'createdAt' => null
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
        $this->container['watermarkId'] = $data['watermarkId'] ?? null;
        $this->container['createdAt'] = isset($data['createdAt']) ? new \DateTime($data['createdAt']) : null;
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
     * Gets watermarkId
     *
     * @return string|null
     */
    public function getWatermarkId()
    {
        return $this->container['watermarkId'];
    }

    /**
     * Sets watermarkId
     *
     * @param string|null $watermarkId The unique identifier of the watermark.
     *
     * @return self
     */
    public function setWatermarkId($watermarkId)
    {
        $this->container['watermarkId'] = $watermarkId;

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
     * @param \DateTime|null $createdAt When the watermark was created, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

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


