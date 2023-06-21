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
 * VideoStatusIngest Class Doc Comment
 *
 * @category Class
 * @description Details about the capturing, transferring, and storing of your video for use immediately or in the future.
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoStatusIngest implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-status-ingest',
            [
                'status' => 'string',
                'filesize' => 'int',
                'receivedBytes' => '\ApiVideo\Client\Model\BytesRange[]',
                'receivedParts' => '\ApiVideo\Client\Model\VideoStatusIngestReceivedParts'
            ],
            [
                'status' => null,
                'filesize' => null,
                'receivedBytes' => null,
                'receivedParts' => null
            ],
            [
                'status' => 'status',
                'filesize' => 'filesize',
                'receivedBytes' => 'receivedBytes',
                'receivedParts' => 'receivedParts'
            ],
            [
                'status' => 'setStatus',
                'filesize' => 'setFilesize',
                'receivedBytes' => 'setReceivedBytes',
                'receivedParts' => 'setReceivedParts'
            ],
            [
                'status' => 'getStatus',
                'filesize' => 'getFilesize',
                'receivedBytes' => 'getReceivedBytes',
                'receivedParts' => 'getReceivedParts'
            ],
            [
                'status' => null,
                'filesize' => null,
                'receivedBytes' => null,
                'receivedParts' => null
            ],
            null
        );
    }

    const STATUS_MISSING = 'missing';
    const STATUS_UPLOADING = 'uploading';
    const STATUS_UPLOADED = 'uploaded';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getStatusAllowableValues()
    {
        return [
            self::STATUS_MISSING,
            self::STATUS_UPLOADING,
            self::STATUS_UPLOADED,
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
        $this->container['status'] = $data['status'] ?? null;
        $this->container['filesize'] = $data['filesize'] ?? null;
        $this->container['receivedBytes'] = isset($data['receivedBytes']) ?  array_map(function(array $value): BytesRange { return new BytesRange($value); }, $data['receivedBytes']) : null;
        $this->container['receivedParts'] = isset($data['receivedParts']) ? new VideoStatusIngestReceivedParts($data['receivedParts']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * @param string|null $status There are three possible ingest statuses. missing - you are missing information required to ingest the video. uploading - the video is in the process of being uploaded. uploaded - the video is ready for use.
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
     * Gets filesize
     *
     * @return int|null
     */
    public function getFilesize()
    {
        return $this->container['filesize'];
    }

    /**
     * Sets filesize
     *
     * @param int|null $filesize The size of your file in bytes.
     *
     * @return self
     */
    public function setFilesize($filesize)
    {
        $this->container['filesize'] = $filesize;

        return $this;
    }

    /**
     * Gets receivedBytes
     *
     * @return \ApiVideo\Client\Model\BytesRange[]|null
     */
    public function getReceivedBytes()
    {
        return $this->container['receivedBytes'];
    }

    /**
     * Sets receivedBytes
     *
     * @param \ApiVideo\Client\Model\BytesRange[]|null $receivedBytes The total number of bytes received, listed for each chunk of the upload.
     *
     * @return self
     */
    public function setReceivedBytes($receivedBytes)
    {
        $this->container['receivedBytes'] = $receivedBytes;

        return $this;
    }

    /**
     * Gets receivedParts
     *
     * @return \ApiVideo\Client\Model\VideoStatusIngestReceivedParts|null
     */
    public function getReceivedParts()
    {
        return $this->container['receivedParts'];
    }

    /**
     * Sets receivedParts
     *
     * @param \ApiVideo\Client\Model\VideoStatusIngestReceivedParts|null $receivedParts receivedParts
     *
     * @return self
     */
    public function setReceivedParts($receivedParts)
    {
        $this->container['receivedParts'] = $receivedParts;

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


