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
 * Summary Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Summary implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'summary',
            [
                'summaryId' => 'string',
                'createdAt' => '\DateTime',
                'updatedAt' => '\DateTime',
                'videoId' => 'string',
                'origin' => 'string',
                'sourceStatus' => 'string'
            ],
            [
                'summaryId' => null,
                'createdAt' => 'date-time',
                'updatedAt' => 'date-time',
                'videoId' => null,
                'origin' => null,
                'sourceStatus' => null
            ],
            [
                'summaryId' => 'summaryId',
                'createdAt' => 'createdAt',
                'updatedAt' => 'updatedAt',
                'videoId' => 'videoId',
                'origin' => 'origin',
                'sourceStatus' => 'sourceStatus'
            ],
            [
                'summaryId' => 'setSummaryId',
                'createdAt' => 'setCreatedAt',
                'updatedAt' => 'setUpdatedAt',
                'videoId' => 'setVideoId',
                'origin' => 'setOrigin',
                'sourceStatus' => 'setSourceStatus'
            ],
            [
                'summaryId' => 'getSummaryId',
                'createdAt' => 'getCreatedAt',
                'updatedAt' => 'getUpdatedAt',
                'videoId' => 'getVideoId',
                'origin' => 'getOrigin',
                'sourceStatus' => 'getSourceStatus'
            ],
            [
                'summaryId' => null,
                'createdAt' => null,
                'updatedAt' => null,
                'videoId' => null,
                'origin' => null,
                'sourceStatus' => null
            ],
            null
        );
    }

    const ORIGIN_API = 'api';
    const ORIGIN_AUTO = 'auto';
    const SOURCE_STATUS_MISSING = 'missing';
    const SOURCE_STATUS_WAITING = 'waiting';
    const SOURCE_STATUS_FAILED = 'failed';
    const SOURCE_STATUS_COMPLETED = 'completed';
    const SOURCE_STATUS_UNPROCESSABLE = 'unprocessable';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getOriginAllowableValues()
    {
        return [
            self::ORIGIN_API,
            self::ORIGIN_AUTO,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getSourceStatusAllowableValues()
    {
        return [
            self::SOURCE_STATUS_MISSING,
            self::SOURCE_STATUS_WAITING,
            self::SOURCE_STATUS_FAILED,
            self::SOURCE_STATUS_COMPLETED,
            self::SOURCE_STATUS_UNPROCESSABLE,
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
        $this->container['summaryId'] = $data['summaryId'] ?? null;
        $this->container['createdAt'] = isset($data['createdAt']) ? new \DateTime($data['createdAt']) : null;
        $this->container['updatedAt'] = isset($data['updatedAt']) ? new \DateTime($data['updatedAt']) : null;
        $this->container['videoId'] = $data['videoId'] ?? null;
        $this->container['origin'] = $data['origin'] ?? null;
        $this->container['sourceStatus'] = $data['sourceStatus'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getOriginAllowableValues();
        if (!is_null($this->container['origin']) && !in_array($this->container['origin'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'origin', must be one of '%s'",
                $this->container['origin'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getSourceStatusAllowableValues();
        if (!is_null($this->container['sourceStatus']) && !in_array($this->container['sourceStatus'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'sourceStatus', must be one of '%s'",
                $this->container['sourceStatus'],
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
     * Gets summaryId
     *
     * @return string|null
     */
    public function getSummaryId()
    {
        return $this->container['summaryId'];
    }

    /**
     * Sets summaryId
     *
     * @param string|null $summaryId The unique identifier of the summary object.
     *
     * @return self
     */
    public function setSummaryId($summaryId)
    {
        $this->container['summaryId'] = $summaryId;

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
     * @param \DateTime|null $createdAt Returns the date and time when the summary was created in ATOM date-time format.
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

        return $this;
    }

    /**
     * Gets updatedAt
     *
     * @return \DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->container['updatedAt'];
    }

    /**
     * Sets updatedAt
     *
     * @param \DateTime|null $updatedAt Returns the date and time when the summary was last updated in ATOM date-time format.
     *
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->container['updatedAt'] = $updatedAt;

        return $this;
    }

    /**
     * Gets videoId
     *
     * @return string|null
     */
    public function getVideoId()
    {
        return $this->container['videoId'];
    }

    /**
     * Sets videoId
     *
     * @param string|null $videoId The unique identifier of the video object.
     *
     * @return self
     */
    public function setVideoId($videoId)
    {
        $this->container['videoId'] = $videoId;

        return $this;
    }

    /**
     * Gets origin
     *
     * @return string|null
     */
    public function getOrigin()
    {
        return $this->container['origin'];
    }

    /**
     * Sets origin
     *
     * @param string|null $origin Returns the origin of how the summary was created.  - `api` means that no summary was generated automatically. You can add summary manually using the `PATCH /summaries/{summaryId}/source` endpoint operation. Until this happens, `sourceStatus` returns `missing`. - `auto` means that the API generated the summary automatically.
     *
     * @return self
     */
    public function setOrigin($origin)
    {
        $allowedValues = $this->getOriginAllowableValues();
        if (!is_null($origin) && !in_array($origin, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'origin', must be one of '%s'",
                    $origin,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['origin'] = $origin;

        return $this;
    }

    /**
     * Gets sourceStatus
     *
     * @return string|null
     */
    public function getSourceStatus()
    {
        return $this->container['sourceStatus'];
    }

    /**
     * Sets sourceStatus
     *
     * @param string|null $sourceStatus Returns the current status of summary generation.  `missing`: the input for a summary is not present. `waiting` : the input video is being processed and a summary will be generated. `failed`: a technical issue prevented summary generation. `completed`: the summary is generated. `unprocessable`: the API rules the source video to be unsuitable for summary generation. An example for this is an input video that has no audio.
     *
     * @return self
     */
    public function setSourceStatus($sourceStatus)
    {
        $allowedValues = $this->getSourceStatusAllowableValues();
        if (!is_null($sourceStatus) && !in_array($sourceStatus, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'sourceStatus', must be one of '%s'",
                    $sourceStatus,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['sourceStatus'] = $sourceStatus;

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


