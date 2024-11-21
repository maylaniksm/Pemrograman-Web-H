<!DOCTYPE html>
<html lang="en">
<?php
// var_dump($data['is_mobil']);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title'] ?></title>

    <link rel="stylesheet" href="<?= BASEURL ?>/css/index.css">
</head>

<body>
    <div class="flex h-screen">
        <div class="w-min-72 bg-blue-500 text-white">
            <h2 class="flex items-center mt-4 ml-8 text-3xl font-semibold">
                <svg width="32" height="32" fill="currentColor" class="mr-4 bi bi-car-front" viewBox="0 0 16 16">
                    <path
                        d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276" />
                    <path
                        d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z" />
                </svg>
                <p>PrimeRide</p>
            </h2>

            <ul class="mt-12 mr-8 ml-8">
                <li class="pr-8 pl-8 pt-3 pb-3 rounded-lg <?= isset($data['is_dashboard']) && $data['is_dashboard'] ? "bg-white text-blue-500" : "" ?>">
                    <a href="<?= BASEURL ?>/dashboard/index"
                        class="flex text-md <?= isset($data['is_dashboard']) && $data['is_dashboard'] ? "text-blue-500 font-semibold" : "text-white" ?>">
                        <svg width="20" height="20" fill="currentColor" class="mr-2 bi bi-house-door-fill"
                            viewBox="0 0 16 16">
                            <path
                                d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5" />
                        </svg>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="pr-8 pl-8 pt-3 pb-3 rounded-lg text-white <?= isset($data['is_mobil']) && $data['is_mobil'] ? "bg-white" : "" ?>">
                    <a href="<?= BASEURL ?>/mobil/index"
                        class="flex text-md <?= isset($data['is_mobil']) && $data['is_mobil'] ? "text-blue-500 font-semibold" : "text-white" ?>">
                        <svg width="20" height="20" fill="currentColor" class="mr-2 bi bi-car-front-fill"
                            viewBox="0 0 16 16">
                            <path
                                d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM3 10a1 1 0 1 0 0-2 1 1 0 0 0 0 2m10 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM2.906 5.189a.51.51 0 0 0 .497.731c.91-.073 3.35-.17 4.597-.17s3.688.097 4.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 11.691 3H4.309a.5.5 0 0 0-.447.276L2.906 5.19Z" />
                        </svg>
                        <p>Mobil</p>
                    </a>
                </li>
                <li class="pr-8 pl-8 pt-3 pb-3 rounded-lg text-white <?= isset($data['is_transaksi']) && $data['is_transaksi'] ? "bg-white" : "" ?>">
                    <a href="<?= BASEURL ?>/transaksi/index"
                        class="flex text-md <?= isset($data['is_transaksi']) && $data['is_transaksi'] ? "text-blue-500 font-semibold" : "text-white" ?>">
                        <svg width="20" height="20" fill="currentColor" class="mr-2 bi bi-cash-stack"
                            viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                            <path
                                d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z" />
                        </svg>
                        <p>Transaksi</p>
                    </a>
                </li>
                <li class="pr-8 pl-8 pt-3 pb-3 rounded-lg text-white <?= isset($data['is_logout']) && $data['is_logout'] ? "bg-white" : "" ?>">
                    <a href="<?= BASEURL ?>/authcontroller/logout" onclick="return confirmLogout(event)"
                        class="flex text-md <?= isset($data['is_logout']) && $data['is_logout'] ? "text-blue-500 font-semibold" : "text-white" ?>">
                        <svg width="20" height="20" fill="currentColor" class="mr-2 bi bi-door-closed"
                            viewBox="0 0 16 16">
                            <path
                                d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3zm1 13h8V2H4z" />
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0" />
                        </svg>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
        <script>
            function confirmLogout(event) {
                const confirmation = confirm('Apakah Anda yakin ingin logout?');
                if (!confirmation) {
                    event.preventDefault(); // Batalkan navigasi jika pengguna memilih "Batal"
                    return false;
                }
                return true; // Lanjutkan navigasi jika pengguna memilih "OK"
            }
        </script>