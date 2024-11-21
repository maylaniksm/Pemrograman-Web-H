<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Mobil</title>
    <link rel="stylesheet" href="<?= BASEURL ?>/css/index.css">
</head>

<body style="margin: 0; font-family: Arial, sans-serif;">

    <!-- Header -->
    <header style="background-color: #172765; color: white; padding: 20px; text-align: center;">
        <h1 style="margin: 0; font-weight:600;">PrimeRide</h1>
        <p style="margin: 5px 0;">Solusi terbaik untuk perjalanan Anda</p>
    </header>

    <!-- Hero Section -->
    <section
        style="position: relative; background-image: url('https://jakartapuncakbandung.com/wp-content/uploads/2019/09/car-rental-banner-1024x379.png'); background-size: cover; background-position: center; height: 400px; display: flex; align-items: center; justify-content: center; color: white;">
        <!-- Overlay gelap -->
        <div
            style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6);">
        </div>

        <div style="text-align: center; z-index: 1;">
            <h2 style="font-size: 36px; margin: 0;">Sewa Mobil Dengan Mudah</h2>
            <p style="font-size: 18px; margin: 10px 0;">Beragam pilihan mobil dengan harga terjangkau</p>
            <button
                style="padding: 10px 20px; background-color: #172765; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Lihat Pilihan Mobil
            </button>
        </div>
    </section>

    <!-- Features Section -->
    <section style="padding: 40px; text-align: center;">
        <h3 style="font-size: 24px; margin-bottom: 20px;">Kenapa Memilih Kami?</h3>
        <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
            <div style="width: 300px; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                <h4 style="font-size: 20px; margin-bottom: 10px;">Harga Terbaik</h4>
                <p style="font-size: 16px;">Kami menawarkan harga yang kompetitif untuk semua kendaraan.</p>
            </div>
            <div style="width: 300px; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                <h4 style="font-size: 20px; margin-bottom: 10px;">Beragam Pilihan</h4>
                <p style="font-size: 16px;">Tersedia berbagai jenis mobil yang sesuai dengan kebutuhan Anda.</p>
            </div>
            <div style="width: 300px; padding: 20px; border: 1px solid #ddd; border-radius: 8px;">
                <h4 style="font-size: 20px; margin-bottom: 10px;">Pelayanan Terbaik</h4>
                <p style="font-size: 16px;">Tim kami siap melayani Anda dengan profesional dan ramah.</p>
            </div>
        </div>
    </section>

    <!-- Cars Section -->
    <section style="padding: 40px; text-align: center;">
        <h3 style="font-size: 24px; margin-bottom: 20px;">Pilihan Mobil</h3>
        <div style="display: flex; justify-content: center; gap: 30px; flex-wrap: wrap;">
            <?php
            foreach ($data['mobils'] as $mobil) {
                ?>
                <!-- Mobil 1 -->
                <a href="<?= BASEURL ?>/userpage/detail/<?= $mobil['id'] ?>" style="width: 320px; text-decoration: none;">
                    <div
                        style="padding: 20px; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                        <img src="<?= $mobil['image_url'] ?>" alt="Mobil 1"
                            style="width: 100%; height:150px; object-fit:cover; border-radius: 8px;">
                        <h4 style="font-size: 20px; margin-top: 15px;"><?= $mobil['merek'] ?></h4>
                        <p style="font-size: 16px; color: #777;">Harga: Rp<?= number_format($mobil['harga'], 0, ',', '.') ?> /hari</p>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>


    <!-- Footer -->
    <footer style="background-color: #172765; color: white; text-align: center; padding: 10px;">
    <p style="margin: 0;">Hubungi Kami di 085856944502</p>
    <p style="margin: 0;">© 2024 PrimeRide. All rights reserved.</p>
    </footer>

</body>

</html>