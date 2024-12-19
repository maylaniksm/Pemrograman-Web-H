<script setup>
//import ref
import { ref, onMounted } from "vue";

//import router
import { useRouter, useRoute } from 'vue-router';

//import api
import api from "../../api";

//init router
const router = useRouter();

//init route
const route = useRoute();

// State
const merek = ref("");
const nomor_polisi = ref("");
const warna = ref("");
const transmisi = ref("");
const kapasitas = ref("");
const harga = ref("");
const image = ref("");
const errors = ref([]);

// Fetch data mobil berdasarkan ID
onMounted(async () => {
    await api.get(`/api/mobil/${route.params.id}`).then(response => {
        const data = response.data.data;
        merek.value = data.merek;
        nomor_polisi.value = data.nomor_polisi;
        warna.value = data.warna;
        transmisi.value = data.transmisi;
        kapasitas.value = data.kapasitas;
        harga.value = data.harga;
    });
});

// Menangani perubahan file gambar
const handleFileChange = (e) => {
    image.value = e.target.files[0];
};

// Update data mobil
const updateMobil = async () => {
    let formData = new FormData();
    formData.append("merek", merek.value);
    formData.append("nomor_polisi", nomor_polisi.value);
    formData.append("warna", warna.value);
    formData.append("transmisi", transmisi.value);
    formData.append("kapasitas", kapasitas.value);
    formData.append("harga", harga.value);

    // Menambahkan gambar ke FormData jika ada file yang dipilih
    if (image.value) {
        formData.append("image", image.value);
    }

    formData.append("_method", "PATCH"); // Menambahkan metode PATCH dalam formData

    // Mengirimkan request PATCH ke server
    try {
        await api.post(`/api/mobil/${route.params.id}`, formData);
        router.push({ path: "/mobil" }); // Redirect setelah berhasil
    } catch (error) {
        console.error(error.response.data);
        errors.value = error.response.data.errors || [];
    }
};
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="updateMobil()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Merek</label>
                                <input type="text" class="form-control" v-model="merek">
                                <div v-if="errors.merek" class="alert alert-danger mt-2">
                                    <span>{{ errors.merek[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor Polisi</label>
                                <input type="text" class="form-control" v-model="nomor_polisi">
                                <div v-if="errors.nomor_polisi" class="alert alert-danger mt-2">
                                    <span>{{ errors.nomor_polisi[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Warna</label>
                                <input type="text" class="form-control" v-model="warna">
                                <div v-if="errors.warna" class="alert alert-danger mt-2">
                                    <span>{{ errors.warna[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Transmisi</label>
                                <select class="form-control" v-model="transmisi">
                                    <option value="Manual">Manual</option>
                                    <option value="Matic">Matic</option>
                                </select>
                                <div v-if="errors.transmisi" class="alert alert-danger mt-2">
                                    <span>{{ errors.transmisi[0] }}</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Kapasitas</label>
                                <input type="text" class="form-control" v-model="kapasitas">
                                <div v-if="errors.kapasitas" class="alert alert-danger mt-2">
                                    <span>{{ errors.kapasitas[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Harga</label>
                                <input type="text" class="form-control" v-model="harga">
                                <div v-if="errors.harga" class="alert alert-danger mt-2">
                                    <span>{{ errors.harga[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Image</label>
                                <input type="file" class="form-control" @change="handleFileChange($event)">
                                <div v-if="errors.image" class="alert alert-danger mt-2">
                                    <span>{{ errors.image[0] }}</span>
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-md btn-primary rounded-sm shadow border-0">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>