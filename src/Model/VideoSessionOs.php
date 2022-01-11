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
 * VideoSessionOs Class Doc Comment
 *
 * @category Class
 * @description The operating system the viewer is on.
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoSessionOs implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-session-os',
            [
                'name' => 'string',
                'shortname' => 'string',
                'version' => 'string'
            ],
            [
                'name' => null,
                'shortname' => null,
                'version' => null
            ],
            [
                'name' => 'name',
                'shortname' => 'shortname',
                'version' => 'version'
            ],
            [
                'name' => 'setName',
                'shortname' => 'setShortname',
                'version' => 'setVersion'
            ],
            [
                'name' => 'getName',
                'shortname' => 'getShortname',
                'version' => 'getVersion'
            ],
            [
                'name' => null,
                'shortname' => null,
                'version' => null
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
        $this->container['shortname'] = $data['shortname'] ?? null;
        $this->container['version'] = $data['version'] ?? null;
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
     * @param string|null $name The name of the operating system.
     *
     * @return self
     */
    public function setName($name)
    {
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets shortname
     *
     * @return string|null
     */
    public function getShortname()
    {
        return $this->container['shortname'];
    }

    /**
     * Sets shortname
     *
     * @param string|null $shortname The nickname for the operating system, often representing the version.
     *
     * @return self
     */
    public function setShortname($shortname)
    {
        $this->container['shortname'] = $shortname;

        return $this;
    }

    /**
     * Gets version
     *
     * @return string|null
     */
    public function getVersion()
    {
        return $this->container['version'];
    }

    /**
     * Sets version
     *
     * @param string|null $version The version of the operating system.
     *
     * @return self
     */
    public function setVersion($version)
    {
        $this->container['version'] = $version;

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


