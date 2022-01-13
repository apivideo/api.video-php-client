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
 * AccessToken Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class AccessToken implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'access-token',
            [
                'accessToken' => 'string',
                'tokenType' => 'string',
                'refreshToken' => 'string',
                'expiresIn' => 'int'
            ],
            [
                'accessToken' => null,
                'tokenType' => null,
                'refreshToken' => null,
                'expiresIn' => null
            ],
            [
                'accessToken' => 'access_token',
                'tokenType' => 'token_type',
                'refreshToken' => 'refresh_token',
                'expiresIn' => 'expires_in'
            ],
            [
                'accessToken' => 'setAccessToken',
                'tokenType' => 'setTokenType',
                'refreshToken' => 'setRefreshToken',
                'expiresIn' => 'setExpiresIn'
            ],
            [
                'accessToken' => 'getAccessToken',
                'tokenType' => 'getTokenType',
                'refreshToken' => 'getRefreshToken',
                'expiresIn' => 'getExpiresIn'
            ],
            [
                'accessToken' => null,
                'tokenType' => null,
                'refreshToken' => null,
                'expiresIn' => null
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
        $this->container['accessToken'] = $data['accessToken'] ?? null;
        $this->container['tokenType'] = $data['tokenType'] ?? 'bearer';
        $this->container['refreshToken'] = $data['refreshToken'] ?? null;
        $this->container['expiresIn'] = $data['expiresIn'] ?? null;
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
     * Gets accessToken
     *
     * @return string|null
     */
    public function getAccessToken()
    {
        return $this->container['accessToken'];
    }

    /**
     * Sets accessToken
     *
     * @param string|null $accessToken The access token containing security credentials allowing you to acccess the API. The token lasts for one hour.
     *
     * @return self
     */
    public function setAccessToken($accessToken)
    {
        $this->container['accessToken'] = $accessToken;

        return $this;
    }

    /**
     * Gets tokenType
     *
     * @return string|null
     */
    public function getTokenType()
    {
        return $this->container['tokenType'];
    }

    /**
     * Sets tokenType
     *
     * @param string|null $tokenType The type of token you have.
     *
     * @return self
     */
    public function setTokenType($tokenType)
    {
        $this->container['tokenType'] = $tokenType;

        return $this;
    }

    /**
     * Gets refreshToken
     *
     * @return string|null
     */
    public function getRefreshToken()
    {
        return $this->container['refreshToken'];
    }

    /**
     * Sets refreshToken
     *
     * @param string|null $refreshToken A token you can use to get the next access token when your current access token expires.
     *
     * @return self
     */
    public function setRefreshToken($refreshToken)
    {
        $this->container['refreshToken'] = $refreshToken;

        return $this;
    }

    /**
     * Gets expiresIn
     *
     * @return int|null
     */
    public function getExpiresIn()
    {
        return $this->container['expiresIn'];
    }

    /**
     * Sets expiresIn
     *
     * @param int|null $expiresIn Lists the time in seconds when your access token expires. It lasts for one hour.
     *
     * @return self
     */
    public function setExpiresIn($expiresIn)
    {
        $this->container['expiresIn'] = $expiresIn;

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


