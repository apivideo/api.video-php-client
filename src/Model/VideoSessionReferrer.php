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
 * VideoSessionReferrer Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoSessionReferrer implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-session-referrer',
            [
                'url' => 'string',
                'medium' => 'string',
                'source' => 'string',
                'searchTerm' => 'string'
            ],
            [
                'url' => null,
                'medium' => null,
                'source' => null,
                'searchTerm' => null
            ],
            [
                'url' => 'url',
                'medium' => 'medium',
                'source' => 'source',
                'searchTerm' => 'searchTerm'
            ],
            [
                'url' => 'setUrl',
                'medium' => 'setMedium',
                'source' => 'setSource',
                'searchTerm' => 'setSearchTerm'
            ],
            [
                'url' => 'getUrl',
                'medium' => 'getMedium',
                'source' => 'getSource',
                'searchTerm' => 'getSearchTerm'
            ],
            [
                'url' => null,
                'medium' => null,
                'source' => null,
                'searchTerm' => null
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
        $this->container['url'] = $data['url'] ?? null;
        $this->container['medium'] = $data['medium'] ?? null;
        $this->container['source'] = $data['source'] ?? null;
        $this->container['searchTerm'] = $data['searchTerm'] ?? null;
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
     * Gets url
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string|null $url The link the viewer used to reach the video session.
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Gets medium
     *
     * @return string|null
     */
    public function getMedium()
    {
        return $this->container['medium'];
    }

    /**
     * Sets medium
     *
     * @param string|null $medium How they arrived at the site, for example organic or paid. Organic meaning they found it themselves and paid meaning they followed a link from an advertisement.
     *
     * @return self
     */
    public function setMedium($medium)
    {
        $this->container['medium'] = $medium;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source The source the referrer came from to the video session. For example if they searched through google to find the stream.
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

        return $this;
    }

    /**
     * Gets searchTerm
     *
     * @return string|null
     */
    public function getSearchTerm()
    {
        return $this->container['searchTerm'];
    }

    /**
     * Sets searchTerm
     *
     * @param string|null $searchTerm The search term they typed to arrive at the video session.
     *
     * @return self
     */
    public function setSearchTerm($searchTerm)
    {
        $this->container['searchTerm'] = $searchTerm;

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


