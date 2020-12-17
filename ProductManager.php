<?php


class ProductManager
{
    private $products = [];

    public function __construct()
    {
    }

    public function getProducts()
    {
        return $this->products;
    }

    public function add($product)
    {
        array_push($this->products, $product);
    }

    public function read($id)
    {
        return $this->products[$this->getIndex($id)];
    }

    public function update($id, $product)
    {
        $this->products[$this->getIndex($id)] = $product;
    }

    public function delete($id)
    {
        array_splice($this->products, $this->getIndex($id), 1);
    }

    private function getIndex($id)
    {
        foreach ($this->products as $key=>$value) {
            if ($value->getID() == $id) {
                return $key;
            }
        }
    }
}