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
 * VideoSession Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoSession implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-session',
            [
                'session' => '\ApiVideo\Client\Model\VideoSessionSession',
                'location' => '\ApiVideo\Client\Model\VideoSessionLocation',
                'referrer' => '\ApiVideo\Client\Model\VideoSessionReferrer',
                'device' => '\ApiVideo\Client\Model\VideoSessionDevice',
                'os' => '\ApiVideo\Client\Model\VideoSessionOs',
                'client' => '\ApiVideo\Client\Model\VideoSessionClient'
            ],
            [
                'session' => null,
                'location' => null,
                'referrer' => null,
                'device' => null,
                'os' => null,
                'client' => null
            ],
            [
                'session' => 'session',
                'location' => 'location',
                'referrer' => 'referrer',
                'device' => 'device',
                'os' => 'os',
                'client' => 'client'
            ],
            [
                'session' => 'setSession',
                'location' => 'setLocation',
                'referrer' => 'setReferrer',
                'device' => 'setDevice',
                'os' => 'setOs',
                'client' => 'setClient'
            ],
            [
                'session' => 'getSession',
                'location' => 'getLocation',
                'referrer' => 'getReferrer',
                'device' => 'getDevice',
                'os' => 'getOs',
                'client' => 'getClient'
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
        $this->container['session'] = $data['session'] ?? null;
        $this->container['location'] = $data['location'] ?? null;
        $this->container['referrer'] = $data['referrer'] ?? null;
        $this->container['device'] = $data['device'] ?? null;
        $this->container['os'] = $data['os'] ?? null;
        $this->container['client'] = $data['client'] ?? null;
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
     * Gets session
     *
     * @return \ApiVideo\Client\Model\VideoSessionSession|null
     */
    public function getSession()
    {
        return $this->container['session'];
    }

    /**
     * Sets session
     *
     * @param \ApiVideo\Client\Model\VideoSessionSession|null $session session
     *
     * @return self
     */
    public function setSession($session)
    {
        $this->container['session'] = $session;

        return $this;
    }

    /**
     * Gets location
     *
     * @return \ApiVideo\Client\Model\VideoSessionLocation|null
     */
    public function getLocation()
    {
        return $this->container['location'];
    }

    /**
     * Sets location
     *
     * @param \ApiVideo\Client\Model\VideoSessionLocation|null $location location
     *
     * @return self
     */
    public function setLocation($location)
    {
        $this->container['location'] = $location;

        return $this;
    }

    /**
     * Gets referrer
     *
     * @return \ApiVideo\Client\Model\VideoSessionReferrer|null
     */
    public function getReferrer()
    {
        return $this->container['referrer'];
    }

    /**
     * Sets referrer
     *
     * @param \ApiVideo\Client\Model\VideoSessionReferrer|null $referrer referrer
     *
     * @return self
     */
    public function setReferrer($referrer)
    {
        $this->container['referrer'] = $referrer;

        return $this;
    }

    /**
     * Gets device
     *
     * @return \ApiVideo\Client\Model\VideoSessionDevice|null
     */
    public function getDevice()
    {
        return $this->container['device'];
    }

    /**
     * Sets device
     *
     * @param \ApiVideo\Client\Model\VideoSessionDevice|null $device device
     *
     * @return self
     */
    public function setDevice($device)
    {
        $this->container['device'] = $device;

        return $this;
    }

    /**
     * Gets os
     *
     * @return \ApiVideo\Client\Model\VideoSessionOs|null
     */
    public function getOs()
    {
        return $this->container['os'];
    }

    /**
     * Sets os
     *
     * @param \ApiVideo\Client\Model\VideoSessionOs|null $os os
     *
     * @return self
     */
    public function setOs($os)
    {
        $this->container['os'] = $os;

        return $this;
    }

    /**
     * Gets client
     *
     * @return \ApiVideo\Client\Model\VideoSessionClient|null
     */
    public function getClient()
    {
        return $this->container['client'];
    }

    /**
     * Sets client
     *
     * @param \ApiVideo\Client\Model\VideoSessionClient|null $client client
     *
     * @return self
     */
    public function setClient($client)
    {
        $this->container['client'] = $client;

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


