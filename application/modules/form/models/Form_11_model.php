<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_11_model extends CI_Model
{
    private $table = 'form_11';
    private $order = 'DESC';
    private $primary_key = 'id_form_11';
    public $id_form_11;
    public $id_form_8;

    // Total Baris
    public function total_rows($q = NULL)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data per halaman
    public function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->select('form_8.date_created, nama_ppk, is_done, status, id_form_8');
        $this->db->join('ppk', 'form_8.id_ppk=ppk.id_ppk');
        $this->db->where('is_done', 1);
        $this->db->limit($limit, $start);

        return $this->db->get('form_8')->result();
    }

    // Mendapatkan semua data
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Menampilkan data berdasarkan id
    public function find($id)
    {
        return $this->db->get_where($this->table, [$this->primary_key => $id])->row();
    }

    // Menambah data
    public function save($id_form_8)
    {
        $this->id_form_11 = $this->get_id_form_11();
        $this->id_form_8 = $id_form_8;
        $this->db->insert($this->table, $this);
    }

    // Generate id_form_11
    public function get_id_form_11()
    {
        $this->db->select_max('RIGHT(' . $this->primary_key . ', 4)', 'kd_max');
        $this->db->from($this->table);
        $this->db->where('DATE(date_created) = CURDATE()');
        $q = $this->db->get();
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        date_default_timezone_set('Asia/Jakarta');
        return 'F11' . date('dmy') . $kd;
    }
}
