<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Task extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_all($filter = [], $limit = null, $offset = null)
    {
        if (!empty($filter)) {
            $this->db->where($filter);
        }
        $this->db->select('tasks.*, users.username as assigned_user');
        $this->db->join('users', 'tasks.assigned_to = users.id', 'left');
        if ($limit !== null) {
            $this->db->limit($limit, $offset);
        }

        return $this->db->get('tasks')->result();
    }

    public function count_all($filter = [])
    {
        if (!empty($filter)) {
            $this->db->where($filter);
        }

        return $this->db->count_all_results('tasks');
    }
    // public function count_all()
    // {
    //     return $this->db->count_all('tasks');
    // }

    public function count_by_status($status)
    {
        return $this->db->where('status', $status)->count_all_results('tasks');
    }

    public function count_overdue()
    {
        $this->db->where('due_date <', date('Y-m-d'));
        $this->db->where('status !=', 'completed');
        return $this->db->count_all_results('tasks');
    }

    public function get_with_user($id)
    {
        $this->db->select('tasks.*, users.username as assigned_user');
        $this->db->from('tasks');
        $this->db->join('users', 'tasks.assigned_to = users.id', 'left');
        $this->db->where('tasks.id', $id);
        return $this->db->get()->row();
    }

    public function get($id)
    {
        return $this->db->get_where('tasks', ['id' => $id])->row();
    }

    public function insert($data)
    {
        $this->db->insert('tasks', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id)->update('tasks', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('tasks');
    }
}
