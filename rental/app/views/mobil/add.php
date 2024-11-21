<div
    style="min-width: 500px; height:fit-content; margin: 20px 40px; border: 1px solid #ccc; padding: 20px 40px 20px 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
    <form action="<?= BASEURL ?>/mobil/store" method="POST">
        <div style="margin-bottom: 15px;">
            <label for="merek" style="display: block; margin-bottom: 5px; font-weight: 600;">Merek</label>
            <input type="text" id="merek" name="merek" placeholder="Masukan merek"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="nomor_polisi" style="display: block; margin-bottom: 5px; font-weight: 600;">No. Polisi</label>
            <input type="text" id="nomor_polisi" name="nomor_polisi" placeholder="Masukan nomor polisi"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="warna" style="display: block; margin-bottom: 5px; font-weight: 600;">Warna</label>
            <input type="text" id="warna" name="warna" placeholder="Masukan warna"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="transmisi" style="display: block; margin-bottom: 5px; font-weight: 600;">Transmisi</label>
            <input type="text" id="transmisi" name="transmisi" placeholder="Masukan transmisi"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="kapasitas" style="display: block; margin-bottom: 5px; font-weight: 600;">Kapasitas</label>
            <input type="text" id="kapasitas" name="kapasitas" placeholder="Masukan kapasitas"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="harga" style="display: block; margin-bottom: 5px; font-weight: 600;">Harga</label>
            <input type="text" id="harga" name="harga" placeholder="Masukan harga"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div style="margin-bottom: 15px;">
            <label for="image_url" style="display: block; margin-bottom: 5px; font-weight: 600;">Image Url</label>
            <input type="text" id="image_url" name="image_url" placeholder="Masukan link gambar"
                style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
        </div>
        <div class="flex" style="text-align: center; justify-content: center; gap: 20px;">
            <a href="<?= BASEURL ?>/mobil/index"
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