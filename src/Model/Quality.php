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
 * Quality Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Quality implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'quality',
            [
                'type' => 'string',
                'quality' => 'string',
                'status' => 'string'
            ],
            [
                'type' => null,
                'quality' => null,
                'status' => null
            ],
            [
                'type' => 'type',
                'quality' => 'quality',
                'status' => 'status'
            ],
            [
                'type' => 'setType',
                'quality' => 'setQuality',
                'status' => 'setStatus'
            ],
            [
                'type' => 'getType',
                'quality' => 'getQuality',
                'status' => 'getStatus'
            ],
            [
                'type' => null,
                'quality' => null,
                'status' => null
            ],
            null
        );
    }

    const TYPE_HLS = 'hls';
    const TYPE_MP4 = 'mp4';
    const QUALITY__240P = '240p';
    const QUALITY__360P = '360p';
    const QUALITY__480P = '480p';
    const QUALITY__720P = '720p';
    const QUALITY__1080P = '1080p';
    const QUALITY__2160P = '2160p';
    const STATUS_WAITING = 'waiting';
    const STATUS_ENCODING = 'encoding';
    const STATUS_ENCODED = 'encoded';
    const STATUS_FAILED = 'failed';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getTypeAllowableValues()
    {
        return [
            self::TYPE_HLS,
            self::TYPE_MP4,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getQualityAllowableValues()
    {
        return [
            self::QUALITY__240P,
            self::QUALITY__360P,
            self::QUALITY__480P,
            self::QUALITY__720P,
            self::QUALITY__1080P,
            self::QUALITY__2160P,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_WAITING,
            self::STATUS_ENCODING,
            self::STATUS_ENCODED,
            self::STATUS_FAILED,
        ];
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
        $this->container['type'] = $data['type'] ?? null;
        $this->container['quality'] = $data['quality'] ?? null;
        $this->container['status'] = $data['status'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($this->container['type']) && !in_array($this->container['type'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'type', must be one of '%s'",
                $this->container['type'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getQualityAllowableValues();
        if (!is_null($this->container['quality']) && !in_array($this->container['quality'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'quality', must be one of '%s'",
                $this->container['quality'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($this->container['status']) && !in_array($this->container['status'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'status', must be one of '%s'",
                $this->container['status'],
                implode("', '", $allowedValues)
            );
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
     * Gets type
     *
     * @return string|null
     */
    public function getType()
    {
        return $this->container['type'];
    }

    /**
     * Sets type
     *
     * @param string|null $type The type of video (hls or mp4).
     *
     * @return self
     */
    public function setType($type)
    {
        $allowedValues = $this->getTypeAllowableValues();
        if (!is_null($type) && !in_array($type, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'type', must be one of '%s'",
                    $type,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['type'] = $type;

        return $this;
    }

    /**
     * Gets quality
     *
     * @return string|null
     */
    public function getQuality()
    {
        return $this->container['quality'];
    }

    /**
     * Sets quality
     *
     * @param string|null $quality The quality of the video you have, in pixels. Choices include 360p, 480p, 720p, 1080p, and 2160p.
     *
     * @return self
     */
    public function setQuality($quality)
    {
        $allowedValues = $this->getQualityAllowableValues();
        if (!is_null($quality) && !in_array($quality, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'quality', must be one of '%s'",
                    $quality,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['quality'] = $quality;

        return $this;
    }

    /**
     * Gets status
     *
     * @return string|null
     */
    public function getStatus()
    {
        return $this->container['status'];
    }

    /**
     * Sets status
     *
     * @param string|null $status The status of your video. Statuses include waiting - the video is waiting to be encoded. encoding - the video is in the process of being encoded. encoded - the video was successfully encoded. failed - the video failed to be encoded.
     *
     * @return self
     */
    public function setStatus($status)
    {
        $allowedValues = $this->getStatusAllowableValues();
        if (!is_null($status) && !in_array($status, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'status', must be one of '%s'",
                    $status,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['status'] = $status;

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


