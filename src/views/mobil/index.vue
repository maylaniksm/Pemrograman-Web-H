<script setup>

//import ref and onMounted
import { ref, onMounted } from 'vue';

//import api
import api from '../../api';

//define state
const mobil = ref([]);

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

    //call method "fetchDatamobil"
    fetchDatamobil();
});

//method deletemobil
const deleteMobil = async (id) => {

    //delete Mobil with API
    await api.delete(`/api/mobil/${id}`)
        .then(() => {

            //call method "fetchDatamobil"
            fetchDatamobil();
        })

};

</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'mobil.create' }"
                    class="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW MOBIL</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">Merk</th>
                                    <th scope="col">Nomor Polisi</th>
                                    <th scope="col">Warna</th>
                                    <th scope="col">Transmisi</th>
                                    <th scope="col">Kapasitas</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="mobil.length == 0">
                                    <td colspan="8" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(mobil, index) in mobil" :key="index">

                                    <td>{{ mobil.merek }}</td>
                                    <td>{{ mobil.nomor_polisi }}</td>
                                    <td>{{ mobil.warna }}</td>
                                    <td>{{ mobil.transmisi }}</td>
                                    <td>{{ mobil.kapasitas }}</td>
                                    <td>{{ mobil.harga }}</td>
                                    <td class="text-center">
                                        <img :src="mobil.image_url" width="200" class="rounded-3" />
                                    </td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'mobil.edit', params: { id: mobil.id } }"
                                            class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button @click.prevent="deleteMobil(mobil.id)"
                                            class="btn btn-sm btn-danger rounded-sm shadow border-0">DELETE</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>