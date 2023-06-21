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
 * VideoWatermark Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoWatermark implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-watermark',
            [
                'id' => 'string',
                'top' => 'string',
                'left' => 'string',
                'bottom' => 'string',
                'right' => 'string',
                'width' => 'string',
                'height' => 'string',
                'opacity' => 'string'
            ],
            [
                'id' => null,
                'top' => null,
                'left' => null,
                'bottom' => null,
                'right' => null,
                'width' => null,
                'height' => null,
                'opacity' => null
            ],
            [
                'id' => 'id',
                'top' => 'top',
                'left' => 'left',
                'bottom' => 'bottom',
                'right' => 'right',
                'width' => 'width',
                'height' => 'height',
                'opacity' => 'opacity'
            ],
            [
                'id' => 'setId',
                'top' => 'setTop',
                'left' => 'setLeft',
                'bottom' => 'setBottom',
                'right' => 'setRight',
                'width' => 'setWidth',
                'height' => 'setHeight',
                'opacity' => 'setOpacity'
            ],
            [
                'id' => 'getId',
                'top' => 'getTop',
                'left' => 'getLeft',
                'bottom' => 'getBottom',
                'right' => 'getRight',
                'width' => 'getWidth',
                'height' => 'getHeight',
                'opacity' => 'getOpacity'
            ],
            [
                'id' => null,
                'top' => null,
                'left' => null,
                'bottom' => null,
                'right' => null,
                'width' => null,
                'height' => null,
                'opacity' => null
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
        $this->container['id'] = $data['id'] ?? null;
        $this->container['top'] = $data['top'] ?? null;
        $this->container['left'] = $data['left'] ?? null;
        $this->container['bottom'] = $data['bottom'] ?? null;
        $this->container['right'] = $data['right'] ?? null;
        $this->container['width'] = $data['width'] ?? null;
        $this->container['height'] = $data['height'] ?? null;
        $this->container['opacity'] = $data['opacity'] ?? null;
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
     * Gets id
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id
     *
     * @param string|null $id id of the watermark
     *
     * @return self
     */
    public function setId($id)
    {
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets top
     *
     * @return string|null
     */
    public function getTop()
    {
        return $this->container['top'];
    }

    /**
     * Sets top
     *
     * @param string|null $top Distance expressed in px or % between the top-border of the video and the watermark-image.
     *
     * @return self
     */
    public function setTop($top)
    {
        $this->container['top'] = $top;

        return $this;
    }

    /**
     * Gets left
     *
     * @return string|null
     */
    public function getLeft()
    {
        return $this->container['left'];
    }

    /**
     * Sets left
     *
     * @param string|null $left Distance expressed in px or % between the left-border of the video and the watermark-image.
     *
     * @return self
     */
    public function setLeft($left)
    {
        $this->container['left'] = $left;

        return $this;
    }

    /**
     * Gets bottom
     *
     * @return string|null
     */
    public function getBottom()
    {
        return $this->container['bottom'];
    }

    /**
     * Sets bottom
     *
     * @param string|null $bottom Distance expressed in px or % between the bottom-border of the video and the watermark-image.
     *
     * @return self
     */
    public function setBottom($bottom)
    {
        $this->container['bottom'] = $bottom;

        return $this;
    }

    /**
     * Gets right
     *
     * @return string|null
     */
    public function getRight()
    {
        return $this->container['right'];
    }

    /**
     * Sets right
     *
     * @param string|null $right Distance expressed in px or % between the right-border of the video and the watermark-image.
     *
     * @return self
     */
    public function setRight($right)
    {
        $this->container['right'] = $right;

        return $this;
    }

    /**
     * Gets width
     *
     * @return string|null
     */
    public function getWidth()
    {
        return $this->container['width'];
    }

    /**
     * Sets width
     *
     * @param string|null $width Width of the watermark-image relative to the video if expressed in %. Otherwise a fixed width. NOTE: To keep intrinsic watermark-image width use `initial`.
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
     * @return string|null
     */
    public function getHeight()
    {
        return $this->container['height'];
    }

    /**
     * Sets height
     *
     * @param string|null $height Height of the watermark-image relative to the video if expressed in %. Otherwise a fixed height. NOTE: To keep intrinsic watermark-image height use `initial`.
     *
     * @return self
     */
    public function setHeight($height)
    {
        $this->container['height'] = $height;

        return $this;
    }

    /**
     * Gets opacity
     *
     * @return string|null
     */
    public function getOpacity()
    {
        return $this->container['opacity'];
    }

    /**
     * Sets opacity
     *
     * @param string|null $opacity Opacity expressed in % only to specify the degree of the watermark-image transparency with the video.
     *
     * @return self
     */
    public function setOpacity($opacity)
    {
        $this->container['opacity'] = $opacity;

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


