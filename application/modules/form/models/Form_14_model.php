<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_14_model extends CI_Model
{
    private $table = 'form_14';
    private $order = 'ASC';
    private $primary_key = 'id_form_14';
    public $id_form_14;
    public $id_form_8;
    public $is_done = 0;
    public $status = 0;

    // Total Baris
    public function total_rows($q = NULL)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data per halaman
    public function get_limit_data($limit, $start = 0, $q = NULL, $role = '')
    {
        $id_ppk = $this->dpm->get_id_ppk();
        if ($id_ppk && $role == 'PPK') {
            $this->db->where('form_8.id_ppk', $id_ppk);
        }
        $this->db->order_by($this->primary_key, $this->order);
        $this->db->limit($limit, $start);
        $this->db->join('form_8', $this->table . '.id_form_8=form_8.id_form_8');
        $this->db->join('ppk', 'ppk.id_ppk=form_8.id_ppk');
        return $this->db->get($this->table)->result();
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

    // Mendapatkan data berdasarkan id_form_8
    public function get_form_8($id_form_8)
    {
        return $this->db->get_where($this->table, ['id_form_8' => $id_form_8])->row();
    }

    // Menambah data
    public function save($id_form_8)
    {
        $this->id_form_14 = $this->get_id_form_14();
        $this->id_form_8 = $id_form_8;
        $this->db->insert($this->table, $this);
    }

    // Mengubah data
    public function update($put, $id)
    {
        $this->nama_ppk = $put['nama_ppk'];
        $this->deskripsi = $put['deskripsi'];
        $this->db->update($this->table, $this, [$this->primary_key => $id]);
    }

    // Mengubah status menjadi selesai
    public function done($id_form_14)
    {
        $this->db->update($this->table, ['is_done' => 1], [$this->primary_key => $id_form_14]);
    }

    // Generate id_form_14
    public function get_id_form_14()
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
        return 'F14' . date('dmy') . $kd;
    }

    public function rules()
    {
        return [
            [
                'field' => 'nama_ppk',
                'label' => 'Nama PPK',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'deskripsi',
                'label' => 'Deskripsi',
                'rules' => 'trim|required'
            ]
        ];
    }
}
