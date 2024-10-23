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
 * SummarySource Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class SummarySource implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'summary-source',
            [
                'title' => 'string',
                'abstract' => 'string',
                'takeaways' => 'string[]'
            ],
            [
                'title' => null,
                'abstract' => null,
                'takeaways' => null
            ],
            [
                'title' => 'title',
                'abstract' => 'abstract',
                'takeaways' => 'takeaways'
            ],
            [
                'title' => 'setTitle',
                'abstract' => 'setAbstract',
                'takeaways' => 'setTakeaways'
            ],
            [
                'title' => 'getTitle',
                'abstract' => 'getAbstract',
                'takeaways' => 'getTakeaways'
            ],
            [
                'title' => null,
                'abstract' => null,
                'takeaways' => null
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
        $this->container['title'] = $data['title'] ?? null;
        $this->container['abstract'] = $data['abstract'] ?? null;
        $this->container['takeaways'] = $data['takeaways'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if (!is_null($this->container['takeaways']) && (count($this->container['takeaways']) > 3)) {
            $invalidProperties[] = "invalid value for 'takeaways', number of items must be less than or equal to 3.";
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
     * Gets title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string|null $title A video title, based on the contents of the video.
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets abstract
     *
     * @return string|null
     */
    public function getAbstract()
    {
        return $this->container['abstract'];
    }

    /**
     * Sets abstract
     *
     * @param string|null $abstract A short outline of the contents of the video. The length of an `abstract` depends on the amount of content in a video that can be transcribed. The API condenses the contents into minimum 20, maximum 300 words.
     *
     * @return self
     */
    public function setAbstract($abstract)
    {
        $this->container['abstract'] = $abstract;

        return $this;
    }

    /**
     * Gets takeaways
     *
     * @return string[]|null
     */
    public function getTakeaways()
    {
        return $this->container['takeaways'];
    }

    /**
     * Sets takeaways
     *
     * @param string[]|null $takeaways A list of 3 key points from the video, in chronological order.
     *
     * @return self
     */
    public function setTakeaways($takeaways)
    {

        if (!is_null($takeaways) && (count($takeaways) > 3)) {
            throw new \InvalidArgumentException('invalid value for $takeaways when calling SummarySource., number of items must be less than or equal to 3.');
        }
        $this->container['takeaways'] = $takeaways;

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


