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
 * VideoThumbnailPickPayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoThumbnailPickPayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-thumbnail-pick-payload',
            [
                'timecode' => 'string'
            ],
            [
                'timecode' => null
            ],
            [
                'timecode' => 'timecode'
            ],
            [
                'timecode' => 'setTimecode'
            ],
            [
                'timecode' => 'getTimecode'
            ],
            [
                'timecode' => null
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
        $this->container['timecode'] = $data['timecode'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['timecode'] === null) {
            $invalidProperties[] = "'timecode' can't be null";
        }
        if (!preg_match("/\\d{2}:\\d{2}:\\d{2}(\\.\\d{2})?/", $this->container['timecode'])) {
            $invalidProperties[] = "invalid value for 'timecode', must be conform to the pattern /\\d{2}:\\d{2}:\\d{2}(\\.\\d{2})?/.";
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
     * Gets timecode
     *
     * @return string
     */
    public function getTimecode()
    {
        return $this->container['timecode'];
    }

    /**
     * Sets timecode
     *
     * @param string $timecode Frame in video to be used as a placeholder before the video plays.  Example: '\"00:01:00.000\" for 1 minute into the video.' Valid Patterns:  \"hh:mm:ss.ms\" \"hh:mm:ss:frameNumber\" \"124\" (integer value is reported as seconds)  If selection is out of range, \"00:00:00.00\" will be chosen.
     *
     * @return self
     */
    public function setTimecode($timecode)
    {

        if ((!preg_match("/\\d{2}:\\d{2}:\\d{2}(\\.\\d{2})?/", $timecode))) {
            throw new \InvalidArgumentException("invalid value for $timecode when calling VideoThumbnailPickPayload., must conform to the pattern /\\d{2}:\\d{2}:\\d{2}(\\.\\d{2})?/.");
        }

        $this->container['timecode'] = $timecode;

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


