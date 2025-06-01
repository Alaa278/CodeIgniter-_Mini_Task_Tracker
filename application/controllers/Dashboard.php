<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();

        if (!$this->session->userdata('logged_in') || $this->session->userdata('role') != 'admin') {
            redirect('auth/login');
        }

        $this->load->model('Task');
        $this->load->model('User');
    }

    public function index() {
        $data['total_tasks']     = $this->Task->count_all();
        $data['completed_tasks'] = $this->Task->count_by_status('completed');
        $data['overdue_tasks']   = $this->Task->count_overdue();
        $data['users']           = $this->User->get_all_users();

        $this->load->view('dashboard/index', $data);
    }
}
