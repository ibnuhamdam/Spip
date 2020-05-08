<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends CI_Model
{
    private $table = 'role';
    private $order = 'DESC';
    private $primary_key = 'id_role';
    public $role;

    // Mendapatkan semua data
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Total Baris
    public function total_rows($q = NULL)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data per halaman
    public function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->primary_key, $this->order);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }
}
