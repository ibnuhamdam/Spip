<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tahap_kegiatan_model extends CI_Model
{
    private $table = 'tahap_kegiatan';
    private $primary_key = 'id_tahap_kegiatan';
    public $tahap_kegiatan;

    // mendapatkan semua data
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Menyimpan data
    public function save($tahap_kegiatan)
    {
        $this->tahap_kegiatan = $tahap_kegiatan;
        $this->db->insert($this->table, $this);
        return $this->db->insert_id();
    }

    public function rules()
    {
        return [
            [
                'field' => 'tahap_kegiatan',
                'label' => 'Tahap Kegiatan',
                'rules' => 'trim|is_unique[' . $this->table . '.tahap_kegiatan]'
            ]
        ];
    }
}
