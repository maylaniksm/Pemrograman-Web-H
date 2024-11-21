<?php

class AuthController extends Controller
{
    private $apiModel;

    public function index()
    {

        $this->login();
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $data = [
                'username' => $username,
                'password' => $password
            ];

            $result = $this->model('ApiModel')->post('/login', $data);

            if ($result['code'] === 200) {
                $_SESSION['user'] = $result['data'];
                header('Location: ' . BASEURL . '/dashboard');
                exit;
            } else {
                $this->view('auth/login', ['error' => $result['message']]);
            }
        } else {
            if (!isset($_SESSION['user'])) {
                $this->view('auth/login');
            } else {
                header('Location: ' . BASEURL . '/dashboard');
                exit;
            }
        }
    }

    public function logout()
    {
        $result = $this->model('ApiModel')->post('/logout');
        session_destroy();
        // var_dump($_SESSION['user']);
        header('Location: ' . BASEURL . '/authcontroller/login');
    }
}
