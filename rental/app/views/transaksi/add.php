<div
    style="min-width: 500px; height:fit-content; margin: 20px 40px; border: 1px solid #ccc; padding: 20px 40px 20px 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    <form action="<?= BASEURL ?>/transaksi/store" method="POST">
        <div style="margin-bottom: 15px;">
            <label for="nama" style="display: block; margin-bottom: 5px; font-weight: 600;">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukan nama pemesan"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="id_mobil" style="display: block; margin-bottom: 5px; font-weight: 600;">Mobil</label>
            <select name="id_mobil" id="id_mobil" onchange="showTransaksiByMobil()"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <?php
                foreach ($data['mobils'] as $mobil) {
                    echo "<option value='{$mobil['id']}'>{$mobil['merek']} - Rp{$mobil['harga']}</option>";
                }
                ?>
            </select>
        </div>
        <div style="margin-bottom: 15px;">
            <label style="display: block; margin-bottom: 5px; font-weight: 600;">Jadwal reservasi</label>
            <div id="jadwal_transaksi" style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
                <!-- DAFTAR TRANSAKSI AKAN DIAPPEND DISINI -->
            </div>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="tarif" style="display: block; margin-bottom: 5px; font-weight: 600;">Tarif <span id="label_tarif" style="font-weight: 400;"></span></label>
            <input type="text" id="tarif" name="tarif"
                placeholder="Masukan nomor tarif"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; cursor: not-allowed;" readonly>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="sewa_masuk" style="display: block; margin-bottom: 5px; font-weight: 600;">Sewa masuk</label>
            <input type="date" id="sewa_masuk" name="sewa_masuk" onchange="showTransaksiByMobil()" placeholder="Masukan nomor polisi"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="sewa_keluar" style="display: block; margin-bottom: 5px; font-weight: 600;">Sewa keluar</label>
            <input type="date" id="sewa_keluar" name="sewa_keluar" onchange="showTransaksiByMobil()" placeholder="Masukan warna"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div class="flex" style="text-align: center; justify-content: center; gap: 20px;">
            <a href="<?= BASEURL ?>/transaksi/index"
                style="padding: 10px 20px; background-color: #ff0000; color: white; border: none; border-radius: 4px; cursor: pointer;">
                Cancel
            </a>
            <button type="submit"
                style="padding: 10px 20px; background-color: #3a78f0; color: white; border: none; border-radius: 4px; cursor: pointer;"
                onclick="return confirm('Are you sure you want to create this item?');">
                Submit
            </button>
        </div>
    </form>
</div>
<script>
    const mobils = <?php echo json_encode($data['mobils']); ?>;
    // console.log(mobils[0]);

    function formatDate(dateString) {
        const date = new Date(dateString);
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        return date.toLocaleDateString('id-ID', options);
    }

    function calculateDateDifference(idDate1, idDate2) {
        const date1 = document.getElementById(idDate1).value;
        const date2 = document.getElementById(idDate2).value;

        if (date1 && date2) {
            const startDate = new Date(date1);
            const endDate = new Date(date2);

            const timeDifference = endDate - startDate;

            const daysDifference = timeDifference / (1000 * 3600 * 24);

            return Math.abs(daysDifference);
        } else {
            return 0;
        }
    }

    function getTarif(idMobil) {
        // tarif (harus dikalikan lama sewa)
        const tarif = document.getElementById('tarif');
        mobils.forEach(mobil => {
            if (mobil.id === idMobil) {
                const dateDifference =calculateDateDifference('sewa_masuk', 'sewa_keluar');
                document.getElementById('label_tarif').innerHTML = `(${dateDifference} hari)`;
                tarif.value = mobil.harga * dateDifference;
            }
        });
    }


    async function showTransaksiByMobil() {
        try {
            const idMobil = document.getElementById('id_mobil').value;

            // Fetch data dari endpoint
            const response = await fetch(`http://localhost:8000/api/transaksiByMobil/${idMobil}`);

            // Periksa apakah respons berhasil
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const data = await response.json();
            const container = document.getElementById('jadwal_transaksi');

            container.innerHTML = '';

            const transaksiElement = document.createElement('div');
            if (data.data.length === 0) {
                transaksiElement.innerHTML = `
                    <p>Reservasi kosong</p>
                `;
            } else {
                data.data.forEach(transaksi => {
                    transaksiElement.innerHTML += `
                        <p>${formatDate(transaksi.sewa_masuk)} - ${formatDate(transaksi.sewa_keluar)} (${transaksi.nama})</p>
                    `;
                });
                transaksiElement.innerHTML += `
                    <p style="color: red;">Pilih selain hari diatas.</p>
                `;
            }
            container.appendChild(transaksiElement);
            getTarif(idMobil);

        } catch (error) {
            console.error('Error fetching transaksi:', error);
        }
    }
    const idMobil = document.getElementById('id_mobil');
    document.addEventListener('DOMContentLoaded', () => showTransaksiByMobil(idMobil));
</script>