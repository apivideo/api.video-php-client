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
 * AnalyticsAggregatedMetricsResponseContextTimeframe Class Doc Comment
 *
 * @category Class
 * @description Returns the starting and ending date-times of the period you want analytics for.
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AnalyticsAggregatedMetricsResponseContextTimeframe implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'analytics_aggregated_metrics_response_context_timeframe',
            [
                'from' => '\DateTime',
                'to' => '\DateTime'
            ],
            [
                'from' => 'date-time',
                'to' => 'date-time'
            ],
            [
                'from' => 'from',
                'to' => 'to'
            ],
            [
                'from' => 'setFrom',
                'to' => 'setTo'
            ],
            [
                'from' => 'getFrom',
                'to' => 'getTo'
            ],
            [
                'from' => null,
                'to' => null
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
        $this->container['from'] = isset($data['from']) ? new \DateTime($data['from']) : null;
        $this->container['to'] = isset($data['to']) ? new \DateTime($data['to']) : null;
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
     * Gets from
     *
     * @return \DateTime|null
     */
    public function getFrom()
    {
        return $this->container['from'];
    }

    /**
     * Sets from
     *
     * @param \DateTime|null $from Returns the starting date-time of the period you want analytics for in ATOM date-time format.
     *
     * @return self
     */
    public function setFrom($from)
    {
        $this->container['from'] = $from;

        return $this;
    }

    /**
     * Gets to
     *
     * @return \DateTime|null
     */
    public function getTo()
    {
        return $this->container['to'];
    }

    /**
     * Sets to
     *
     * @param \DateTime|null $to Returns the starting date-time of the period you want analytics for in ATOM date-time format.
     *
     * @return self
     */
    public function setTo($to)
    {
        $this->container['to'] = $to;

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


