<?php

class UserPage extends Controller
{
    public function index()
    {
        // var_dump("hmmm");
        $data['mobils'] = $this->model('ApiModel')->get('/mobil')['data'];
        $this->view('userpage/index', $data);
    }
    
    public function detail($id)
    {
        $data['mobil'] = $this->model('ApiModel')->get("/mobil/{$id}")['data'][0];
        $data['transaksis'] = $this->model('ApiModel')->get("/transaksiByMobil/{$id}")['data'];
        $this->view('userpage/detail', $data);
        // var_dump($data['transaksi']);
    }
}