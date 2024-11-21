<?php

namespace App\Routes;

include "App/Controller/MobilController.php";

use App\Controller\MobilController;

class MobilRoutes
{
    public function handle($method, $path)
    {

        if ($method == "GET" && $path === "/api/mobil") {
            $controller = new MobilController();
            echo $controller->index();
        } else if ($method == "GET" && strpos($path, "/api/mobil/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new MobilController();
            echo $controller->getById($id);
        } else if ($method == "POST" && $path === "/api/mobil") {
            $controller = new MobilController();
            echo $controller->insert();
        } else if ($method == "PUT" && strpos($path, "/api/mobil") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new MobilController();
            echo $controller->update($id);
        } else if ($method == "DELETE" && strpos($path, "/api/mobil") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new MobilController();
            echo $controller->delete($id);
        }
    }
}