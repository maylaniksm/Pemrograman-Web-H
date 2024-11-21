<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        AuthHelper::redirectIfNotAuthenticated();
    }
    public function index()
    {
        $data['title'] = 'PrimeRide | Dashboard';
        $data['is_dashboard'] = true;

        $data['total_transaksi'] = $this->model('ApiModel')->get('/getTotalTransaksi')['data']['total_transaksi'];
        $totalStatus = $this->model('ApiModel')->get('/getTotalStatus')['data'];
        
        $data['total_selesai'] = $totalStatus['total_selesai'];
        $data['total_proses'] = $totalStatus['total_proses'];
        // var_dump($totalStatus);

        $this->view('templates/sidebar', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }
}

?>
