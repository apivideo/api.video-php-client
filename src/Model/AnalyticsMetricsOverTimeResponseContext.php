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
 * AnalyticsMetricsOverTimeResponseContext Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AnalyticsMetricsOverTimeResponseContext implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'analytics_metrics_over_time_response_context',
            [
                'metric' => 'string',
                'interval' => 'string',
                'timeframe' => '\ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponseContextTimeframe'
            ],
            [
                'metric' => null,
                'interval' => null,
                'timeframe' => null
            ],
            [
                'metric' => 'metric',
                'interval' => 'interval',
                'timeframe' => 'timeframe'
            ],
            [
                'metric' => 'setMetric',
                'interval' => 'setInterval',
                'timeframe' => 'setTimeframe'
            ],
            [
                'metric' => 'getMetric',
                'interval' => 'getInterval',
                'timeframe' => 'getTimeframe'
            ],
            [
                'metric' => null,
                'interval' => null,
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
    const INTERVAL_HOUR = 'hour';
    const INTERVAL_DAY = 'day';

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
    public function getIntervalAllowableValues()
    {
        return [
            self::INTERVAL_HOUR,
            self::INTERVAL_DAY,
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
        $this->container['interval'] = $data['interval'] ?? null;
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

        $allowedValues = $this->getIntervalAllowableValues();
        if (!is_null($this->container['interval']) && !in_array($this->container['interval'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'interval', must be one of '%s'",
                $this->container['interval'],
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
     * Gets interval
     *
     * @return string|null
     */
    public function getInterval()
    {
        return $this->container['interval'];
    }

    /**
     * Sets interval
     *
     * @param string|null $interval Returns the interval you selected.
     *
     * @return self
     */
    public function setInterval($interval)
    {
        $allowedValues = $this->getIntervalAllowableValues();
        if (!is_null($interval) && !in_array($interval, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'interval', must be one of '%s'",
                    $interval,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['interval'] = $interval;

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


