<?php

namespace D365\Product;

interface ProductInterface
{
    public function getName(): string;

    public function getSku(): string;

    public function getPrice(): float;

    public function getDescription(): string;

    /** @return mixed */
    public function getAttribute(string $attributeName);

    public function setName(string $name);

    public function setSku(string $sku);

    public function setPrice(float $price);

    public function setDescription(string $description);

}
