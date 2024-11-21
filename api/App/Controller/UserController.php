<?php

namespace App\Controller;

// include "App/Traits/ApiResponseFormatter.php";
include "App/Models/User.php";

use App\Models\User;
use App\Traits\ApiResponseFormatter;

class UserController
{
    use ApiResponseFormatter;

    public function index()
    {
        $userModel = new User();
        $response = $userModel->findAll();
        return $this->apiResponse(200, "success", $response);
    }

    public function login()
    {
        // Membaca input JSON dari body request
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // Validasi input JSON
        if (json_last_error()) {
            return $this->apiResponse(400, "Error: Invalid JSON input", null);
        }

        // Validasi apakah semua data yang diperlukan tersedia
        $requiredFields = ['username', 'password'];
        foreach ($requiredFields as $field) {
            if (!isset($inputData[$field])) {
                return $this->apiResponse(400, "Error: Missing field $field", null);
            }
        }

        $userModel = new User();
        $user = $userModel->authenticate($inputData['username'], $inputData['password']);

        if ($user) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['user'] = $user;

            return $this->apiResponse(200, "success", $user);
        } else {
            return $this->apiResponse(400, "password salah", $user);
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $user = $_SESSION['user'];
        // Hapus data sesi
        session_destroy();

        return $this->apiResponse(200, "success logout", $user);
    }

    public function register()
    {
        // Membaca input JSON dari body request
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // Validasi input JSON
        if (json_last_error()) {
            return $this->apiResponse(400, "Error: Invalid JSON input", null);
        }

        // Validasi apakah semua data yang diperlukan tersedia
        $requiredFields = ['nama', 'nomor_hp', 'username', 'password'];
        foreach ($requiredFields as $field) {
            if (!isset($inputData[$field])) {
                return $this->apiResponse(400, "Error: Missing field $field", null);
            }
        }

        $userModel = new User();
        $user = $userModel->create($inputData);

        return $this->apiResponse(200, "success create user", $user);
    }

    // public function getById($id)
    // {
    //     $mobilModel = new Mobil();
    //     $response = $mobilModel->findById($id);
    //     return $this->apiResponse(200, "success", $response);
    // }

    // public function insert()
    // {
    //     // Membaca input JSON dari body request
    //     $jsonInput = file_get_contents('php://input');
    //     $inputData = json_decode($jsonInput, true);

    //     // Validasi input JSON
    //     if (json_last_error()) {
    //         return $this->apiResponse(400, "Error: Invalid JSON input", null);
    //     }

    //     // Validasi apakah semua data yang diperlukan tersedia
    //     $requiredFields = ['merek', 'nomor_polisi', 'warna', 'transmisi', 'kapasitas', 'harga', 'image_url'];
    //     foreach ($requiredFields as $field) {
    //         if (!isset($inputData[$field])) {
    //             return $this->apiResponse(400, "Error: Missing field $field", null);
    //         }
    //     }

    //     // Buat instance model Mobil
    //     $mobilModel = new Mobil();

    //     // Panggil metode create pada model Mobil
    //     $response = $mobilModel->create([
    //         'merek' => $inputData['merek'],
    //         'nomor_polisi' => $inputData['nomor_polisi'],
    //         'warna' => $inputData['warna'],
    //         'transmisi' => $inputData['transmisi'],
    //         'kapasitas' => $inputData['kapasitas'],
    //         'harga' => $inputData['harga'],
    //         'image_url' => $inputData['image_url']
    //     ]);

    //     // Kembalikan response
    //     if ($response) {
    //         return $this->apiResponse(200, "Data successfully inserted", $response);
    //     } else {
    //         return $this->apiResponse(500, "Error: Failed to insert data", null);
    //     }
    // }

    // public function update($id)
    // {
    //     // Membaca input JSON dari body request
    //     $jsonInput = file_get_contents('php://input');
    //     $inputData = json_decode($jsonInput, true);

    //     // Validasi input JSON
    //     if (json_last_error()) {
    //         return $this->apiResponse(400, "Error: Invalid JSON input", null);
    //     }

    //     // Validasi apakah semua data yang diperlukan tersedia
    //     $requiredFields = ['merek', 'nomor_polisi', 'warna', 'transmisi', 'kapasitas', 'harga', 'image_url'];
    //     foreach ($requiredFields as $field) {
    //         if (!isset($inputData[$field])) {
    //             return $this->apiResponse(400, "Error: Missing field $field", null);
    //         }
    //     }

    //     // Buat instance model Mobil
    //     $mobilModel = new Mobil();

    //     // Panggil metode update pada model Mobil
    //     $response = $mobilModel->update($id, [
    //         'merek' => $inputData['merek'],
    //         'nomor_polisi' => $inputData['nomor_polisi'],
    //         'warna' => $inputData['warna'],
    //         'transmisi' => $inputData['transmisi'],
    //         'kapasitas' => $inputData['kapasitas'],
    //         'harga' => $inputData['harga'],
    //         'image_url' => $inputData['image_url'],
    //     ]);

    //     // Kembalikan response
    //     if ($response) {
    //         return $this->apiResponse(200, "Data successfully updated", $response);
    //     } else {
    //         return $this->apiResponse(500, "Error: Failed to update data", null);
    //     }
    // }

    // public function delete($id)
    // {
    //     $mobilModel = new Mobil();
    //     $response = $mobilModel->delete($id);

    //     return $this->apiResponse(200, "success", $response);
    // }
}