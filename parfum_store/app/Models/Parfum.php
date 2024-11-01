<?php
namespace PARFUM_STORE\app\Models;

use PARFUM_STORE\app\Traits\DiscountTrait;

class Parfum extends AbstractProduct {
    use DiscountTrait;

    private $volume;

    public function __construct($name, $price, $volume) {
        parent::__construct($name, $price);
        $this->volume = $volume;
    }

    public function getDetails() {
        return "Parfum Name: {$this->name}, Price: {$this->price}, Volume: {$this->volume}ml";
    }

    public function getVolume() {
        return $this->volume;
    }
}