<div class="flex-1 p-8 bg-background">
    <p class="text-2xl font-semibold border-b">Dashboard | Selamat datang <?= $_SESSION['user']['nama'] ?></p>
    <!-- <?= var_dump($data) ?> -->
    <p>Ringkasan laporan anda</p>
    <br>
    <div style="display: flex; gap: 30px;">
        <div
            style="width: 400px; height:150px; padding:20px 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; font-family: Arial, sans-serif;">
            <div style="padding: 16px;">
                <h2 style="margin: 0 0 8px; font-size: 20px; font-weight:700; color: #333;"><span
                        style="font-size: 40px;"><?= $data['total_transaksi'] ?></span>
                    Total Transaksi</h2>
                <p style="margin: 0 0 12px; font-size: 14px; color: #555;">Banyaknya transaksi yang telah terjadi.</p>
            </div>
        </div>
        <div
            style="width: 400px; height:150px; padding:20px 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; font-family: Arial, sans-serif;">
            <div style="padding: 16px;">
                <h2 style="margin: 0 0 8px; font-size: 20px; font-weight:700; color: #333;"><span
                        style="font-size: 40px;"><?= $data['total_selesai'] ?></span>
                    Transaksi Selesai</h2>
                <p style="margin: 0 0 12px; font-size: 14px; color: #555;">Transaksi telah selesai tanpa masalah.</p>
            </div>
        </div>
        <div
            style="width: 400px; height:150px; padding:20px 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); overflow: hidden; font-family: Arial, sans-serif;">
            <div style="padding: 16px;">
                <h2 style="margin: 0 0 8px; font-size: 20px; font-weight:700; color: #333;"><span
                        style="font-size: 40px;"><?= $data['total_proses'] ?></span>
                    Transaksi Sedang Proses</h2>
                <p style="margin: 0 0 12px; font-size: 14px; color: #555;">Transaksi masih berlanjut sampai saat ini.</p>
            </div>
        </div>
    </div>

</div>