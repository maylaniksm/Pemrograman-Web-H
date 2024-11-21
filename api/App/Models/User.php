<?php

namespace App\Models;

use App\Config\DatabaseConfig;
use mysqli;

class User extends DatabaseConfig
{
    public $conn;
    public $table = "user";

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function findAll()
    {
        $sql = "SELECT id, nama, nomor_hp, username FROM {$this->table}";
        $result = $this->conn->query($sql);
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    public function findByUsername($username)
    {
        $sql = "SELECT * FROM {$this->table} WHERE username=?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        // $this->conn->close();
        // $data = [];
        // while ($row = $result->fetch_assoc()) {
        //     $data[] = $row;
        // }
        return $result->fetch_assoc();
    }

    public function authenticate($username, $password)
    {
        $user = $this->findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            return [
                'id' => $user['id'],
                'nama' => $user['nama'],
                'nomor_hp' => $user['nomor_hp']
            ];
        }

        return null; // Autentikasi gagal
    }

    public function create($data)
    {
        $nama = $data['nama'];
        $nomorHp = $data['nomor_hp'];
        $username = $data['username'];
        $password = $data['password'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);

        $query = "INSERT INTO {$this->table} (nama, nomor_hp, username, password) VALUES (?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssss", $nama, $nomorHp, $username, $password);

        if ($stmt->execute()) {
            return [
                'nama' => $nama,
                'nomor_hp' => $nomorHp,
                'username' => $username
            ];
        } else {
            echo "Error: {$stmt->error}";
        }

        $stmt->close();
        $this->conn->close();
    }

    // public function create($data)
    // {
    //     $merek = $data['merek'];
    //     $nomorPolisi = $data['nomor_polisi'];
    //     $warna = $data['warna'];
    //     $transmisi = $data['transmisi'];
    //     $kapasitas = $data['kapasitas'];
    //     $harga = $data['harga'];
    //     $imageUrl = $data['image_url'];

    //     $query = "INSERT INTO {$this->table} (merek, nomor_polisi, warna, transmisi, kapasitas, harga, image_url) 
    //           VALUES (?, ?, ?, ?, ?, ?, ?)";

    //     $stmt = $this->conn->prepare($query);

    //     $stmt->bind_param("ssssiis", $merek, $nomorPolisi, $warna, $transmisi, $kapasitas, $harga, $imageUrl);

    //     if ($stmt->execute()) {
    //         return $data;
    //     } else {
    //         echo "Error: {$stmt->error}";
    //     }

    //     $stmt->close();
    //     $this->conn->close();
    // }

    // public function update($id, $data)
    // {
    //     $merek = $data['merek'];
    //     $nomorPolisi = $data['nomor_polisi'];
    //     $warna = $data['warna'];
    //     $transmisi = $data['transmisi'];
    //     $kapasitas = $data['kapasitas'];
    //     $harga = $data['harga'];
    //     $imageUrl = $data['image_url'];

    //     $query = "UPDATE {$this->table} 
    //           SET merek = ?, nomor_polisi = ?, warna = ?, transmisi = ?, kapasitas = ?, harga = ?, image_url = ? 
    //           WHERE id = ?";

    //     $stmt = $this->conn->prepare($query);

    //     $stmt->bind_param("ssssiisi", $merek, $nomorPolisi, $warna, $transmisi, $kapasitas, $harga, $imageUrl, $id);

    //     if ($stmt->execute()) {
    //         return [
    //             'id' => $id,
    //             'merek' => $merek,
    //             'nomor_polisi' => $nomorPolisi,
    //             'warna' => $warna,
    //             'transmisi' => $transmisi,
    //             'kapasitas' => $kapasitas,
    //             'harga' => $harga,
    //             'image_url' => $imageUrl
    //         ];
    //     } else {
    //         echo "Error: {$stmt->error}";
    //     }

    //     // Tutup koneksi
    //     $stmt->close();
    //     $this->conn->close();
    // }

    // public function delete($id)
    // {
    //     $query = "DELETE FROM mobil WHERE id = ?";
    //     $stmt = $this->conn->prepare($query);
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    //     $this->conn->close();
    // }
}