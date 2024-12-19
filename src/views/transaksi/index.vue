<script setup>

//import ref and onMounted
import { ref, onMounted } from 'vue';

//import api
import api from '../../api';

//define state
const transaksi = ref([]);
const mobil = ref([]);

//method fetchDatatransaksi
const fetchDatatransaksi = async () => {

    //fetch data 
    await api.get('/api/transaksi')

        .then(response => {

            //set response data to state "transaksi"
            transaksi.value = response.data.data.data
            console.log("isi", transaksi.value)

        });
}


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

// Fungsi untuk mendapatkan nama mobil berdasarkan mobil_id
const getMobilName = (mobil_id) => {
    const mobilItem = mobil.value.find(item => item.id === mobil_id);
    console.log("Isi", mobilItem.merek)
    return mobilItem ? mobilItem.merek : 'Unknown';
};

//run hook "onMounted"
onMounted(() => {

    //call method "fetchDatatransaksi"
    fetchDatatransaksi();
    fetchDatamobil()
});

//method deletetransaksi
const deleteTransaksi = async (id) => {

    //delete Transaksi with API
    await api.delete(`/api/transaksi/${id}`)
        .then(() => {

            //call method "fetchDatatransaksi"
            fetchDatatransaksi();
        })

};

</script>

<template>
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <router-link :to="{ name: 'transaksi.create' }"
                    class="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW TRANSAKSI</router-link>
                <div class="card border-0 rounded shadow">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Mobil</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Sewa Masuk</th>
                                    <th scope="col">Sewa Keluar</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-if="transaksi.length == 0">
                                    <td colspan="6" class="text-center">
                                        <div class="alert alert-danger mb-0">
                                            Data Belum Tersedia!
                                        </div>
                                    </td>
                                </tr>
                                <tr v-else v-for="(transaksi, index) in transaksi" :key="index">
                                    <td>{{ transaksi.name }}</td>
                                    <td>{{ getMobilName(transaksi.mobil_id) }}</td>
                                    <td>{{ transaksi.status }}</td>
                                    <td>{{ transaksi.sewa_masuk }}</td>
                                    <td>{{ transaksi.sewa_keluar }}</td>
                                    <td class="text-center">
                                        <router-link :to="{ name: 'transaksi.edit', params: { id: transaksi.id } }"
                                            class="btn btn-sm btn-primary rounded-sm shadow border-0 me-2">EDIT</router-link>
                                        <button @click.prevent="deleteTransaksi(transaksi.id)"
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
