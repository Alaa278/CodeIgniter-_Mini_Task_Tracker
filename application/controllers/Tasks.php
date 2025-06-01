<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tasks extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('auth/login');
        }

        $this->load->model('Task');
        $this->load->model('User');
    }

    public function index()
    {
        $this->load->library('pagination');

        $filter = [];

        if ($this->input->get('status')) {
            $filter['status'] = $this->input->get('status');
        }

        if ($this->session->userdata('role') != 'admin') {
            $filter['assigned_to'] = $this->session->userdata('user_id');
        }

        $config['base_url'] = site_url('tasks/index');
        $config['total_rows'] = $this->Task->count_all($filter);
        $config['per_page'] = 5;
        $config['reuse_query_string'] = TRUE;
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];


        $this->pagination->initialize($config);

        $offset = $this->uri->segment(3, 0);
        $data['tasks'] = $this->Task->get_all($filter, $config['per_page'], $offset);
        $data['status_filter'] = $this->input->get('status');
        $data['pagination_links'] = $this->pagination->create_links();

        $this->load->view('tasks/index', $data);
    }


    public function create()
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');

        if ($this->form_validation->run()) {
            $task = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'assigned_to' => $this->input->post('assigned_to'),
                'due_date' => $this->input->post('due_date'),
                'status' => $this->input->post('status')
            ];
            $this->Task->insert($task);
            redirect('tasks');
        }

        $data['users'] = $this->User->get_all_users();
        $this->load->view('tasks/create', $data);
    }

    public function edit($id)
    {
        $task = $this->Task->get($id);

        if (!$task) show_404();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');

        if ($this->form_validation->run()) {
            $updated = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'assigned_to' => $this->input->post('assigned_to'),
                'due_date' => $this->input->post('due_date'),
                'status' => $this->input->post('status')
            ];
            $this->Task->update($id, $updated);
            redirect('tasks');
        }

        $data['task'] = $task;
        $data['users'] = $this->User->get_all_users();
        $this->load->view('tasks/edit', $data);
    }

    public function show($id)
    {
        $task = $this->Task->get_with_user($id);
        if (!$task) show_404();

        $data['task'] = $task;
        $this->load->view('tasks/show', $data);
    }


    public function delete($id)
    {
        $this->Task->delete($id);
        redirect('tasks');
    }

    
}
