<?php
namespace PARFUM_STORE\app\Models;

class Product extends AbstractProduct {
    public function getDetails() {
        return "Product Name: {$this->name}, Price: {$this->price}";
    }
}