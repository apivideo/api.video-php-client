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
 * FilterBy Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class FilterBy implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'filterBy',
            [
                'mediaId' => 'string[]',
                'mediaType' => 'string',
                'continent' => 'string[]',
                'country' => 'string[]',
                'deviceType' => 'string[]',
                'operatingSystem' => 'string[]',
                'browser' => 'string[]',
                'tag' => 'string'
            ],
            [
                'mediaId' => null,
                'mediaType' => null,
                'continent' => null,
                'country' => null,
                'deviceType' => null,
                'operatingSystem' => null,
                'browser' => null,
                'tag' => null
            ],
            [
                'mediaId' => 'mediaId',
                'mediaType' => 'mediaType',
                'continent' => 'continent',
                'country' => 'country',
                'deviceType' => 'deviceType',
                'operatingSystem' => 'operatingSystem',
                'browser' => 'browser',
                'tag' => 'tag'
            ],
            [
                'mediaId' => 'setMediaId',
                'mediaType' => 'setMediaType',
                'continent' => 'setContinent',
                'country' => 'setCountry',
                'deviceType' => 'setDeviceType',
                'operatingSystem' => 'setOperatingSystem',
                'browser' => 'setBrowser',
                'tag' => 'setTag'
            ],
            [
                'mediaId' => 'getMediaId',
                'mediaType' => 'getMediaType',
                'continent' => 'getContinent',
                'country' => 'getCountry',
                'deviceType' => 'getDeviceType',
                'operatingSystem' => 'getOperatingSystem',
                'browser' => 'getBrowser',
                'tag' => 'getTag'
            ],
            [
                'mediaId' => null,
                'mediaType' => null,
                'continent' => null,
                'country' => null,
                'deviceType' => null,
                'operatingSystem' => null,
                'browser' => null,
                'tag' => null
            ],
            null
        );
    }

    const MEDIA_TYPE_VIDEO = 'video';
    const MEDIA_TYPE_LIVE_STREAM = 'live-stream';
    const CONTINENT__AS = 'AS';
    const CONTINENT_AF = 'AF';
    const CONTINENT_NA = 'NA';
    const CONTINENT_SA = 'SA';
    const CONTINENT_AN = 'AN';
    const CONTINENT_EU = 'EU';
    const CONTINENT_AZ = 'AZ';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getMediaTypeAllowableValues()
    {
        return [
            self::MEDIA_TYPE_VIDEO,
            self::MEDIA_TYPE_LIVE_STREAM,
        ];
    }

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getContinentAllowableValues()
    {
        return [
            self::CONTINENT__AS,
            self::CONTINENT_AF,
            self::CONTINENT_NA,
            self::CONTINENT_SA,
            self::CONTINENT_AN,
            self::CONTINENT_EU,
            self::CONTINENT_AZ,
        ];
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
        $this->container['mediaId'] = $data['mediaId'] ?? null;
        $this->container['mediaType'] = $data['mediaType'] ?? null;
        $this->container['continent'] = $data['continent'] ?? null;
        $this->container['country'] = $data['country'] ?? null;
        $this->container['deviceType'] = $data['deviceType'] ?? null;
        $this->container['operatingSystem'] = $data['operatingSystem'] ?? null;
        $this->container['browser'] = $data['browser'] ?? null;
        $this->container['tag'] = $data['tag'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getMediaTypeAllowableValues();
        if (!is_null($this->container['mediaType']) && !in_array($this->container['mediaType'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'mediaType', must be one of '%s'",
                $this->container['mediaType'],
                implode("', '", $allowedValues)
            );
        }

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
     * Gets mediaId
     *
     * @return string[]|null
     */
    public function getMediaId()
    {
        return $this->container['mediaId'];
    }

    /**
     * Sets mediaId
     *
     * @param string[]|null $mediaId Returns analytics based on the unique identifiers of a video or a live stream.
     *
     * @return self
     */
    public function setMediaId($mediaId)
    {
        $this->container['mediaId'] = $mediaId;

        return $this;
    }

    /**
     * Gets mediaType
     *
     * @return string|null
     */
    public function getMediaType()
    {
        return $this->container['mediaType'];
    }

    /**
     * Sets mediaType
     *
     * @param string|null $mediaType mediaType
     *
     * @return self
     */
    public function setMediaType($mediaType)
    {
        $allowedValues = $this->getMediaTypeAllowableValues();
        if (!is_null($mediaType) && !in_array($mediaType, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'mediaType', must be one of '%s'",
                    $mediaType,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['mediaType'] = $mediaType;

        return $this;
    }

    /**
     * Gets continent
     *
     * @return string[]|null
     */
    public function getContinent()
    {
        return $this->container['continent'];
    }

    /**
     * Sets continent
     *
     * @param string[]|null $continent Returns analytics based on the viewers' continent. The list of supported continents names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example `EU`.
     *
     * @return self
     */
    public function setContinent($continent)
    {
        $allowedValues = $this->getContinentAllowableValues();
        if (!is_null($continent) && array_diff($continent, $allowedValues)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value for 'continent', must be one of '%s'",
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['continent'] = $continent;

        return $this;
    }

    /**
     * Gets country
     *
     * @return string[]|null
     */
    public function getCountry()
    {
        return $this->container['country'];
    }

    /**
     * Sets country
     *
     * @param string[]|null $country Returns analytics based on the viewers' country. The list of supported country names are based on the [GeoNames public database](https://www.geonames.org/countries/). You must use the ISO-3166 alpha2 format, for example `FR`.
     *
     * @return self
     */
    public function setCountry($country)
    {
        $this->container['country'] = $country;

        return $this;
    }

    /**
     * Gets deviceType
     *
     * @return string[]|null
     */
    public function getDeviceType()
    {
        return $this->container['deviceType'];
    }

    /**
     * Sets deviceType
     *
     * @param string[]|null $deviceType Returns analytics based on the type of device used by the viewers. Response values can include: `computer`, `phone`, `tablet`, `tv`, `console`, `wearable`, `unknown`.
     *
     * @return self
     */
    public function setDeviceType($deviceType)
    {
        $this->container['deviceType'] = $deviceType;

        return $this;
    }

    /**
     * Gets operatingSystem
     *
     * @return string[]|null
     */
    public function getOperatingSystem()
    {
        return $this->container['operatingSystem'];
    }

    /**
     * Sets operatingSystem
     *
     * @param string[]|null $operatingSystem Returns analytics based on the operating system used by the viewers. Response values can include `windows`, `mac osx`, `android`, `ios`, `linux`.
     *
     * @return self
     */
    public function setOperatingSystem($operatingSystem)
    {
        $this->container['operatingSystem'] = $operatingSystem;

        return $this;
    }

    /**
     * Gets browser
     *
     * @return string[]|null
     */
    public function getBrowser()
    {
        return $this->container['browser'];
    }

    /**
     * Sets browser
     *
     * @param string[]|null $browser Returns analytics based on the browser used by the viewers. Response values can include `chrome`, `firefox`, `edge`, `opera`.
     *
     * @return self
     */
    public function setBrowser($browser)
    {
        $this->container['browser'] = $browser;

        return $this;
    }

    /**
     * Gets tag
     *
     * @return string|null
     */
    public function getTag()
    {
        return $this->container['tag'];
    }

    /**
     * Sets tag
     *
     * @param string|null $tag Returns analytics for videos using this tag. This filter only accepts a single value and is case sensitive. Read more about tagging your videos [here](https://docs.api.video/vod/tags-metadata).
     *
     * @return self
     */
    public function setTag($tag)
    {
        $this->container['tag'] = $tag;

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


