<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Task');
    }

    public function overdue_tasks() {
        $assigned_to = $this->input->get('assigned_to'); // optional

        $filter = [
            'due_date <' => date('Y-m-d'),
            'status !=' => 'completed'
        ];

        if ($assigned_to) {
            $filter['assigned_to'] = $assigned_to;
        }

        $tasks = $this->Task->get_all($filter);

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($tasks));
    }
}
