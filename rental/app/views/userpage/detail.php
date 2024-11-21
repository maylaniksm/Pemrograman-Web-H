<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/index.css">
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">
    <div
        style="width: 60%; margin: 50px auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
        <div style="text-align: center; margin-bottom: 20px;">
            <h1 style="font-size: 36px; color: #333;"><?= $data['mobil']['merek'] ?></h1>
        </div>

        <div style="text-align: center; margin-bottom: 20px;">
            <img src="<?= $data['mobil']['image_url'] ?>" alt="data['mobil'] Image"
                style="width: 100%; max-width: 500px; border-radius: 8px;">
        </div>
        <div class="flex" style="gap: 40px; justify-content: space-evenly;">
            <div style="">
                <h3>Spesifikasi</h3>
                <p><strong>Merek:</strong> <?= $data['mobil']['merek'] ?></p>
                <p><strong>Nomor Polisi:</strong> <?= $data['mobil']['nomor_polisi'] ?></p>
                <p><strong>Warna:</strong> <?= $data['mobil']['warna'] ?></p>
                <p><strong>Transmisi:</strong> <?= $data['mobil']['transmisi'] ?></p>
                <p><strong>Kapasitas:</strong> <?= $data['mobil']['kapasitas'] ?></p>
                <p><strong>Harga:</strong> <?= $data['mobil']['harga'] ?></p>
            </div>
            <div style="">
                <h3>Jadwal reservasi</h3>
                <?php
                foreach ($data['transaksis'] as $transaksi) {
                    ?>
                    <p><?= $transaksi['sewa_masuk'] ?> - <?= $transaksi['sewa_keluar'] ?> (<?= $transaksi['nama'] ?>)</p>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>