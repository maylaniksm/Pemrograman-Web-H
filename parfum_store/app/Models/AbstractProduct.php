<?php
namespace PARFUM_STORE\app\Models;

abstract class AbstractProduct {
    protected $name;
    protected $price;

    abstract public function getDetails();

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}