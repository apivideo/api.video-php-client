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
 * VideoCreationPayload Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class VideoCreationPayload implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'video-creation-payload',
            [
                'title' => 'string',
                'description' => 'string',
                'source' => 'string',
                'public' => 'bool',
                'panoramic' => 'bool',
                'mp4Support' => 'bool',
                'playerId' => 'string',
                'tags' => 'string[]',
                'metadata' => '\ApiVideo\Client\Model\Metadata[]',
                'clip' => '\ApiVideo\Client\Model\VideoClip',
                'watermark' => '\ApiVideo\Client\Model\VideoWatermark',
                'language' => 'string',
                'transcript' => 'bool',
                'transcriptSummary' => 'bool'
            ],
            [
                'title' => null,
                'description' => null,
                'source' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null,
                'playerId' => null,
                'tags' => null,
                'metadata' => null,
                'clip' => null,
                'watermark' => null,
                'language' => null,
                'transcript' => null,
                'transcriptSummary' => null
            ],
            [
                'title' => 'title',
                'description' => 'description',
                'source' => 'source',
                'public' => 'public',
                'panoramic' => 'panoramic',
                'mp4Support' => 'mp4Support',
                'playerId' => 'playerId',
                'tags' => 'tags',
                'metadata' => 'metadata',
                'clip' => 'clip',
                'watermark' => 'watermark',
                'language' => 'language',
                'transcript' => 'transcript',
                'transcriptSummary' => 'transcriptSummary'
            ],
            [
                'title' => 'setTitle',
                'description' => 'setDescription',
                'source' => 'setSource',
                'public' => 'setPublic',
                'panoramic' => 'setPanoramic',
                'mp4Support' => 'setMp4Support',
                'playerId' => 'setPlayerId',
                'tags' => 'setTags',
                'metadata' => 'setMetadata',
                'clip' => 'setClip',
                'watermark' => 'setWatermark',
                'language' => 'setLanguage',
                'transcript' => 'setTranscript',
                'transcriptSummary' => 'setTranscriptSummary'
            ],
            [
                'title' => 'getTitle',
                'description' => 'getDescription',
                'source' => 'getSource',
                'public' => 'getPublic',
                'panoramic' => 'getPanoramic',
                'mp4Support' => 'getMp4Support',
                'playerId' => 'getPlayerId',
                'tags' => 'getTags',
                'metadata' => 'getMetadata',
                'clip' => 'getClip',
                'watermark' => 'getWatermark',
                'language' => 'getLanguage',
                'transcript' => 'getTranscript',
                'transcriptSummary' => 'getTranscriptSummary'
            ],
            [
                'title' => null,
                'description' => null,
                'source' => null,
                'public' => null,
                'panoramic' => null,
                'mp4Support' => null,
                'playerId' => null,
                'tags' => null,
                'metadata' => null,
                'clip' => null,
                'watermark' => null,
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
        $this->container['title'] = $data['title'] ?? null;
        $this->container['description'] = $data['description'] ?? null;
        $this->container['source'] = $data['source'] ?? null;
        $this->container['public'] = $data['public'] ?? true;
        $this->container['panoramic'] = $data['panoramic'] ?? false;
        $this->container['mp4Support'] = $data['mp4Support'] ?? true;
        $this->container['playerId'] = $data['playerId'] ?? null;
        $this->container['tags'] = $data['tags'] ?? null;
        $this->container['metadata'] = isset($data['metadata']) ?  array_map(function(array $value): Metadata { return new Metadata($value); }, $data['metadata']) : null;
        $this->container['clip'] = isset($data['clip']) ? new VideoClip($data['clip']) : null;
        $this->container['watermark'] = isset($data['watermark']) ? new VideoWatermark($data['watermark']) : null;
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

        if ($this->container['title'] === null) {
            $invalidProperties[] = "'title' can't be null";
        }
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
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string $title The title of your new video.
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
     * @param string|null $description A brief description of your video.
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->container['description'] = $description;

        return $this;
    }

    /**
     * Gets source
     *
     * @return string|null
     */
    public function getSource()
    {
        return $this->container['source'];
    }

    /**
     * Sets source
     *
     * @param string|null $source You can either add a video already on the web, by entering the URL of the video, or you can also enter the `videoId` of one of the videos you already have on your api.video acccount, and this will generate a copy of your video. Creating a copy of a video can be especially useful if you want to keep your original video and trim or apply a watermark onto the copy you would create.
     *
     * @return self
     */
    public function setSource($source)
    {
        $this->container['source'] = $source;

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
     * @param bool|null $public Default: True. If set to `false` the video will become private. More information on private videos can be found [here](https://docs.api.video/delivery/video-privacy-access-management)
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
     * @param bool|null $panoramic Indicates if your video is a 360/immersive video.
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
     * @param bool|null $mp4Support Enables mp4 version in addition to streamed version.
     *
     * @return self
     */
    public function setMp4Support($mp4Support)
    {
        $this->container['mp4Support'] = $mp4Support;

        return $this;
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
     * Sets playerId
     *
     * @param string|null $playerId The unique identification number for your video player.
     *
     * @return self
     */
    public function setPlayerId($playerId)
    {
        $this->container['playerId'] = $playerId;

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
     * @param string[]|null $tags A list of tags you want to use to describe your video.
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
     * @param \ApiVideo\Client\Model\Metadata[]|null $metadata A list of key value pairs that you use to provide metadata for your video.
     *
     * @return self
     */
    public function setMetadata($metadata)
    {
        $this->container['metadata'] = $metadata;

        return $this;
    }

    /**
     * Gets clip
     *
     * @return \ApiVideo\Client\Model\VideoClip|null
     */
    public function getClip()
    {
        return $this->container['clip'];
    }

    /**
     * Sets clip
     *
     * @param \ApiVideo\Client\Model\VideoClip|null $clip clip
     *
     * @return self
     */
    public function setClip($clip)
    {
        $this->container['clip'] = $clip;

        return $this;
    }

    /**
     * Gets watermark
     *
     * @return \ApiVideo\Client\Model\VideoWatermark|null
     */
    public function getWatermark()
    {
        return $this->container['watermark'];
    }

    /**
     * Sets watermark
     *
     * @param \ApiVideo\Client\Model\VideoWatermark|null $watermark watermark
     *
     * @return self
     */
    public function setWatermark($watermark)
    {
        $this->container['watermark'] = $watermark;

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
     * @param bool|null $transcriptSummary Use this parameter to enable summarization. We recommend using this parameter together with `transcript: true`.  - When `true`, the API generates a summary for the video, based on the transcription. - The default value is `false`. - If you define a video language using the `language` parameter, the API uses that language to summarize the video. If you do not define a language, the API detects it based on the video.
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


