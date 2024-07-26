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
 * AnalyticsMetricsBreakdownResponseData Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AnalyticsMetricsBreakdownResponseData implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'analytics_metrics_breakdown_response_data',
            [
                'dimensionValue' => 'string',
                'metricValue' => 'float'
            ],
            [
                'dimensionValue' => null,
                'metricValue' => 'float'
            ],
            [
                'dimensionValue' => 'dimensionValue',
                'metricValue' => 'metricValue'
            ],
            [
                'dimensionValue' => 'setDimensionValue',
                'metricValue' => 'setMetricValue'
            ],
            [
                'dimensionValue' => 'getDimensionValue',
                'metricValue' => 'getMetricValue'
            ],
            [
                'dimensionValue' => null,
                'metricValue' => null
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
        $this->container['dimensionValue'] = $data['dimensionValue'] ?? null;
        $this->container['metricValue'] = $data['metricValue'] ?? null;
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
     * Gets dimensionValue
     *
     * @return string|null
     */
    public function getDimensionValue()
    {
        return $this->container['dimensionValue'];
    }

    /**
     * Sets dimensionValue
     *
     * @param string|null $dimensionValue Returns a specific value for the dimension you selected, based on the data. For example if you select `continent` as a dimension, then `dimensionValue` returns values like `EU` or \"AZ\".
     *
     * @return self
     */
    public function setDimensionValue($dimensionValue)
    {
        $this->container['dimensionValue'] = $dimensionValue;

        return $this;
    }

    /**
     * Gets metricValue
     *
     * @return float|null
     */
    public function getMetricValue()
    {
        return $this->container['metricValue'];
    }

    /**
     * Sets metricValue
     *
     * @param float|null $metricValue Returns the data for a specific dimension value.
     *
     * @return self
     */
    public function setMetricValue($metricValue)
    {
        $this->container['metricValue'] = $metricValue;

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


