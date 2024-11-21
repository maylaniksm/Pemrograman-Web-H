<div class="flex-1 p-8 bg-background">
    <p class="text-2xl font-semibold border-b">Transaksi</p>
    <div class="flex" style="justify-content: space-between;">
        <p>Daftar transaksi</p>
        <a href="<?= BASEURL ?>/transaksi/add" class="rounded-lg font-semibold"
            style="padding: 8px 20px; background-color: #3a78f0; color: white; border: 1px solid #ddd; cursor: pointer; font-size: 14px;">Add
            mobil</a>
    </div>
    <br>
    <div class="p-4  border border-gray-300 rounded-lg bg-white">
        <div class="">
            <table class="border border-gray-300" style="width: 100%;">
                <thead class="">
                    <tr>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">#</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Nama</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Merek</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Status</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Tarif</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Sewa Masuk</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Sewa Keluar</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['transaksis'] as $transaksi) {
                        echo
                            "<tr class='bg-gray-50'>
                                <td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'>{$transaksi['id']}</td>
                                <td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'>{$transaksi['nama']}</td>
                                <td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'>{$transaksi['merek']}</td>
                            ";
                        if ($transaksi['status'] === 'proses') {
                            echo "<td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'><p style='padding: 2px 20px; border-radius:8px; background: red; width: fit-content; color:white; font-size: 14px;'>{$transaksi['status']}</p></td>";
                        } else {
                            echo "<td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'><p style='padding: 2px 20px; border-radius:8px; background: green; width: fit-content; color:white; font-size: 14px;'>{$transaksi['status']}</p></td>";
                        }
                        echo
                            "<td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'>Rp" . number_format($transaksi['tarif'], 0, ',', '.') . "</td>
                                <td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'>{$transaksi['sewa_masuk']}</td>
                                <td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'>{$transaksi['sewa_keluar']}</td>
                                <td class='px-4 py-4' style='border-bottom: 1px solid #D1D5DB;'>
                                    <a style='color: blue;' href='" . BASEURL . "/transaksi/detail/{$transaksi['id']}'>Edit</a>
                                    <span>|</span>
                                    <a style='color: red;' href='" . BASEURL . "/transaksi/delete/{$transaksi['id']}' 
                                        onclick='return confirm(\"Are you sure you want to delete this item?\");'>
                                        Delete
                                    </a>
                                </td>
                            </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

    </div>
</div>