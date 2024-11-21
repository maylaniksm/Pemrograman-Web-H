<?php

namespace App\Middleware;
use App\Traits\ApiResponseFormatter;

class AuthMiddleware
{
    public static function handle()
    {
        // Memulai sesi jika belum dimulai
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Cek apakah pengguna sudah login
        if (!isset($_SESSION['user'])) {
            // Jika belum login, kirimkan respons JSON dan hentikan eksekusi
            header('Content-Type: application/json');
            http_response_code(401);
            echo json_encode([
                "code" => 401,
                "message" => "Unauthorized. Please log in."
            ]);
            exit; // Hentikan eksekusi lebih lanjut
        }
    }
}
