<?php

header("Content-Type: application/json; charset=UTF-8");

require_once "App/Config/DatabaseConfig.php";
require_once "App/Traits/ApiResponseFormatter.php";
require_once "App/Middleware/AuthMiddleware.php";

// route import
include "App/Routes/MobilRoutes.php";
include "App/Routes/TransaksiRoutes.php";
include "App/Routes/UserRoutes.php";

use App\Routes\MobilRoutes;
use App\Routes\TransaksiRoutes;
use App\Routes\UserRoutes;

$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// route function
$mobilRoutes = new MobilRoutes();
$mobilRoutes->handle($method, $path);

$transaksiRoutes = new TransaksiRoutes();
$transaksiRoutes->handle($method, $path);

$userRoutes = new UserRoutes();
$userRoutes->handle($method, $path);