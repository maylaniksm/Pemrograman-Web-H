<?php

namespace Database\Seeders;

use App\Models\Mobil;
use App\Models\Transaksi;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Mobil::create([
            'merek' => 'Toyota',
            'nomor_polisi' => '1234',
            'warna' => 'Merah',
            'transmisi' => 'Manual',
            'kapasitas' => 4,
            'harga' => 1000000,
            'image_url' => 'https://example.com/toyota.jpg',
        ]);

        Transaksi::create([
            'name' => 'sonia dr',
            'mobil_id' => 1,
            'status' => 'proses',
            'sewa_masuk' => now(),
            'sewa_keluar' => now()->addDays(7),
        ]);
    }
}
