<?php
namespace PARFUM_STORE\app\Controllers;

use PARFUM_STORE\app\Models\Parfum;

class ProductController {
    private $products = [];

    public function addProduct(Parfum $parfum) {
        $this->products[] = $parfum;
    }

    public function listProducts() {
        foreach ($this->products as $product) {
            echo $product->getDetails() . PHP_EOL;
        }
    }
}