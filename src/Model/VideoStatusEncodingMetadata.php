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
 * VideoStatusEncodingMetadata Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoStatusEncodingMetadata implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-status-encoding-metadata',
            [
                'width' => 'int',
                'height' => 'int',
                'bitrate' => 'float',
                'duration' => 'int',
                'framerate' => 'int',
                'samplerate' => 'int',
                'videoCodec' => 'string',
                'audioCodec' => 'string',
                'aspectRatio' => 'string'
            ],
            [
                'width' => null,
                'height' => null,
                'bitrate' => null,
                'duration' => null,
                'framerate' => null,
                'samplerate' => null,
                'videoCodec' => null,
                'audioCodec' => null,
                'aspectRatio' => null
            ],
            [
                'width' => 'width',
                'height' => 'height',
                'bitrate' => 'bitrate',
                'duration' => 'duration',
                'framerate' => 'framerate',
                'samplerate' => 'samplerate',
                'videoCodec' => 'videoCodec',
                'audioCodec' => 'audioCodec',
                'aspectRatio' => 'aspectRatio'
            ],
            [
                'width' => 'setWidth',
                'height' => 'setHeight',
                'bitrate' => 'setBitrate',
                'duration' => 'setDuration',
                'framerate' => 'setFramerate',
                'samplerate' => 'setSamplerate',
                'videoCodec' => 'setVideoCodec',
                'audioCodec' => 'setAudioCodec',
                'aspectRatio' => 'setAspectRatio'
            ],
            [
                'width' => 'getWidth',
                'height' => 'getHeight',
                'bitrate' => 'getBitrate',
                'duration' => 'getDuration',
                'framerate' => 'getFramerate',
                'samplerate' => 'getSamplerate',
                'videoCodec' => 'getVideoCodec',
                'audioCodec' => 'getAudioCodec',
                'aspectRatio' => 'getAspectRatio'
            ],
            [
                'width' => null,
                'height' => null,
                'bitrate' => null,
                'duration' => null,
                'framerate' => null,
                'samplerate' => null,
                'videoCodec' => null,
                'audioCodec' => null,
                'aspectRatio' => null
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
        $this->container['width'] = $data['width'] ?? null;
        $this->container['height'] = $data['height'] ?? null;
        $this->container['bitrate'] = $data['bitrate'] ?? null;
        $this->container['duration'] = $data['duration'] ?? null;
        $this->container['framerate'] = $data['framerate'] ?? null;
        $this->container['samplerate'] = $data['samplerate'] ?? null;
        $this->container['videoCodec'] = $data['videoCodec'] ?? null;
        $this->container['audioCodec'] = $data['audioCodec'] ?? null;
        $this->container['aspectRatio'] = $data['aspectRatio'] ?? null;
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
     * Gets width
     *
     * @return int|null
     */
    public function getWidth()
    {
        return $this->container['width'];
    }

    /**
     * Sets width
     *
     * @param int|null $width The width of the video in pixels.
     *
     * @return self
     */
    public function setWidth($width)
    {
        $this->container['width'] = $width;

        return $this;
    }

    /**
     * Gets height
     *
     * @return int|null
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height
     *
     * @param int|null $height The height of the video in pixels.
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets bitrate
     *
     * @return float|null
     */
    public function getBitrate()
    {
        return $this->container['bitrate'];
    }

    /**
     * Sets bitrate
     *
     * @param float|null $bitrate The number of bits processed per second.
     *
     * @return self
     */
    public function setBitrate($bitrate)
    {
        $this->container['bitrate'] = $bitrate;

        return $this;
    }

    /**
     * Gets duration
     *
     * @return int|null
     */
    public function getDuration()
    {
        return $this->container['duration'];
    }

    /**
     * Sets duration
     *
     * @param int|null $duration The length of the video.
     *
     * @return self
     */
    public function setDuration($duration)
    {
        $this->container['duration'] = $duration;

        return $this;
    }

    /**
     * Gets framerate
     *
     * @return int|null
     */
    public function getFramerate()
    {
        return $this->container['framerate'];
    }

    /**
     * Sets framerate
     *
     * @param int|null $framerate The frequency with which consecutive images or frames appear on a display. Shown in this API as frames per second (fps).
     *
     * @return self
     */
    public function setFramerate($framerate)
    {
        $this->container['framerate'] = $framerate;

        return $this;
    }

    /**
     * Gets samplerate
     *
     * @return int|null
     */
    public function getSamplerate()
    {
        return $this->container['samplerate'];
    }

    /**
     * Sets samplerate
     *
     * @param int|null $samplerate How many samples per second a digital audio system uses to record an audio signal. The higher the rate, the higher the frequencies that can be recorded. They are presented in this API using hertz.
     *
     * @return self
     */
    public function setSamplerate($samplerate)
    {
        $this->container['samplerate'] = $samplerate;

        return $this;
    }

    /**
     * Gets videoCodec
     *
     * @return string|null
     */
    public function getVideoCodec()
    {
        return $this->container['videoCodec'];
    }

    /**
     * Sets videoCodec
     *
     * @param string|null $videoCodec The method used to compress and decompress digital video. API Video supports all codecs in the libavcodec library.
     *
     * @return self
     */
    public function setVideoCodec($videoCodec)
    {
        $this->container['videoCodec'] = $videoCodec;

        return $this;
    }

    /**
     * Gets audioCodec
     *
     * @return string|null
     */
    public function getAudioCodec()
    {
        return $this->container['audioCodec'];
    }

    /**
     * Sets audioCodec
     *
     * @param string|null $audioCodec The method used to compress and decompress digital audio for your video.
     *
     * @return self
     */
    public function setAudioCodec($audioCodec)
    {
        $this->container['audioCodec'] = $audioCodec;

        return $this;
    }

    /**
     * Gets aspectRatio
     *
     * @return string|null
     */
    public function getAspectRatio()
    {
        return $this->container['aspectRatio'];
    }

    /**
     * Sets aspectRatio
     *
     * @param string|null $aspectRatio aspectRatio
     *
     * @return self
     */
    public function setAspectRatio($aspectRatio)
    {
        $this->container['aspectRatio'] = $aspectRatio;

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


