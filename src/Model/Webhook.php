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
 * Webhook Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Webhook implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'webhook',
            [
                'webhookId' => 'string',
                'createdAt' => '\DateTime',
                'events' => 'string[]',
                'url' => 'string'
            ],
            [
                'webhookId' => null,
                'createdAt' => 'date-time',
                'events' => null,
                'url' => null
            ],
            [
                'webhookId' => 'webhookId',
                'createdAt' => 'createdAt',
                'events' => 'events',
                'url' => 'url'
            ],
            [
                'webhookId' => 'setWebhookId',
                'createdAt' => 'setCreatedAt',
                'events' => 'setEvents',
                'url' => 'setUrl'
            ],
            [
                'webhookId' => 'getWebhookId',
                'createdAt' => 'getCreatedAt',
                'events' => 'getEvents',
                'url' => 'getUrl'
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
        $this->container['webhookId'] = $data['webhookId'] ?? null;
        $this->container['createdAt'] = $data['createdAt'] ?? null;
        $this->container['events'] = $data['events'] ?? null;
        $this->container['url'] = $data['url'] ?? null;
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
     * Gets webhookId
     *
     * @return string|null
     */
    public function getWebhookId()
    {
        return $this->container['webhookId'];
    }

    /**
     * Sets webhookId
     *
     * @param string|null $webhookId Unique identifier of the webhook
     *
     * @return self
     */
    public function setWebhookId($webhookId)
    {
        $this->container['webhookId'] = $webhookId;

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
     * @param \DateTime|null $createdAt When an webhook was created, presented in ISO-8601 format.
     *
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->container['createdAt'] = $createdAt;

        return $this;
    }

    /**
     * Gets events
     *
     * @return string[]|null
     */
    public function getEvents()
    {
        return $this->container['events'];
    }

    /**
     * Sets events
     *
     * @param string[]|null $events A list of events that will trigger the webhook.
     *
     * @return self
     */
    public function setEvents($events)
    {
        $this->container['events'] = $events;

        return $this;
    }

    /**
     * Gets url
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url
     *
     * @param string|null $url URL of the webhook
     *
     * @return self
     */
    public function setUrl($url)
    {
        $this->container['url'] = $url;

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


