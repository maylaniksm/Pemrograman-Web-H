<?php
require __DIR__ . '/vendor/autoload.php';

use PARFUM_STORE\app\Controllers\ProductController;
use PARFUM_STORE\app\Models\Parfum;

$controller = new ProductController();

$parfum1 = new Parfum("Eau de Toilette", 100, 50);
$parfum2 = new Parfum("Eau de Parfum", 150, 100);

$controller->addProduct($parfum1);
$controller->addProduct($parfum2);

$parfum1->applyDiscount(10); // Diskon 10%

$controller->listProducts();