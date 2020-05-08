<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PPK_model extends CI_Model
{
    private $table = 'ppk';
    private $order = 'DESC';
    private $primary_key = 'id_ppk';
    public $nama_ppk;
    public $deskripsi;

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
    public function save($post)
    {
        $this->nama_ppk = $post['nama_ppk'];
        $this->deskripsi = $post['deskripsi'];
        $this->db->insert($this->table, $this);
    }

    // Mengubah data
    public function update($put, $id)
    {
        $this->nama_ppk = $put['nama_ppk'];
        $this->deskripsi = $put['deskripsi'];
        $this->db->update($this->table, $this, [$this->primary_key => $id]);
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
