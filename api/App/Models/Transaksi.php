<?php

namespace App\Models;

// include "App/Config/DatabaseConfig.php";

use App\Config\DatabaseConfig;
use mysqli;

class Transaksi extends DatabaseConfig
{
    public $conn;
    public $table = "transaksi";

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

    public function getAllWithMobil()
    {
        $query = "
        SELECT 
            t.id, 
            t.nama, 
            t.status, 
            t.tarif, 
            t.sewa_masuk, 
            t.sewa_keluar, 
            m.merek, 
            m.nomor_polisi, 
            m.warna, 
            m.transmisi, 
            m.kapasitas, 
            m.harga, 
            m.image_url
        FROM transaksi t
        JOIN mobil m ON t.id_mobil = m.id
    ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Tutup statement dan koneksi
        $stmt->close();
        $this->conn->close();

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

    public function findByMobil($idMobil)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id_mobil=? AND status='proses'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $idMobil);
        $stmt->execute();
        $result = $stmt->get_result();
        $this->conn->close();
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function customSingleQuery($query)
    {
        $result = $this->conn->query($query);
    
        if ($result && $result->num_rows > 0) {
            return $result->fetch_assoc();
        }
        return null;
    }
    

    public function create($data)
    {
        $nama = $data['nama'];
        $idMobil = $data['id_mobil'];
        $status = $data['status'];
        $tarif = $data['tarif'];
        $sewaMasuk = $data['sewa_masuk'];
        $sewaKeluar = $data['sewa_keluar'];

        $query = "INSERT INTO {$this->table} (nama, id_mobil, status, tarif, sewa_masuk, sewa_keluar) 
              VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("sissss", $nama, $idMobil, $status, $tarif, $sewaMasuk, $sewaKeluar);

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
        $nama = $data['nama'];
        $idMobil = $data['id_mobil'];
        $status = $data['status'];
        $tarif = $data['tarif'];
        $sewaMasuk = $data['sewa_masuk'];
        $sewaKeluar = $data['sewa_keluar'];

        $query = "UPDATE {$this->table} 
              SET nama = ?, id_mobil = ?, status = ?, tarif = ?, sewa_masuk = ?, sewa_keluar = ? 
              WHERE id = ?";

        $stmt = $this->conn->prepare($query);

        $stmt->bind_param("sissssi", $nama, $idMobil, $status, $tarif, $sewaMasuk, $sewaKeluar, $id);

        if ($stmt->execute()) {
            return [
                'id' => $id,
                'nama' => $nama,
                'id_mobil' => $idMobil,
                'status' => $status,
                'tarif' => $tarif,
                'sewa_masuk' => $sewaMasuk,
                'sewa_keluar' => $sewaKeluar
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
        $query = "DELETE FROM {$this->table} WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $this->conn->close();
    }
}