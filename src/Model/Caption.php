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
 * Caption Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Caption implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'caption',
            [
                'uri' => 'string',
                'src' => 'string',
                'srclang' => 'string',
                'default' => 'bool'
            ],
            [
                'uri' => null,
                'src' => null,
                'srclang' => null,
                'default' => null
            ],
            [
                'uri' => 'uri',
                'src' => 'src',
                'srclang' => 'srclang',
                'default' => 'default'
            ],
            [
                'uri' => 'setUri',
                'src' => 'setSrc',
                'srclang' => 'setSrclang',
                'default' => 'setDefault'
            ],
            [
                'uri' => 'getUri',
                'src' => 'getSrc',
                'srclang' => 'getSrclang',
                'default' => 'getDefault'
            ],
            [
                'uri' => null,
                'src' => null,
                'srclang' => null,
                'default' => null
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
        $this->container['src'] = $data['src'] ?? null;
        $this->container['srclang'] = $data['srclang'] ?? null;
        $this->container['default'] = $data['default'] ?? false;
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
     * @param string|null $uri uri
     *
     * @return self
     */
    public function setUri($uri)
    {
        $this->container['uri'] = $uri;

        return $this;
    }

    /**
     * Gets src
     *
     * @return string|null
     */
    public function getSrc()
    {
        return $this->container['src'];
    }

    /**
     * Sets src
     *
     * @param string|null $src src
     *
     * @return self
     */
    public function setSrc($src)
    {
        $this->container['src'] = $src;

        return $this;
    }

    /**
     * Gets srclang
     *
     * @return string|null
     */
    public function getSrclang()
    {
        return $this->container['srclang'];
    }

    /**
     * Sets srclang
     *
     * @param string|null $srclang srclang
     *
     * @return self
     */
    public function setSrclang($srclang)
    {
        $this->container['srclang'] = $srclang;

        return $this;
    }

    /**
     * Gets default
     *
     * @return bool|null
     */
    public function getDefault()
    {
        return $this->container['default'];
    }

    /**
     * Sets default
     *
     * @param bool|null $default Whether you will have subtitles or not. True for yes you will have subtitles, false for no you will not have subtitles.
     *
     * @return self
     */
    public function setDefault($default)
    {
        $this->container['default'] = $default;

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


