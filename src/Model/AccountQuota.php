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
 * AccountQuota Class Doc Comment
 *
 * @category Class
 * @description Deprecated
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AccountQuota implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'account_quota',
            [
                'quotaUsed' => 'float',
                'quotaRemaining' => 'float',
                'quotaTotal' => 'float'
            ],
            [
                'quotaUsed' => null,
                'quotaRemaining' => null,
                'quotaTotal' => null
            ],
            [
                'quotaUsed' => 'quotaUsed',
                'quotaRemaining' => 'quotaRemaining',
                'quotaTotal' => 'quotaTotal'
            ],
            [
                'quotaUsed' => 'setQuotaUsed',
                'quotaRemaining' => 'setQuotaRemaining',
                'quotaTotal' => 'setQuotaTotal'
            ],
            [
                'quotaUsed' => 'getQuotaUsed',
                'quotaRemaining' => 'getQuotaRemaining',
                'quotaTotal' => 'getQuotaTotal'
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
        $this->container['quotaUsed'] = $data['quotaUsed'] ?? null;
        $this->container['quotaRemaining'] = $data['quotaRemaining'] ?? null;
        $this->container['quotaTotal'] = $data['quotaTotal'] ?? null;
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
     * Gets quotaUsed
     *
     * @return float|null
     */
    public function getQuotaUsed()
    {
        return $this->container['quotaUsed'];
    }

    /**
     * Sets quotaUsed
     *
     * @param float|null $quotaUsed Deprecated
     *
     * @return self
     */
    public function setQuotaUsed($quotaUsed)
    {
        $this->container['quotaUsed'] = $quotaUsed;

        return $this;
    }

    /**
     * Gets quotaRemaining
     *
     * @return float|null
     */
    public function getQuotaRemaining()
    {
        return $this->container['quotaRemaining'];
    }

    /**
     * Sets quotaRemaining
     *
     * @param float|null $quotaRemaining Deprecated
     *
     * @return self
     */
    public function setQuotaRemaining($quotaRemaining)
    {
        $this->container['quotaRemaining'] = $quotaRemaining;

        return $this;
    }

    /**
     * Gets quotaTotal
     *
     * @return float|null
     */
    public function getQuotaTotal()
    {
        return $this->container['quotaTotal'];
    }

    /**
     * Sets quotaTotal
     *
     * @param float|null $quotaTotal Deprecated
     *
     * @return self
     */
    public function setQuotaTotal($quotaTotal)
    {
        $this->container['quotaTotal'] = $quotaTotal;

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


