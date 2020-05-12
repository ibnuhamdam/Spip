<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_form_14_model extends CI_Model
{
    private $table = 'detail_form_14';
    private $order = 'DESC';
    public $id_form_14;
    public $id_pernyataan;
    public $pengendalian;
    public $perbaikan_pengendalian;
    public $dpk;
    public $waktu;

    // Mendapatkan detail form 14
    public function get_detail($id_form_8)
    {
        $this->db->order_by('detail_form_8.id_pernyataan', $this->order);
        $this->db->join('detail_form_8', $this->table . '.id_pernyataan=detail_form_8.id_pernyataan', 'right');
        return $this->db->get($this->table)->result();
    }

    // Mendapatkan data berdasarkan id pernyataan
    public function find($id_pernyataan)
    {
        $this->db->join('detail_form_8', $this->table . '.id_pernyataan=detail_form_8.id_pernyataan');
        return $this->db->get_where($this->table, [$this->table . '.id_pernyataan' => $id_pernyataan])->row();
    }

    // Menambah data
    public function save($post, $id_form_14 = NULL, $id_pernyataan = NULL)
    {
        $this->id_form_14 = $id_form_14;
        $this->id_pernyataan = $id_pernyataan;
        $this->pengendalian = $post['pengendalian'];
        $this->perbaikan_pengendalian = $post['perbaikan_pengendalian'];
        $this->dpk = json_encode($post['dpk']);
        $this->waktu = $post['waktu'];
        $this->db->insert($this->table, $this);
    }

    // Mengubah data
    public function update($put, $id_form_14 = NULL, $id_pernyataan = NULL)
    {
        $this->id_form_14 = $id_form_14;
        $this->id_pernyataan = $id_pernyataan;
        $this->pengendalian = $put['pengendalian'];
        $this->perbaikan_pengendalian = $put['perbaikan_pengendalian'];
        $this->dpk = json_encode($put['dpk']);
        $this->waktu = $put['waktu'];
        $this->db->update($this->table, $this, ['id_pernyataan' => $id_pernyataan]);
    }

    public function rules()
    {
        return [
            [
                'field' => 'pengendalian',
                'label' => 'Pengendalian',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'perbaikan_pengendalian',
                'label' => 'Perbaikan Pengendalian',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'dpk[]',
                'label' => 'Detektif/Preventif/Korektif',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'waktu',
                'label' => 'Waktu',
                'rules' => 'trim|required'
            ],
        ];
    }
}
