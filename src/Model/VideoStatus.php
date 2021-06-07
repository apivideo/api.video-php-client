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
 * VideoStatus Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoStatus implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-status',
            [
                'ingest' => '\ApiVideo\Client\Model\VideoStatusIngest',
                'encoding' => '\ApiVideo\Client\Model\VideoStatusEncoding'
            ],
            [
                'ingest' => null,
                'encoding' => null
            ],
            [
                'ingest' => 'ingest',
                'encoding' => 'encoding'
            ],
            [
                'ingest' => 'setIngest',
                'encoding' => 'setEncoding'
            ],
            [
                'ingest' => 'getIngest',
                'encoding' => 'getEncoding'
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
        $this->container['ingest'] = $data['ingest'] ?? null;
        $this->container['encoding'] = $data['encoding'] ?? null;
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
     * Gets ingest
     *
     * @return \ApiVideo\Client\Model\VideoStatusIngest|null
     */
    public function getIngest()
    {
        return $this->container['ingest'];
    }

    /**
     * Sets ingest
     *
     * @param \ApiVideo\Client\Model\VideoStatusIngest|null $ingest ingest
     *
     * @return self
     */
    public function setIngest($ingest)
    {
        $this->container['ingest'] = $ingest;

        return $this;
    }

    /**
     * Gets encoding
     *
     * @return \ApiVideo\Client\Model\VideoStatusEncoding|null
     */
    public function getEncoding()
    {
        return $this->container['encoding'];
    }

    /**
     * Sets encoding
     *
     * @param \ApiVideo\Client\Model\VideoStatusEncoding|null $encoding encoding
     *
     * @return self
     */
    public function setEncoding($encoding)
    {
        $this->container['encoding'] = $encoding;

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


