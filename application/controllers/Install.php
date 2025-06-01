<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Install extends CI_Controller {

    public function index() {
        $sql = file_get_contents(FCPATH . 'database/seed.sql');

        $this->load->database();

        foreach (explode(";", $sql) as $query) {
            $query = trim($query);
            if (!empty($query)) {
                $this->db->query($query);
            }
        }

        echo "Database and sample data installed successfully!";
    }
}
