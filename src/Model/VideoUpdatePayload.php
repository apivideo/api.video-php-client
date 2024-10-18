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
 * VideoUpdatePayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoUpdatePayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-update-payload',
            [
                'playerId' => 'string',
                'title' => 'string',
                'description' => 'string',
                'public' => 'bool',
                'panoramic' => 'bool',
                'mp4Support' => 'bool',
                'tags' => 'string[]',
                'metadata' => '\ApiVideo\Client\Model\Metadata[]',
                'language' => 'string',
                'transcript' => 'bool',
                'transcriptSummary' => 'bool'
            ],
            [
                'playerId' => null,
                'title' => null,
                'description' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null,
                'tags' => null,
                'metadata' => null,
                'language' => null,
                'transcript' => null,
                'transcriptSummary' => null
            ],
            [
                'playerId' => 'playerId',
                'title' => 'title',
                'description' => 'description',
                'public' => 'public',
                'panoramic' => 'panoramic',
                'mp4Support' => 'mp4Support',
                'tags' => 'tags',
                'metadata' => 'metadata',
                'language' => 'language',
                'transcript' => 'transcript',
                'transcriptSummary' => 'transcriptSummary'
            ],
            [
                'playerId' => 'setPlayerId',
                'title' => 'setTitle',
                'description' => 'setDescription',
                'public' => 'setPublic',
                'panoramic' => 'setPanoramic',
                'mp4Support' => 'setMp4Support',
                'tags' => 'setTags',
                'metadata' => 'setMetadata',
                'language' => 'setLanguage',
                'transcript' => 'setTranscript',
                'transcriptSummary' => 'setTranscriptSummary'
            ],
            [
                'playerId' => 'getPlayerId',
                'title' => 'getTitle',
                'description' => 'getDescription',
                'public' => 'getPublic',
                'panoramic' => 'getPanoramic',
                'mp4Support' => 'getMp4Support',
                'tags' => 'getTags',
                'metadata' => 'getMetadata',
                'language' => 'getLanguage',
                'transcript' => 'getTranscript',
                'transcriptSummary' => 'getTranscriptSummary'
            ],
            [
                'playerId' => 'isPlayerIdDefined',
                'title' => null,
                'description' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null,
                'tags' => null,
                'metadata' => null,
                'language' => null,
                'transcript' => null,
                'transcriptSummary' => null
            ],
            null
        );
    }

    const LANGUAGE_AR = 'ar';
    const LANGUAGE_CA = 'ca';
    const LANGUAGE_CS = 'cs';
    const LANGUAGE_DA = 'da';
    const LANGUAGE_DE = 'de';
    const LANGUAGE_EL = 'el';
    const LANGUAGE_EN = 'en';
    const LANGUAGE_ES = 'es';
    const LANGUAGE_FA = 'fa';
    const LANGUAGE_FI = 'fi';
    const LANGUAGE_FR = 'fr';
    const LANGUAGE_HE = 'he';
    const LANGUAGE_HI = 'hi';
    const LANGUAGE_HR = 'hr';
    const LANGUAGE_HU = 'hu';
    const LANGUAGE_IT = 'it';
    const LANGUAGE_JA = 'ja';
    const LANGUAGE_KO = 'ko';
    const LANGUAGE_ML = 'ml';
    const LANGUAGE_NL = 'nl';
    const LANGUAGE_NN = 'nn';
    const LANGUAGE_FALSE = 'false';
    const LANGUAGE_PL = 'pl';
    const LANGUAGE_PT = 'pt';
    const LANGUAGE_RU = 'ru';
    const LANGUAGE_SK = 'sk';
    const LANGUAGE_SL = 'sl';
    const LANGUAGE_TE = 'te';
    const LANGUAGE_TR = 'tr';
    const LANGUAGE_UK = 'uk';
    const LANGUAGE_UR = 'ur';
    const LANGUAGE_VI = 'vi';
    const LANGUAGE_ZH = 'zh';

    /**
     * Gets allowable values of the enum
     *
     * @return string[]
     */
    public function getLanguageAllowableValues()
    {
        return [
            self::LANGUAGE_AR,
            self::LANGUAGE_CA,
            self::LANGUAGE_CS,
            self::LANGUAGE_DA,
            self::LANGUAGE_DE,
            self::LANGUAGE_EL,
            self::LANGUAGE_EN,
            self::LANGUAGE_ES,
            self::LANGUAGE_FA,
            self::LANGUAGE_FI,
            self::LANGUAGE_FR,
            self::LANGUAGE_HE,
            self::LANGUAGE_HI,
            self::LANGUAGE_HR,
            self::LANGUAGE_HU,
            self::LANGUAGE_IT,
            self::LANGUAGE_JA,
            self::LANGUAGE_KO,
            self::LANGUAGE_ML,
            self::LANGUAGE_NL,
            self::LANGUAGE_NN,
            self::LANGUAGE_FALSE,
            self::LANGUAGE_PL,
            self::LANGUAGE_PT,
            self::LANGUAGE_RU,
            self::LANGUAGE_SK,
            self::LANGUAGE_SL,
            self::LANGUAGE_TE,
            self::LANGUAGE_TR,
            self::LANGUAGE_UK,
            self::LANGUAGE_UR,
            self::LANGUAGE_VI,
            self::LANGUAGE_ZH,
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
        if(array_key_exists('playerId', $this->container)) $this->container = $data['playerId']; // playerId can be null or undefined
        $this->container['title'] = $data['title'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['public'] = $data['public'] ?? null;
        $this->container['panoramic'] = $data['panoramic'] ?? null;
        $this->container['mp4Support'] = $data['mp4Support'] ?? null;
        $this->container['tags'] = $data['tags'] ?? null;
        $this->container['metadata'] = isset($data['metadata']) ?  array_map(function(array $value): Metadata { return new Metadata($value); }, $data['metadata']) : null;
        $this->container['language'] = $data['language'] ?? null;
        $this->container['transcript'] = $data['transcript'] ?? null;
        $this->container['transcriptSummary'] = $data['transcriptSummary'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        $allowedValues = $this->getLanguageAllowableValues();
        if (!is_null($this->container['language']) && !in_array($this->container['language'], $allowedValues, true)) {
            $invalidProperties[] = sprintf(
                "invalid value '%s' for 'language', must be one of '%s'",
                $this->container['language'],
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
     * Gets playerId
     *
     * @return string|null
     */
    public function getPlayerId()
    {
        return $this->container['playerId'];
    }

    /**
     * Gets a boolean indicating if the nullable field playerId is defined
     *
     * @return boolean
     */
    public function isPlayerIdDefined()
    {
        return array_key_exists('playerId', $this->container);
    }

    /**
     * Sets playerId
     *
     * @param string|null $playerId The unique ID for the player you want to associate with your video.
     *
     * @return self
     */
    public function setPlayerId($playerId)
    {
        $this->container['playerId'] = $playerId;

        return $this;
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
     * @param string|null $title The title you want to use for your video.
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

        return $this;
    }

    /**
     * Gets description
     *
     * @return string|null
     */
    public function getDescription()
    {
        return $this->container['description'];
    }

    /**
     * Sets description
     *
     * @param string|null $description A brief description of the video.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets public
     *
     * @return bool|null
     */
    public function getPublic()
    {
        return $this->container['public'];
    }

    /**
     * Sets public
     *
     * @param bool|null $public Whether the video is publicly available or not. False means it is set to private. Default is true. Tutorials on [private videos](https://api.video/blog/endpoints/private-videos/).
     *
     * @return self
     */
    public function setPublic($public)
    {
        $this->container['public'] = $public;

        return $this;
    }

    /**
     * Gets panoramic
     *
     * @return bool|null
     */
    public function getPanoramic()
    {
        return $this->container['panoramic'];
    }

    /**
     * Sets panoramic
     *
     * @param bool|null $panoramic Whether the video is a 360 degree or immersive video.
     *
     * @return self
     */
    public function setPanoramic($panoramic)
    {
        $this->container['panoramic'] = $panoramic;

        return $this;
    }

    /**
     * Gets mp4Support
     *
     * @return bool|null
     */
    public function getMp4Support()
    {
        return $this->container['mp4Support'];
    }

    /**
     * Sets mp4Support
     *
     * @param bool|null $mp4Support Whether the player supports the mp4 format.
     *
     * @return self
     */
    public function setMp4Support($mp4Support)
    {
        $this->container['mp4Support'] = $mp4Support;

        return $this;
    }

    /**
     * Gets tags
     *
     * @return string[]|null
     */
    public function getTags()
    {
        return $this->container['tags'];
    }

    /**
     * Sets tags
     *
     * @param string[]|null $tags A list of terms or words you want to tag the video with. Make sure the list includes all the tags you want as whatever you send in this list will overwrite the existing list for the video.
     *
     * @return self
     */
    public function setTags($tags)
    {
        $this->container['tags'] = $tags;

        return $this;
    }

    /**
     * Gets metadata
     *
     * @return \ApiVideo\Client\Model\Metadata[]|null
     */
    public function getMetadata()
    {
        return $this->container['metadata'];
    }

    /**
     * Sets metadata
     *
     * @param \ApiVideo\Client\Model\Metadata[]|null $metadata A list (array) of dictionaries where each dictionary contains a key value pair that describes the video. As with tags, you must send the complete list of metadata you want as whatever you send here will overwrite the existing metadata for the video.
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets language
     *
     * @return string|null
     */
    public function getLanguage()
    {
        return $this->container['language'];
    }

    /**
     * Sets language
     *
     * @param string|null $language Use this parameter to set the language of the video. When this parameter is set, the API creates a transcript of the video using the language you specify. You must use the [IETF language tag](https://en.wikipedia.org/wiki/IETF_language_tag) format.  `language` is a permanent attribute of the video. You can update it to another language using the [`PATCH /videos/{videoId}`](https://docs.api.video/reference/api/Videos#update-a-video-object) operation. This triggers the API to generate a new transcript using a different language.
     *
     * @return self
     */
    public function setLanguage($language)
    {
        $allowedValues = $this->getLanguageAllowableValues();
        if (!is_null($language) && !in_array($language, $allowedValues, true)) {
            throw new \InvalidArgumentException(
                sprintf(
                    "Invalid value '%s' for 'language', must be one of '%s'",
                    $language,
                    implode("', '", $allowedValues)
                )
            );
        }
        $this->container['language'] = $language;

        return $this;
    }

    /**
     * Gets transcript
     *
     * @return bool|null
     */
    public function getTranscript()
    {
        return $this->container['transcript'];
    }

    /**
     * Sets transcript
     *
     * @param bool|null $transcript Use this parameter to enable transcription.   - When `true`, the API generates a transcript for the video. - The default value is `false`. - If you define a video language using the `language` parameter, the API uses that language to transcribe the video. If you do not define a language, the API detects it based on the video.  - When the API generates a transcript, it will be available as a caption for the video.
     *
     * @return self
     */
    public function setTranscript($transcript)
    {
        $this->container['transcript'] = $transcript;

        return $this;
    }

    /**
     * Gets transcriptSummary
     *
     * @return bool|null
     */
    public function getTranscriptSummary()
    {
        return $this->container['transcriptSummary'];
    }

    /**
     * Sets transcriptSummary
     *
     * @param bool|null $transcriptSummary Use this parameter to enable summarization.   - When `true`, the API generates a summary for the video, based on the transcription. - The default value is `false`. - If you define a video language using the `language` parameter, the API uses that language to summarize the video. If you do not define a language, the API detects it based on the video.
     *
     * @return self
     */
    public function setTranscriptSummary($transcriptSummary)
    {
        $this->container['transcriptSummary'] = $transcriptSummary;

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


