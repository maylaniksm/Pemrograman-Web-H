<?php

namespace App\Models;

// include "App/Config/DatabaseConfig.php";

use App\Config\DatabaseConfig;
use mysqli;

class Mobil extends DatabaseConfig
{
    public $conn;
    public $table = "mobil";

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function findAll()
    {
        $sql = "SELECT * FROM {$this->table}";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function findById($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function create($data)
    {
        $merek = $data['merek'];
        $nomorPolisi = $data['nomor_polisi'];
        $warna = $data['warna'];
        $transmisi = $data['transmisi'];
        $kapasitas = $data['kapasitas'];
        $harga = $data['harga'];
        $imageUrl = $data['image_url'];

        $query = "INSERT INTO {$this->table} (merek, nomor_polisi, warna, transmisi, kapasitas, harga, image_url) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ssssiis", $merek, $nomorPolisi, $warna, $transmisi, $kapasitas, $harga, $imageUrl);

        if ($stmt->execute()) {
            return $data;
        } else {
            echo "Error: {$stmt->error}";
        }

        $stmt->close();
        $this->conn->close();
    }

    public function update($id, $data)
    {
        $merek = $data['merek'];
        $nomorPolisi = $data['nomor_polisi'];
        $warna = $data['warna'];
        $transmisi = $data['transmisi'];
        $kapasitas = $data['kapasitas'];
        $harga = $data['harga'];
        $imageUrl = $data['image_url'];

        $query = "UPDATE {$this->table} 
              SET merek = ?, nomor_polisi = ?, warna = ?, transmisi = ?, kapasitas = ?, harga = ?, image_url = ? 
              WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("ssssiisi", $merek, $nomorPolisi, $warna, $transmisi, $kapasitas, $harga, $imageUrl, $id);

        if ($stmt->execute()) {
            return [
                'id' => $id,
                'merek' => $merek,
                'nomor_polisi' => $nomorPolisi,
                'warna' => $warna,
                'transmisi' => $transmisi,
                'kapasitas' => $kapasitas,
                'harga' => $harga,
                'image_url' => $imageUrl
            ];
        } else {
            echo "Error: {$stmt->error}";
        }

        // Tutup koneksi
        $stmt->close();
        $this->conn->close();
    }

    public function delete($id)
    {
        $query = "DELETE FROM mobil WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}