<?php


namespace D365\Product;


class Product extends AbstractProduct
{
    protected $name;
    protected $sku;
    protected $description;
    protected $price;

    public function __construct()
    {
    }
}