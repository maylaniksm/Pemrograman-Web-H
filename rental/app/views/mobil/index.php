<div class="flex-1 p-8 bg-background">
    <p class="text-2xl font-semibold border-b">Mobil</p>
    <div class="flex" style="justify-content: space-between;">
        <p>Daftar mobil yang ada</p>
        <a href="<?= BASEURL ?>/mobil/add" class="rounded-lg font-semibold"
            style="padding: 8px 20px; background-color: #3a78f0; color: white; border: 1px solid #ddd; cursor: pointer; font-size: 14px;">Add mobil</a>
    </div>
    <br>
    <div class="p-4  border border-gray-300 rounded-lg bg-white">
        <div class="">
            <table class="border border-gray-300" style="width: 100%;">
                <thead class="">
                    <tr>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">#</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Gambar</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Merek</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Warna</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Harga</th>
                        <th class="px-4 py-2 text-start" style="border-bottom: 1px solid #D1D5DB;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data['mobils'] as $mobil) {
                        echo
                            "<tr class='bg-gray-50'>
                                <td class='px-4 py-2' style='border-bottom: 1px solid #D1D5DB;'>{$mobil['id']}</td>
                                <td class='px-4 py-2' style='border-bottom: 1px solid #D1D5DB;'><img src='{$mobil['image_url']}' class='object-cover' alt='error' height='70' ></td>
                                <td class='px-4 py-2' style='border-bottom: 1px solid #D1D5DB;'>{$mobil['merek']}</td>
                                <td class='px-4 py-2' style='border-bottom: 1px solid #D1D5DB;'>{$mobil['warna']}</td>
                                <td class='px-4 py-2' style='border-bottom: 1px solid #D1D5DB;'>Rp{$mobil['harga']}</td>
                                <td class='px-4 py-2' style='border-bottom: 1px solid #D1D5DB;'>
                                    <a style='color: blue;' href='" . BASEURL . "/mobil/detail/{$mobil['id']}'>Edit</a>
                                    <span>|</span>
                                    <a style='color: red;' href='" . BASEURL . "/mobil/delete/{$mobil['id']}' 
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