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
 * Pagination Class Doc Comment
 *
 * @category Class
 * @package  ApiVideo\Client
 * @template TKey int|null
 * @template TValue mixed|null
 */
class Pagination implements ModelInterface, \JsonSerializable
{
    public static function getDefinition(): ModelDefinition
    {
        return new ModelDefinition(
            'pagination',
            [
                'itemsTotal' => 'int',
                'pagesTotal' => 'int',
                'pageSize' => 'int',
                'currentPage' => 'int',
                'currentPageItems' => 'int',
                'links' => '\ApiVideo\Client\Model\PaginationLink[]'
            ],
            [
                'itemsTotal' => null,
                'pagesTotal' => null,
                'pageSize' => null,
                'currentPage' => null,
                'currentPageItems' => null,
                'links' => null
            ],
            [
                'itemsTotal' => 'itemsTotal',
                'pagesTotal' => 'pagesTotal',
                'pageSize' => 'pageSize',
                'currentPage' => 'currentPage',
                'currentPageItems' => 'currentPageItems',
                'links' => 'links'
            ],
            [
                'itemsTotal' => 'setItemsTotal',
                'pagesTotal' => 'setPagesTotal',
                'pageSize' => 'setPageSize',
                'currentPage' => 'setCurrentPage',
                'currentPageItems' => 'setCurrentPageItems',
                'links' => 'setLinks'
            ],
            [
                'itemsTotal' => 'getItemsTotal',
                'pagesTotal' => 'getPagesTotal',
                'pageSize' => 'getPageSize',
                'currentPage' => 'getCurrentPage',
                'currentPageItems' => 'getCurrentPageItems',
                'links' => 'getLinks'
            ],
            [
                'itemsTotal' => null,
                'pagesTotal' => null,
                'pageSize' => null,
                'currentPage' => null,
                'currentPageItems' => null,
                'links' => null
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
        $this->container['itemsTotal'] = $data['itemsTotal'] ?? null;
        $this->container['pagesTotal'] = $data['pagesTotal'] ?? null;
        $this->container['pageSize'] = $data['pageSize'] ?? null;
        $this->container['currentPage'] = $data['currentPage'] ?? null;
        $this->container['currentPageItems'] = $data['currentPageItems'] ?? null;
        $this->container['links'] = isset($data['links']) ?  array_map(function(array $value): PaginationLink { return new PaginationLink($value); }, $data['links']) : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['links'] === null) {
            $invalidProperties[] = "'links' can't be null";
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
     * Gets itemsTotal
     *
     * @return int|null
     */
    public function getItemsTotal()
    {
        return $this->container['itemsTotal'];
    }

    /**
     * Sets itemsTotal
     *
     * @param int|null $itemsTotal Total number of items that exist.
     *
     * @return self
     */
    public function setItemsTotal($itemsTotal)
    {
        $this->container['itemsTotal'] = $itemsTotal;

        return $this;
    }

    /**
     * Gets pagesTotal
     *
     * @return int|null
     */
    public function getPagesTotal()
    {
        return $this->container['pagesTotal'];
    }

    /**
     * Sets pagesTotal
     *
     * @param int|null $pagesTotal Number of items listed in the current page.
     *
     * @return self
     */
    public function setPagesTotal($pagesTotal)
    {
        $this->container['pagesTotal'] = $pagesTotal;

        return $this;
    }

    /**
     * Gets pageSize
     *
     * @return int|null
     */
    public function getPageSize()
    {
        return $this->container['pageSize'];
    }

    /**
     * Sets pageSize
     *
     * @param int|null $pageSize Maximum number of item per page.
     *
     * @return self
     */
    public function setPageSize($pageSize)
    {
        $this->container['pageSize'] = $pageSize;

        return $this;
    }

    /**
     * Gets currentPage
     *
     * @return int|null
     */
    public function getCurrentPage()
    {
        return $this->container['currentPage'];
    }

    /**
     * Sets currentPage
     *
     * @param int|null $currentPage The current page index.
     *
     * @return self
     */
    public function setCurrentPage($currentPage)
    {
        $this->container['currentPage'] = $currentPage;

        return $this;
    }

    /**
     * Gets currentPageItems
     *
     * @return int|null
     */
    public function getCurrentPageItems()
    {
        return $this->container['currentPageItems'];
    }

    /**
     * Sets currentPageItems
     *
     * @param int|null $currentPageItems The number of items on the current page.
     *
     * @return self
     */
    public function setCurrentPageItems($currentPageItems)
    {
        $this->container['currentPageItems'] = $currentPageItems;

        return $this;
    }

    /**
     * Gets links
     *
     * @return \ApiVideo\Client\Model\PaginationLink[]
     */
    public function getLinks()
    {
        return $this->container['links'];
    }

    /**
     * Sets links
     *
     * @param \ApiVideo\Client\Model\PaginationLink[] $links links
     *
     * @return self
     */
    public function setLinks($links)
    {
        $this->container['links'] = $links;

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


