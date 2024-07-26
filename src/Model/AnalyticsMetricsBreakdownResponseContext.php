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
 * AnalyticsMetricsBreakdownResponseContext Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AnalyticsMetricsBreakdownResponseContext implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'analytics_metrics_breakdown_response_context',
            [
                'metric' => 'string',
                'breakdown' => 'string',
                'timeframe' => '\ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponseContextTimeframe'
            ],
            [
                'metric' => null,
                'breakdown' => null,
                'timeframe' => null
            ],
            [
                'metric' => 'metric',
                'breakdown' => 'breakdown',
                'timeframe' => 'timeframe'
            ],
            [
                'metric' => 'setMetric',
                'breakdown' => 'setBreakdown',
                'timeframe' => 'setTimeframe'
            ],
            [
                'metric' => 'getMetric',
                'breakdown' => 'getBreakdown',
                'timeframe' => 'getTimeframe'
            ],
            [
                'metric' => null,
                'breakdown' => null,
                'timeframe' => null
            ],
            null
        );
    }

    const METRIC_PLAY = 'play';
    const METRIC_PLAY_RATE = 'play-rate';
    const METRIC_START = 'start';
    const METRIC_END = 'end';
    const METRIC_IMPRESSION = 'impression';
    const BREAKDOWN_MEDIA_ID = 'media-id';
    const BREAKDOWN_MEDIA_TYPE = 'media-type';
    const BREAKDOWN_CONTINENT = 'continent';
    const BREAKDOWN_COUNTRY = 'country';
    const BREAKDOWN_DEVICE_TYPE = 'device-type';
    const BREAKDOWN_OPERATING_SYSTEM = 'operating-system';
    const BREAKDOWN_BROWSER = 'browser';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMetricAllowableValues()
    {
        return [
            self::METRIC_PLAY,
            self::METRIC_PLAY_RATE,
            self::METRIC_START,
            self::METRIC_END,
            self::METRIC_IMPRESSION,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getBreakdownAllowableValues()
    {
        return [
            self::BREAKDOWN_MEDIA_ID,
            self::BREAKDOWN_MEDIA_TYPE,
            self::BREAKDOWN_CONTINENT,
            self::BREAKDOWN_COUNTRY,
            self::BREAKDOWN_DEVICE_TYPE,
            self::BREAKDOWN_OPERATING_SYSTEM,
            self::BREAKDOWN_BROWSER,
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
        $this->container['metric'] = $data['metric'] ?? null;
        $this->container['breakdown'] = $data['breakdown'] ?? null;
        $this->container['timeframe'] = isset($data['timeframe']) ? new AnalyticsAggregatedMetricsResponseContextTimeframe($data['timeframe']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getMetricAllowableValues();
        if (!is_null($this->container['metric']) && !in_array($this->container['metric'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'metric', must be one of '%s'",
                $this->container['metric'],
                implode("', '", $allowedValues)
            );
        }

        $allowedValues = $this->getBreakdownAllowableValues();
        if (!is_null($this->container['breakdown']) && !in_array($this->container['breakdown'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'breakdown', must be one of '%s'",
                $this->container['breakdown'],
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
     * Gets metric
     *
     * @return string|null
     */
    public function getMetric()
    {
        return $this->container['metric'];
    }

    /**
     * Sets metric
     *
     * @param string|null $metric Returns the metric you selected.
     *
     * @return self
     */
    public function setMetric($metric)
    {
        $allowedValues = $this->getMetricAllowableValues();
        if (!is_null($metric) && !in_array($metric, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'metric', must be one of '%s'",
                    $metric,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['metric'] = $metric;

        return $this;
    }

    /**
     * Gets breakdown
     *
     * @return string|null
     */
    public function getBreakdown()
    {
        return $this->container['breakdown'];
    }

    /**
     * Sets breakdown
     *
     * @param string|null $breakdown Returns the dimension you selected.
     *
     * @return self
     */
    public function setBreakdown($breakdown)
    {
        $allowedValues = $this->getBreakdownAllowableValues();
        if (!is_null($breakdown) && !in_array($breakdown, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'breakdown', must be one of '%s'",
                    $breakdown,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['breakdown'] = $breakdown;

        return $this;
    }

    /**
     * Gets timeframe
     *
     * @return \ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponseContextTimeframe|null
     */
    public function getTimeframe()
    {
        return $this->container['timeframe'];
    }

    /**
     * Sets timeframe
     *
     * @param \ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponseContextTimeframe|null $timeframe timeframe
     *
     * @return self
     */
    public function setTimeframe($timeframe)
    {
        $this->container['timeframe'] = $timeframe;

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


