<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_8_model extends CI_Model
{
    private $table = 'form_8';
    private $order = 'DESC';
    private $primary_key = 'id_form_8';
    public $id_form_8;
    public $id_ppk = NULL;
    public $status = 0;
    public $is_done = 0;
    /*
    is_done = 0 : belum selesai
    is_done = 1 : selesai
    status = 0 : belum verifikasi
    status = 1 : verifikasi
    status = 2 : tidak disetujui
    */

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
            $this->db->where($this->table . '.id_ppk', $id_ppk);
        }
        $this->db->select($this->table . '.date_created, nama_ppk, is_done, status, id_form_8');
        $this->db->join('ppk', $this->table . '.id_ppk=ppk.id_ppk');
        // $this->db->order_by($this->primary_key, $this->order);
        $this->db->limit($limit, $start);
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

    // Mengecek apakah tahun ini sudah isi data
    public function get_this_year()
    {
        return $this->db->get_where($this->table, ['id_ppk' => $this->dpm->get_id_ppk(), 'YEAR(date_created)' => date('Y')])->row();
    }

    // Menambah data
    public function save($id_ppk)
    {
        $this->id_form_8 = $this->get_id_form_8();
        $this->id_ppk = $id_ppk;
        $this->db->insert($this->table, $this);
    }

    // Mengubah status menjadi selesai
    public function done($put, $id)
    {
        $this->id_form_8 = $id;
        $this->id_ppk = $put->id_ppk;
        $this->is_done = 1;
        $this->db->update($this->table, $this, [$this->primary_key => $id]);
    }

    // Generate id_form_8
    public function get_id_form_8()
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
        return 'F8' . date('dmy') . $kd;
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
