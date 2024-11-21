<?php

namespace App\Routes;

include "App/Controller/TransaksiController.php";

use App\Controller\TransaksiController;

class TransaksiRoutes
{
    public function handle($method, $path)
    {

        if ($method == "GET" && $path == "/api/transaksi") {
            $controller = new TransaksiController();
            echo $controller->index();
        } else if ($method == "GET" && strpos($path, "/api/transaksi/") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new TransaksiController();
            echo $controller->getById($id);
        } else if ($method == "POST" && $path == "/api/transaksi") {
            $controller = new TransaksiController();
            echo $controller->insert();
        } else if ($method == "PUT" && strpos($path, "/api/transaksi") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new TransaksiController();
            echo $controller->update($id);
        } else if ($method == "DELETE" && strpos($path, "/api/transaksi") === 0) {
            $pathParts = explode("/", $path);
            $id = $pathParts[count($pathParts) - 1];

            $controller = new TransaksiController();
            echo $controller->delete($id);
        } else if ($method == "GET" && strpos($path, "/api/transaksiByMobil") === 0) {
            $pathParts = explode("/", $path);
            $idMobil = $pathParts[count($pathParts) - 1];

            $controller = new TransaksiController();
            echo $controller->getByMobil($idMobil);
        } else if ($method == "GET" && strpos($path, "/api/getTotalTransaksi") === 0){
            $controller = new TransaksiController();
            echo $controller->getTotalTransaksi();
        } else if ($method == "GET" && strpos($path, "/api/getTotalStatus") === 0){
            $controller = new TransaksiController();
            echo $controller->getTotalTransaksiStatus();
        }
    }
}