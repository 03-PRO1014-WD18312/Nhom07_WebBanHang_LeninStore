<?php
class Product
{
    public $id;
    public $name;
    public $image;
    public $price;
    public $luotxem;

    public function __construct($id, $name, $image, $price, $luotxem)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->luotxem = $luotxem;
    }
}
class ProductShow
{
    public $id;
    public $name;
    public $image;
    public $price;
    public $chitiet;
    public $luotxem;
    public $danhmuc;

    public function __construct($id, $name,  $price, $image, $chitiet, $luotxem, $danhmuc)
    {
        $this->id = $id;
        $this->name = $name;
        $this->image = $image;
        $this->price = $price;
        $this->chitiet = $chitiet;
        $this->luotxem = $luotxem;
        $this->danhmuc = $danhmuc;
    }
}
