<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }
    public function index()
    {
        redirect('auth/login');
    }
    public function login()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run()) {
                $username = $this->input->post('username');
                $password = $this->input->post('password');
                $user = $this->User->verify_user($username, $password);

                if ($user) {
                    $this->session->set_userdata([
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'role' => $user->role,
                        'logged_in' => TRUE
                    ]);

                    if ($user->role == 'admin') {
                        redirect('dashboard');
                    } else {
                        redirect('tasks');
                    }
                } else {
                    $data['error'] = "Invalid username or password.";
                }
            }
        }

        $this->load->view('auth/login', isset($data) ? $data : []);
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
