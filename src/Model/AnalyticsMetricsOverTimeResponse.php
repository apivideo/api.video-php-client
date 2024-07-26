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
 * AnalyticsMetricsOverTimeResponse Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AnalyticsMetricsOverTimeResponse implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'analytics-metrics-over-time-response',
            [
                'context' => '\ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponseContext',
                'data' => '\ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponseData[]',
                'pagination' => '\ApiVideo\Client\Model\Pagination'
            ],
            [
                'context' => null,
                'data' => null,
                'pagination' => null
            ],
            [
                'context' => 'context',
                'data' => 'data',
                'pagination' => 'pagination'
            ],
            [
                'context' => 'setContext',
                'data' => 'setData',
                'pagination' => 'setPagination'
            ],
            [
                'context' => 'getContext',
                'data' => 'getData',
                'pagination' => 'getPagination'
            ],
            [
                'context' => null,
                'data' => null,
                'pagination' => null
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
        $this->container['context'] = isset($data['context']) ? new AnalyticsMetricsOverTimeResponseContext($data['context']) : null;
        $this->container['data'] = isset($data['data']) ?  array_map(function(array $value): AnalyticsMetricsOverTimeResponseData { return new AnalyticsMetricsOverTimeResponseData($value); }, $data['data']) : null;
        $this->container['pagination'] = isset($data['pagination']) ? new Pagination($data['pagination']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['context'] === null) {
            $invalidProperties[] = "'context' can't be null";
        }
        if ($this->container['data'] === null) {
            $invalidProperties[] = "'data' can't be null";
        }
        if ($this->container['pagination'] === null) {
            $invalidProperties[] = "'pagination' can't be null";
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
     * Gets context
     *
     * @return \ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponseContext
     */
    public function getContext()
    {
        return $this->container['context'];
    }

    /**
     * Sets context
     *
     * @param \ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponseContext $context context
     *
     * @return self
     */
    public function setContext($context)
    {
        $this->container['context'] = $context;

        return $this;
    }

    /**
     * Gets data
     *
     * @return \ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponseData[]
     */
    public function getData()
    {
        return $this->container['data'];
    }

    /**
     * Sets data
     *
     * @param \ApiVideo\Client\Model\AnalyticsMetricsOverTimeResponseData[] $data Returns an array of metrics and the timestamps .
     *
     * @return self
     */
    public function setData($data)
    {
        $this->container['data'] = $data;

        return $this;
    }

    /**
     * Gets pagination
     *
     * @return \ApiVideo\Client\Model\Pagination
     */
    public function getPagination()
    {
        return $this->container['pagination'];
    }

    /**
     * Sets pagination
     *
     * @param \ApiVideo\Client\Model\Pagination $pagination pagination
     *
     * @return self
     */
    public function setPagination($pagination)
    {
        $this->container['pagination'] = $pagination;

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


