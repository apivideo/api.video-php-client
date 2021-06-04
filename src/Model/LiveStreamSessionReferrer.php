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
 * LiveStreamSessionReferrer Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class LiveStreamSessionReferrer implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'live-stream-session-referrer',
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
     * @param string|null $url The website the viewer of the live stream was referred to in order to view the live stream.
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
     * @param string|null $medium The type of search that brought the viewer to the live stream. Organic would be they found it on their own, paid would be they found it via an advertisement.
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
     * @param string|null $source Where the viewer came from to see the live stream (usually where they searched from).
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
     * @param string|null $searchTerm What term they searched for that led them to the live stream.
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


