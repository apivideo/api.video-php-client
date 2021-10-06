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
 * Account Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Account implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'account',
            [
                'quota' => '\ApiVideo\Client\Model\AccountQuota',
                'features' => 'string[]',
                'environment' => 'string'
            ],
            [
                'quota' => null,
                'features' => null,
                'environment' => null
            ],
            [
                'quota' => 'quota',
                'features' => 'features',
                'environment' => 'environment'
            ],
            [
                'quota' => 'setQuota',
                'features' => 'setFeatures',
                'environment' => 'setEnvironment'
            ],
            [
                'quota' => 'getQuota',
                'features' => 'getFeatures',
                'environment' => 'getEnvironment'
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
        $this->container['quota'] = isset($data['quota']) ? new AccountQuota($data['quota']) : null;
        $this->container['features'] = $data['features'] ?? null;
        $this->container['environment'] = $data['environment'] ?? null;
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
     * Gets quota
     *
     * @return \ApiVideo\Client\Model\AccountQuota|null
     */
    public function getQuota()
    {
        return $this->container['quota'];
    }

    /**
     * Sets quota
     *
     * @param \ApiVideo\Client\Model\AccountQuota|null $quota quota
     *
     * @return self
     */
    public function setQuota($quota)
    {
        $this->container['quota'] = $quota;

        return $this;
    }

    /**
     * Gets features
     *
     * @return string[]|null
     */
    public function getFeatures()
    {
        return $this->container['features'];
    }

    /**
     * Sets features
     *
     * @param string[]|null $features Deprecated. What features are enabled for your account. Choices include: app.dynamic_metadata - the ability to dynamically tag videos to better segment and understand your audiences, app.event_log - the ability to create and retrieve a log detailing how your videos were interacted with, player.white_label - the ability to customise your player, stats.player_events - the ability to see statistics about how your player is being used, transcode.mp4_support - the ability to reformat content into mp4 using the H264 codec.
     *
     * @return self
     */
    public function setFeatures($features)
    {
        $this->container['features'] = $features;

        return $this;
    }

    /**
     * Gets environment
     *
     * @return string|null
     */
    public function getEnvironment()
    {
        return $this->container['environment'];
    }

    /**
     * Sets environment
     *
     * @param string|null $environment Deprecated. Whether you are using your production or sandbox API key will impact what environment is displayed here, as well as stats and features information. If you use your sandbox key, the environment is \"sandbox.\" If you use your production key, the environment is \"production.\"
     *
     * @return self
     */
    public function setEnvironment($environment)
    {
        $this->container['environment'] = $environment;

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


