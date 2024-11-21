<?php

class Transaksi extends Controller
{
    public function __construct()
    {
        AuthHelper::redirectIfNotAuthenticated();
    }
    
    public function index()
    {
        $data['title'] = 'PrimeRide | Transaksi';
        $data['is_transaksi'] = true;
        
        $data['transaksis'] = $this->model('ApiModel')->get('/transaksi')['data'];
        // var_dump($data['transaksis'][0]);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }
    
    public function add()
    {
        $data['title'] = 'PrimeRide | Transaksi add';
        $data['is_transaksi'] = true;

        $data['mobils'] = $this->model('ApiModel')->get('/mobil')['data'];
        // var_dump($data['mobils']);
        $this->view('templates/sidebar', $data);
        $this->view('transaksi/add', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $_POST['status'] = 'proses';
        $result = $this->model('ApiModel')->post("/transaksi", $_POST);
        // var_dump($_POST, $result);
        header('Location: ' . BASEURL . '/transaksi/index');
    }

    public function detail($id)
    {
        $data['title'] = 'PrimeRide | Transaksi detail';
        $data['is_transaksi'] = true;
        $result = $this->model('ApiModel')->get("/transaksi/{$id}")['data'];
        $data['transaksi'] = $result[0];
        $data['mobils'] = $this->model('ApiModel')->get('/mobil')['data'];
        // var_dump($data['mobils'][1]['id']);
        // var_dump($data['transaksi']['id_mobil']);

        $this->view('templates/sidebar', $data);
        $this->view('transaksi/detail', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $id = $_POST['id'];
        $this->model('ApiModel')->put("/transaksi/{$id}", $_POST);
        header('Location: ' . BASEURL . '/transaksi/index');
    }

    public function delete($id)
    {
        $result = $this->model('ApiModel')->delete("/transaksi/{$id}", $_POST);
        header('Location: ' . BASEURL . '/transaksi/index');
    }
}

?>
