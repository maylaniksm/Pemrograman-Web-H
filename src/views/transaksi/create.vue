<script setup>
//import ref
import { ref, onMounted} from "vue";

//import router
import { useRouter } from 'vue-router';

//import api
import api from "../../api";

//init router
const router = useRouter();

//define state
const name = ref("");
const mobil_id = ref("");
const status = ref("");
const sewa_masuk = ref("");
const sewa_keluar = ref("");
const errors = ref([]);
const mobil = ref([]);

//method "storetransaksi"
const storeTransaksi = async () => {

    //init formData
    let formData = new FormData();

    //assign state value to formData
    formData.append("name", name.value);
    formData.append("mobil_id", mobil_id.value);
    formData.append("status", status.value);
    formData.append("sewa_masuk", sewa_masuk.value);
    formData.append("sewa_keluar", sewa_keluar.value);



    //store data with API
    await api.post('/api/transaksi', formData)
        .then(() => {
            //redirect
            router.push({ path: "/transaksi" });
        })
        .catch((error) => {
            //assign response error data to state "errors"
            errors.value = error.response.data;
        });
};

//method fetchDatamobil
const fetchDatamobil = async () => {

    //fetch data 
    await api.get('/api/mobil')

        .then(response => {
            //set response data to state "mobil"
            mobil.value = response.data.data.data
            console.log("isi", mobil.value)

        });
}

//run hook "onMounted"
onMounted(() => {
    fetchDatamobil()
});

</script>

<template>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <form @submit.prevent="storeTransaksi()">
                            <div class="mb-3">
                                <label class="form-label fw-bold">Nama</label>
                                <input type="text" class="form-control" v-model="name">
                                <div v-if="errors.name" class="alert alert-danger mt-2">
                                    <span>{{ errors.name[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Mobil</label>
                                <select class="form-control" v-model="mobil_id">
                                    <!-- Loop untuk membuat option dari data mobil -->
                                    <option v-for="item in mobil" :key="item.id" :value="item.id">
                                        {{ item.merek }}
                                    </option>
                                </select>
                                <!-- Validasi error jika ada -->
                                <div v-if="errors.status" class="alert alert-danger mt-2">
                                    <span>{{ errors.mobil_id[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Status</label>
                                <select class="form-control" v-model="status">
                                    <option value="proses">Proses</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                                <div v-if="errors.status" class="alert alert-danger mt-2">
                                    <span>{{ errors.status[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Sewa Masuk</label>
                                <input type="date" class="form-control" v-model="sewa_masuk">
                                <div v-if="errors.sewa_masuk" class="alert alert-danger mt-2">
                                    <span>{{ errors.sewa_masuk[0] }}</span>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Sewa Keluar</label>
                                <input type="date" class="form-control" v-model="sewa_keluar">
                                <div v-if="errors.sewa_keluar" class="alert alert-danger mt-2">
                                    <span>{{ errors.sewa_keluar[0] }}</span>
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