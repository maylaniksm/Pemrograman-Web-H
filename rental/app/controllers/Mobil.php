<?php

class Mobil extends Controller
{

    public function __construct()
    {
        AuthHelper::redirectIfNotAuthenticated();
    }
    public function index()
    {
        $data['title'] = 'PrimeRide | Mobil';
        $data['is_mobil'] = true;

        $data['mobils'] = $this->model('ApiModel')->get('/mobil')['data'];

        $this->view('templates/sidebar', $data);
        $this->view('mobil/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $data['title'] = 'PrimeRide | Add mobil';
        $data['is_mobil'] = true;

        $this->view('templates/sidebar', $data);
        $this->view('mobil/add', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $result = $this->model('ApiModel')->post('/mobil', $_POST);
        header('Location: ' . BASEURL . '/mobil/index');
    }

    public function detail($id)
    {
        $data['title'] = 'PrimeRide | Mobil detail';
        $data['is_mobil'] = true;
        $result = $this->model('ApiModel')->get("/mobil/{$id}")['data'];
        $data['mobil'] = $result[0];

        $this->view('templates/sidebar', $data);
        $this->view('mobil/detail', $data);
        $this->view('templates/footer');
    }

    public function update()
    {
        $id = $_POST['id'];
        $result = $this->model('ApiModel')->put("/mobil/{$id}", $_POST);
        header('Location: ' . BASEURL . '/mobil/index');
    }

    public function delete($id)
    {
        $result = $this->model('ApiModel')->delete("/mobil/{$id}");
        header('Location: ' . BASEURL . '/mobil/index');
    }
}

?>