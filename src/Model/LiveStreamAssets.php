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
 * LiveStreamAssets Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class LiveStreamAssets implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'live-stream-assets',
            [
                'hls' => 'string',
                'iframe' => 'string',
                'player' => 'string',
                'thumbnail' => 'string'
            ],
            [
                'hls' => 'uri',
                'iframe' => null,
                'player' => 'uri',
                'thumbnail' => 'uri'
            ],
            [
                'hls' => 'hls',
                'iframe' => 'iframe',
                'player' => 'player',
                'thumbnail' => 'thumbnail'
            ],
            [
                'hls' => 'setHls',
                'iframe' => 'setIframe',
                'player' => 'setPlayer',
                'thumbnail' => 'setThumbnail'
            ],
            [
                'hls' => 'getHls',
                'iframe' => 'getIframe',
                'player' => 'getPlayer',
                'thumbnail' => 'getThumbnail'
            ],
            [
                'hls' => null,
                'iframe' => null,
                'player' => null,
                'thumbnail' => null
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
        $this->container['hls'] = $data['hls'] ?? null;
        $this->container['iframe'] = $data['iframe'] ?? null;
        $this->container['player'] = $data['player'] ?? null;
        $this->container['thumbnail'] = $data['thumbnail'] ?? null;
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
     * Gets hls
     *
     * @return string|null
     */
    public function getHls()
    {
        return $this->container['hls'];
    }

    /**
     * Sets hls
     *
     * @param string|null $hls The http live streaming (HLS) link for your live video stream.
     *
     * @return self
     */
    public function setHls($hls)
    {
        $this->container['hls'] = $hls;

        return $this;
    }

    /**
     * Gets iframe
     *
     * @return string|null
     */
    public function getIframe()
    {
        return $this->container['iframe'];
    }

    /**
     * Sets iframe
     *
     * @param string|null $iframe The embed code for the iframe containing your live video stream.
     *
     * @return self
     */
    public function setIframe($iframe)
    {
        $this->container['iframe'] = $iframe;

        return $this;
    }

    /**
     * Gets player
     *
     * @return string|null
     */
    public function getPlayer()
    {
        return $this->container['player'];
    }

    /**
     * Sets player
     *
     * @param string|null $player A link to the video player that is playing your live stream.
     *
     * @return self
     */
    public function setPlayer($player)
    {
        $this->container['player'] = $player;

        return $this;
    }

    /**
     * Gets thumbnail
     *
     * @return string|null
     */
    public function getThumbnail()
    {
        return $this->container['thumbnail'];
    }

    /**
     * Sets thumbnail
     *
     * @param string|null $thumbnail A link to the thumbnail for your video.
     *
     * @return self
     */
    public function setThumbnail($thumbnail)
    {
        $this->container['thumbnail'] = $thumbnail;

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


