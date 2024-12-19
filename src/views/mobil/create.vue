<script setup>
//import ref
import { ref } from "vue";

//import router
import { useRouter } from 'vue-router';

//import api
import api from "../../api";

//init router
const router = useRouter();

//define state
const merek = ref("");
const nomor_polisi = ref("");
const warna = ref("");
const transmisi = ref("");
const kapasitas = ref("");
const harga = ref("");
const image = ref("");
const errors = ref([]);

//method for handle file changes
const handleFileChange = (e) => {
    //assign file to state
    image.value = e.target.files[0];
};

//method "storeMobil"
const storeMobil = async () => {

    //init formData
    let formData = new FormData();

    //assign state value to formData
    formData.append("merek", merek.value);
    formData.append("nomor_polisi", nomor_polisi.value);
    formData.append("warna", warna.value);
    formData.append("transmisi", transmisi.value);
    formData.append("kapasitas", kapasitas.value);
    formData.append("harga", harga.value);
    formData.append("image", image.value);


    //store data with API
    await api.post('/api/mobil', formData)
        .then(() => {
            //redirect
            router.push({ path: "/mobil" });
        })
        .catch((error) => {
            //assign response error data to state "errors"
            errors.value = error.response.data;
        });
};
</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="storeMobil()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Merek</label>
                                <input type="text" class="form-control" v-model="merek">
                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                    <span>{{ errors.merek[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nomor Polisi</label>
                                <input type="text" class="form-control" v-model="nomor_polisi">
                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                    <span>{{ errors.nomor_polisi[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Warna</label>
                                <input type="text" class="form-control" v-model="warna">
                                <div v-if="errors.title" class="alert alert-danger mt-2">
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
                                <div v-if="errors.title" class="alert alert-danger mt-2">
                                    <span>{{ errors.kapasitas[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Harga</label>
                                <input type="text" class="form-control" v-model="harga">
                                <div v-if="errors.title" class="alert alert-danger mt-2">
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
                                class="btn btn-md btn-primary rounded-sm shadow border-0">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>