<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {

    public function verify_user($username, $password) {
        $query = $this->db->get_where('users', ['username' => $username]);
        $user = $query->row();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }


    public function get_all_users() {
        return $this->db->get('users')->result();
    }

    public function get_user($id) {
        return $this->db->get_where('users', ['id' => $id])->row();
    }
}
