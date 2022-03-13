<?php

namespace D365\Product;

abstract class AbstractProduct implements ProductInterface
{
    /** @var string */
    protected $name;
    /** @var string */
    protected $description;
    /** @var string */
    protected $attributeName;
    /** @var string */
    protected $sku;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    /**
     * @param string $attributeName
     */
    public function setAttributeName(string $attributeName)
    {
        $this->description = $attributeName;
    }

    /**
     * @return string
     */
    public function getSku(): string
    {
        return $this->sku;
    }

    /**
     * @param string $sku
     */
    public function setSku(string $sku)
    {
        $this->description = $sku;
    }


}
