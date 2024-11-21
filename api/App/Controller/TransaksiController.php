<?php

namespace App\Controller;

// include "App/Traits/ApiResponseFormatter.php";
include "App/Models/Transaksi.php";

use App\Models\Transaksi;
use App\Traits\ApiResponseFormatter;

class TransaksiController
{
    use ApiResponseFormatter;

    public function index()
    {
        $transaksiModel = new Transaksi();
        // $response = $transaksiModel->findAll();
        $response = $transaksiModel->getAllWithMobil();
        return $this->apiResponse(200, "success", $response);
    }

    public function getById($id)
    {
        $transaksiModel = new Transaksi();
        $response = $transaksiModel->findById($id);
        return $this->apiResponse(200, "success", $response);
    }

    public function getByMobil($idMobil)
    {
        $transaksiModel = new Transaksi();
        $response = $transaksiModel->findByMobil($idMobil);
        return $this->apiResponse(200, "success", $response);
    }

    public function getTotalTransaksi()
    {
        $transaksiModel = new Transaksi();
        $response = $transaksiModel->customSingleQuery("SELECT COUNT(*) as total_transaksi FROM transaksi");
        return $this->apiResponse(200, "success", $response);
    }

    public function getTotalTransaksiStatus()
    {
        $transaksiModel = new Transaksi();
        $response = $transaksiModel->customSingleQuery("SELECT 
            COUNT(CASE WHEN status='selesai' THEN 1 END) AS total_selesai,
            COUNT(CASE WHEN status='proses' THEN 1 END) AS total_proses
        FROM transaksi");
        return $this->apiResponse(200, "success", $response);
    }

    public function insert()
    {
        // Membaca input JSON dari body request
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // Validasi input JSON
        if (json_last_error()) {
            return $this->apiResponse(400, "Error: Invalid JSON input", null);
        }

        // Validasi apakah semua data yang diperlukan tersedia
        $requiredFields = ['nama', 'id_mobil', 'status', 'tarif', 'sewa_masuk', 'sewa_keluar'];
        foreach ($requiredFields as $field) {
            if (!isset($inputData[$field])) {
                return $this->apiResponse(400, "Error: Missing field $field", null);
            }
        }

        // Buat instance model Transaksi
        $transaksiModel = new Transaksi();

        // Panggil metode create pada model Transaksi
        $response = $transaksiModel->create([
            'nama' => $inputData['nama'],
            'id_mobil' => $inputData['id_mobil'],
            'status' => $inputData['status'],
            'tarif' => $inputData['tarif'],
            'sewa_masuk' => $inputData['sewa_masuk'],
            'sewa_keluar' => $inputData['sewa_keluar']
        ]);

        // Kembalikan response
        if ($response) {
            return $this->apiResponse(200, "Data successfully inserted", $response);
        } else {
            return $this->apiResponse(500, "Error: Failed to insert data", null);
        }
    }

    public function update($id)
    {
        // Membaca input JSON dari body request
        $jsonInput = file_get_contents('php://input');
        $inputData = json_decode($jsonInput, true);

        // Validasi input JSON
        if (json_last_error()) {
            return $this->apiResponse(400, "Error: Invalid JSON input", null);
        }

        // Validasi apakah semua data yang diperlukan tersedia
        $requiredFields = ['nama', 'id_mobil', 'status', 'tarif', 'sewa_masuk', 'sewa_keluar'];
        foreach ($requiredFields as $field) {
            if (!isset($inputData[$field])) {
                return $this->apiResponse(400, "Error: Missing field $field", null);
            }
        }

        // Buat instance model Transaksi
        $transaksiModel = new Transaksi();

        // Panggil metode update pada model Transaksi
        $response = $transaksiModel->update($id, [
            'nama' => $inputData['nama'],
            'id_mobil' => $inputData['id_mobil'],
            'status' => $inputData['status'],
            'tarif' => $inputData['tarif'],
            'sewa_masuk' => $inputData['sewa_masuk'],
            'sewa_keluar' => $inputData['sewa_keluar']
        ]);

        // Kembalikan response
        if ($response) {
            return $this->apiResponse(200, "Data successfully updated", $response);
        } else {
            return $this->apiResponse(500, "Error: Failed to update data", null);
        }
    }


    public function delete($id)
    {
        $transaksiModel = new Transaksi();
        $transaksiModel->delete($id);

        return $this->apiResponse(200, "success");
    }
}