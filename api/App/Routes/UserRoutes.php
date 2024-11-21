<?php

namespace App\Routes;

include "App/Controller/UserController.php";

use App\Controller\UserController;

class UserRoutes
{
    public function handle($method, $path)
    {

        if ($method == "GET" && $path == "/api/user") {
            $controller = new UserController();
            echo $controller->index();
        } else if ($method == "POST" && $path == "/api/login") {
            $controller = new UserController();
            echo $controller->login();
        } else if ($method == "POST" && $path == "/api/logout") {
            $controller = new UserController();
            echo $controller->logout();
        } else if ($method == "POST" && $path == "/api/register") {
            $controller = new UserController();
            echo $controller->register();
        }
        // else if ($method == "GET" && strpos($path, "/api/mobil/") === 0) {
        //     $pathParts = explode("/", $path);
        //     $id = $pathParts[count($pathParts) - 1];

        //     $controller = new MobilController();
        //     echo $controller->getById($id);
        // } else if ($method == "POST" && $path == "/api/mobil") {
        //     $controller = new MobilController();
        //     echo $controller->insert();
        // } else if ($method == "PUT" && strpos($path, "/api/mobil") === 0) {
        //     $pathParts = explode("/", $path);
        //     $id = $pathParts[count($pathParts) - 1];

        //     $controller = new MobilController();
        //     echo $controller->update($id);
        // } else if ($method == "DELETE" && strpos($path, "/api/mobil") === 0) {
        //     $pathParts = explode("/", $path);
        //     $id = $pathParts[count($pathParts) - 1];

        //     $controller = new MobilController();
        //     echo $controller->delete($id);
        // }
    }
}