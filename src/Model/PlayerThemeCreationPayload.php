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
 * PlayerThemeCreationPayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class PlayerThemeCreationPayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'player-theme-creation-payload',
            [
                'text' => 'string',
                'link' => 'string',
                'linkHover' => 'string',
                'trackPlayed' => 'string',
                'trackUnplayed' => 'string',
                'trackBackground' => 'string',
                'backgroundTop' => 'string',
                'backgroundBottom' => 'string',
                'backgroundText' => 'string',
                'enableApi' => 'bool',
                'enableControls' => 'bool',
                'forceAutoplay' => 'bool',
                'hideTitle' => 'bool',
                'forceLoop' => 'bool'
            ],
            [
                'text' => null,
                'link' => null,
                'linkHover' => null,
                'trackPlayed' => null,
                'trackUnplayed' => null,
                'trackBackground' => null,
                'backgroundTop' => null,
                'backgroundBottom' => null,
                'backgroundText' => null,
                'enableApi' => null,
                'enableControls' => null,
                'forceAutoplay' => null,
                'hideTitle' => null,
                'forceLoop' => null
            ],
            [
                'text' => 'text',
                'link' => 'link',
                'linkHover' => 'linkHover',
                'trackPlayed' => 'trackPlayed',
                'trackUnplayed' => 'trackUnplayed',
                'trackBackground' => 'trackBackground',
                'backgroundTop' => 'backgroundTop',
                'backgroundBottom' => 'backgroundBottom',
                'backgroundText' => 'backgroundText',
                'enableApi' => 'enableApi',
                'enableControls' => 'enableControls',
                'forceAutoplay' => 'forceAutoplay',
                'hideTitle' => 'hideTitle',
                'forceLoop' => 'forceLoop'
            ],
            [
                'text' => 'setText',
                'link' => 'setLink',
                'linkHover' => 'setLinkHover',
                'trackPlayed' => 'setTrackPlayed',
                'trackUnplayed' => 'setTrackUnplayed',
                'trackBackground' => 'setTrackBackground',
                'backgroundTop' => 'setBackgroundTop',
                'backgroundBottom' => 'setBackgroundBottom',
                'backgroundText' => 'setBackgroundText',
                'enableApi' => 'setEnableApi',
                'enableControls' => 'setEnableControls',
                'forceAutoplay' => 'setForceAutoplay',
                'hideTitle' => 'setHideTitle',
                'forceLoop' => 'setForceLoop'
            ],
            [
                'text' => 'getText',
                'link' => 'getLink',
                'linkHover' => 'getLinkHover',
                'trackPlayed' => 'getTrackPlayed',
                'trackUnplayed' => 'getTrackUnplayed',
                'trackBackground' => 'getTrackBackground',
                'backgroundTop' => 'getBackgroundTop',
                'backgroundBottom' => 'getBackgroundBottom',
                'backgroundText' => 'getBackgroundText',
                'enableApi' => 'getEnableApi',
                'enableControls' => 'getEnableControls',
                'forceAutoplay' => 'getForceAutoplay',
                'hideTitle' => 'getHideTitle',
                'forceLoop' => 'getForceLoop'
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
        $this->container['text'] = $data['text'] ?? null;
        $this->container['link'] = $data['link'] ?? null;
        $this->container['linkHover'] = $data['linkHover'] ?? null;
        $this->container['trackPlayed'] = $data['trackPlayed'] ?? null;
        $this->container['trackUnplayed'] = $data['trackUnplayed'] ?? null;
        $this->container['trackBackground'] = $data['trackBackground'] ?? null;
        $this->container['backgroundTop'] = $data['backgroundTop'] ?? null;
        $this->container['backgroundBottom'] = $data['backgroundBottom'] ?? null;
        $this->container['backgroundText'] = $data['backgroundText'] ?? null;
        $this->container['enableApi'] = $data['enableApi'] ?? true;
        $this->container['enableControls'] = $data['enableControls'] ?? true;
        $this->container['forceAutoplay'] = $data['forceAutoplay'] ?? false;
        $this->container['hideTitle'] = $data['hideTitle'] ?? false;
        $this->container['forceLoop'] = $data['forceLoop'] ?? false;
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
     * Gets text
     *
     * @return string|null
     */
    public function getText()
    {
        return $this->container['text'];
    }

    /**
     * Sets text
     *
     * @param string|null $text RGBA color for timer text. Default: rgba(255, 255, 255, 1)
     *
     * @return self
     */
    public function setText($text)
    {
        $this->container['text'] = $text;

        return $this;
    }

    /**
     * Gets link
     *
     * @return string|null
     */
    public function getLink()
    {
        return $this->container['link'];
    }

    /**
     * Sets link
     *
     * @param string|null $link RGBA color for all controls. Default: rgba(255, 255, 255, 1)
     *
     * @return self
     */
    public function setLink($link)
    {
        $this->container['link'] = $link;

        return $this;
    }

    /**
     * Gets linkHover
     *
     * @return string|null
     */
    public function getLinkHover()
    {
        return $this->container['linkHover'];
    }

    /**
     * Sets linkHover
     *
     * @param string|null $linkHover RGBA color for all controls when hovered. Default: rgba(255, 255, 255, 1)
     *
     * @return self
     */
    public function setLinkHover($linkHover)
    {
        $this->container['linkHover'] = $linkHover;

        return $this;
    }

    /**
     * Gets trackPlayed
     *
     * @return string|null
     */
    public function getTrackPlayed()
    {
        return $this->container['trackPlayed'];
    }

    /**
     * Sets trackPlayed
     *
     * @param string|null $trackPlayed RGBA color playback bar: played content. Default: rgba(88, 131, 255, .95)
     *
     * @return self
     */
    public function setTrackPlayed($trackPlayed)
    {
        $this->container['trackPlayed'] = $trackPlayed;

        return $this;
    }

    /**
     * Gets trackUnplayed
     *
     * @return string|null
     */
    public function getTrackUnplayed()
    {
        return $this->container['trackUnplayed'];
    }

    /**
     * Sets trackUnplayed
     *
     * @param string|null $trackUnplayed RGBA color playback bar: downloaded but unplayed (buffered) content. Default: rgba(255, 255, 255, .35)
     *
     * @return self
     */
    public function setTrackUnplayed($trackUnplayed)
    {
        $this->container['trackUnplayed'] = $trackUnplayed;

        return $this;
    }

    /**
     * Gets trackBackground
     *
     * @return string|null
     */
    public function getTrackBackground()
    {
        return $this->container['trackBackground'];
    }

    /**
     * Sets trackBackground
     *
     * @param string|null $trackBackground RGBA color playback bar: background. Default: rgba(255, 255, 255, .2)
     *
     * @return self
     */
    public function setTrackBackground($trackBackground)
    {
        $this->container['trackBackground'] = $trackBackground;

        return $this;
    }

    /**
     * Gets backgroundTop
     *
     * @return string|null
     */
    public function getBackgroundTop()
    {
        return $this->container['backgroundTop'];
    }

    /**
     * Sets backgroundTop
     *
     * @param string|null $backgroundTop RGBA color: top 50% of background. Default: rgba(0, 0, 0, .7)
     *
     * @return self
     */
    public function setBackgroundTop($backgroundTop)
    {
        $this->container['backgroundTop'] = $backgroundTop;

        return $this;
    }

    /**
     * Gets backgroundBottom
     *
     * @return string|null
     */
    public function getBackgroundBottom()
    {
        return $this->container['backgroundBottom'];
    }

    /**
     * Sets backgroundBottom
     *
     * @param string|null $backgroundBottom RGBA color: bottom 50% of background. Default: rgba(0, 0, 0, .7)
     *
     * @return self
     */
    public function setBackgroundBottom($backgroundBottom)
    {
        $this->container['backgroundBottom'] = $backgroundBottom;

        return $this;
    }

    /**
     * Gets backgroundText
     *
     * @return string|null
     */
    public function getBackgroundText()
    {
        return $this->container['backgroundText'];
    }

    /**
     * Sets backgroundText
     *
     * @param string|null $backgroundText RGBA color for title text. Default: rgba(255, 255, 255, 1)
     *
     * @return self
     */
    public function setBackgroundText($backgroundText)
    {
        $this->container['backgroundText'] = $backgroundText;

        return $this;
    }

    /**
     * Gets enableApi
     *
     * @return bool|null
     */
    public function getEnableApi()
    {
        return $this->container['enableApi'];
    }

    /**
     * Sets enableApi
     *
     * @param bool|null $enableApi enable/disable player SDK access. Default: true
     *
     * @return self
     */
    public function setEnableApi($enableApi)
    {
        $this->container['enableApi'] = $enableApi;

        return $this;
    }

    /**
     * Gets enableControls
     *
     * @return bool|null
     */
    public function getEnableControls()
    {
        return $this->container['enableControls'];
    }

    /**
     * Sets enableControls
     *
     * @param bool|null $enableControls enable/disable player controls. Default: true
     *
     * @return self
     */
    public function setEnableControls($enableControls)
    {
        $this->container['enableControls'] = $enableControls;

        return $this;
    }

    /**
     * Gets forceAutoplay
     *
     * @return bool|null
     */
    public function getForceAutoplay()
    {
        return $this->container['forceAutoplay'];
    }

    /**
     * Sets forceAutoplay
     *
     * @param bool|null $forceAutoplay enable/disable player autoplay. Default: false
     *
     * @return self
     */
    public function setForceAutoplay($forceAutoplay)
    {
        $this->container['forceAutoplay'] = $forceAutoplay;

        return $this;
    }

    /**
     * Gets hideTitle
     *
     * @return bool|null
     */
    public function getHideTitle()
    {
        return $this->container['hideTitle'];
    }

    /**
     * Sets hideTitle
     *
     * @param bool|null $hideTitle enable/disable title. Default: false
     *
     * @return self
     */
    public function setHideTitle($hideTitle)
    {
        $this->container['hideTitle'] = $hideTitle;

        return $this;
    }

    /**
     * Gets forceLoop
     *
     * @return bool|null
     */
    public function getForceLoop()
    {
        return $this->container['forceLoop'];
    }

    /**
     * Sets forceLoop
     *
     * @param bool|null $forceLoop enable/disable looping. Default: false
     *
     * @return self
     */
    public function setForceLoop($forceLoop)
    {
        $this->container['forceLoop'] = $forceLoop;

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


