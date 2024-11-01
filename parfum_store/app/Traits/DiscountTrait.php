<?php
namespace PARFUM_STORE\app\Traits;

trait DiscountTrait {
    public function applyDiscount($percentage) {
        $this->price -= ($this->price * $percentage / 100);
    }
}