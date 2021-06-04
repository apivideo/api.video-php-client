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
 * VideoAssets Class Doc Comment
 *
 * @category Class
 * @description Collection of details about the video object that you can use to work with the video object.
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoAssets implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-assets',
            [
                'hls' => 'string',
                'iframe' => 'string',
                'player' => 'string',
                'thumbnail' => 'string',
                'mp4' => 'string'
            ],
            [
                'hls' => 'uri',
                'iframe' => null,
                'player' => 'uri',
                'thumbnail' => 'uri',
                'mp4' => 'uri'
            ],
            [
                'hls' => 'hls',
                'iframe' => 'iframe',
                'player' => 'player',
                'thumbnail' => 'thumbnail',
                'mp4' => 'mp4'
            ],
            [
                'hls' => 'setHls',
                'iframe' => 'setIframe',
                'player' => 'setPlayer',
                'thumbnail' => 'setThumbnail',
                'mp4' => 'setMp4'
            ],
            [
                'hls' => 'getHls',
                'iframe' => 'getIframe',
                'player' => 'getPlayer',
                'thumbnail' => 'getThumbnail',
                'mp4' => 'getMp4'
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
        $this->container['mp4'] = $data['mp4'] ?? null;
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
     * @param string|null $hls This is the manifest URL. For HTTP Live Streaming (HLS), when a HLS video stream is initiated, the first file to download is the manifest. This file has the extension M3U8, and provides the video player with information about the various bitrates available for streaming.
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
     * @param string|null $iframe Code to use video from a third party website
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
     * @param string|null $player Raw url of the player.
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
     * @param string|null $thumbnail Poster of the video.
     *
     * @return self
     */
    public function setThumbnail($thumbnail)
    {
        $this->container['thumbnail'] = $thumbnail;

        return $this;
    }

    /**
     * Gets mp4
     *
     * @return string|null
     */
    public function getMp4()
    {
        return $this->container['mp4'];
    }

    /**
     * Sets mp4
     *
     * @param string|null $mp4 Available only if mp4Support is enabled. Raw mp4 url.
     *
     * @return self
     */
    public function setMp4($mp4)
    {
        $this->container['mp4'] = $mp4;

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


