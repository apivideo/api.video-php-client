<?php

namespace ApiVideo\Client\Model;

/**
 * @package ApiVideo\Client\Model
 */
final class ModelDefinition
{
    /**
     * @var string
     */
    public $modelName;

    /**
     * @var string[]
     */
    public $openAPITypes;

    /**
     * @var string[]
     */
    public $openAPIFormats;

    /**
     * @var string[]
     */
    public $attributeMap;

    /**
     * @var string[]
     */
    public $setters;

    /**
     * @var string[]
     */
    public $getters;

    /**
     * @var string|null
     */
    public $discriminator;

    public function __construct(
        string $modelName,
        array $openAPITypes,
        array $openAPIFormats,
        array $attributeMap,
        array $setters,
        array $getters,
        ?string $discriminator = null
    ) {
        $this->modelName = $modelName;
        $this->openAPITypes = $openAPITypes;
        $this->openAPIFormats = $openAPIFormats;
        $this->attributeMap = $attributeMap;
        $this->setters = $setters;
        $this->getters = $getters;
        $this->discriminator = $discriminator;
    }
}
