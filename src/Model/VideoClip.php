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
 * VideoClip Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoClip implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-clip',
            [
                'startTimecode' => 'string',
                'endTimecode' => 'string'
            ],
            [
                'startTimecode' => null,
                'endTimecode' => null
            ],
            [
                'startTimecode' => 'startTimecode',
                'endTimecode' => 'endTimecode'
            ],
            [
                'startTimecode' => 'setStartTimecode',
                'endTimecode' => 'setEndTimecode'
            ],
            [
                'startTimecode' => 'getStartTimecode',
                'endTimecode' => 'getEndTimecode'
            ],
            [
                'startTimecode' => null,
                'endTimecode' => null
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
        $this->container['startTimecode'] = $data['startTimecode'] ?? null;
        $this->container['endTimecode'] = $data['endTimecode'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['startTimecode']) && !preg_match("/^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/", $this->container['startTimecode'])) {
            $invalidProperties[] = "invalid value for 'startTimecode', must be conform to the pattern /^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/.";
        }

        if (!is_null($this->container['endTimecode']) && !preg_match("/^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/", $this->container['endTimecode'])) {
            $invalidProperties[] = "invalid value for 'endTimecode', must be conform to the pattern /^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/.";
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
     * Gets startTimecode
     *
     * @return string|null
     */
    public function getStartTimecode()
    {
        return $this->container['startTimecode'];
    }

    /**
     * Sets startTimecode
     *
     * @param string|null $startTimecode startTimecode
     *
     * @return self
     */
    public function setStartTimecode($startTimecode)
    {

        if (!is_null($startTimecode) && (!preg_match("/^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/", $startTimecode))) {
            throw new \InvalidArgumentException("invalid value for $startTimecode when calling VideoClip., must conform to the pattern /^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/.");
        }

        $this->container['startTimecode'] = $startTimecode;

        return $this;
    }

    /**
     * Gets endTimecode
     *
     * @return string|null
     */
    public function getEndTimecode()
    {
        return $this->container['endTimecode'];
    }

    /**
     * Sets endTimecode
     *
     * @param string|null $endTimecode endTimecode
     *
     * @return self
     */
    public function setEndTimecode($endTimecode)
    {

        if (!is_null($endTimecode) && (!preg_match("/^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/", $endTimecode))) {
            throw new \InvalidArgumentException("invalid value for $endTimecode when calling VideoClip., must conform to the pattern /^(?:\\d{2,3}:[0-5]\\d:[0-5]\\d(?:\\.\\d{1,3}|\\:\\d{1,2})?|\\d{1,7})$/.");
        }

        $this->container['endTimecode'] = $endTimecode;

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


