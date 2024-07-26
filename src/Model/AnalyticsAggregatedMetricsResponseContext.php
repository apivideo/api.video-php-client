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
 * AnalyticsAggregatedMetricsResponseContext Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AnalyticsAggregatedMetricsResponseContext implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'analytics_aggregated_metrics_response_context',
            [
                'metric' => 'string',
                'aggregation' => 'string',
                'timeframe' => '\ApiVideo\Client\Model\AnalyticsAggregatedMetricsResponseContextTimeframe'
            ],
            [
                'metric' => null,
                'aggregation' => null,
                'timeframe' => null
            ],
            [
                'metric' => 'metric',
                'aggregation' => 'aggregation',
                'timeframe' => 'timeframe'
            ],
            [
                'metric' => 'setMetric',
                'aggregation' => 'setAggregation',
                'timeframe' => 'setTimeframe'
            ],
            [
                'metric' => 'getMetric',
                'aggregation' => 'getAggregation',
                'timeframe' => 'getTimeframe'
            ],
            [
                'metric' => null,
                'aggregation' => null,
                'timeframe' => null
            ],
            null
        );
    }

    const METRIC_PLAY = 'play';
    const METRIC_START = 'start';
    const METRIC_END = 'end';
    const METRIC_IMPRESSION = 'impression';
    const METRIC_IMPRESSION_TIME = 'impression-time';
    const METRIC_WATCH_TIME = 'watch-time';
    const AGGREGATION_COUNT = 'count';
    const AGGREGATION_RATE = 'rate';
    const AGGREGATION_TOTAL = 'total';
    const AGGREGATION_AVERAGE = 'average';
    const AGGREGATION_SUM = 'sum';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMetricAllowableValues()
    {
        return [
            self::METRIC_PLAY,
            self::METRIC_START,
            self::METRIC_END,
            self::METRIC_IMPRESSION,
            self::METRIC_IMPRESSION_TIME,
            self::METRIC_WATCH_TIME,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getAggregationAllowableValues()
    {
        return [
            self::AGGREGATION_COUNT,
            self::AGGREGATION_RATE,
            self::AGGREGATION_TOTAL,
            self::AGGREGATION_AVERAGE,
            self::AGGREGATION_SUM,
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
        $this->container['aggregation'] = $data['aggregation'] ?? null;
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

        $allowedValues = $this->getAggregationAllowableValues();
        if (!is_null($this->container['aggregation']) && !in_array($this->container['aggregation'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'aggregation', must be one of '%s'",
                $this->container['aggregation'],
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
     * Gets aggregation
     *
     * @return string|null
     */
    public function getAggregation()
    {
        return $this->container['aggregation'];
    }

    /**
     * Sets aggregation
     *
     * @param string|null $aggregation Returns the aggregation you selected.
     *
     * @return self
     */
    public function setAggregation($aggregation)
    {
        $allowedValues = $this->getAggregationAllowableValues();
        if (!is_null($aggregation) && !in_array($aggregation, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'aggregation', must be one of '%s'",
                    $aggregation,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['aggregation'] = $aggregation;

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


