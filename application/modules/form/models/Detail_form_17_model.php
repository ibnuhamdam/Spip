<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_form_17_model extends CI_Model
{
    private $table = 'detail_form_17';
    private $order = 'DESC';
    public $id_form_17;
    public $id_pernyataan;
    public $existing_infokom;
    public $perbaikan_informasi;
    public $perbaikan_komunikasi;

    // Mendapatkan detail form 14
    public function get_detail($id_form_8)
    {
        $this->db->order_by('detail_form_8.id_pernyataan', $this->order);
        $this->db->join('detail_form_8', $this->table . '.id_pernyataan=detail_form_8.id_pernyataan', 'right');
        return $this->db->get_where($this->table, ['detail_form_8.id_form_8' => $id_form_8])->result();
    }

    // Mendapatkan data berdasarkan id pernyataan
    public function find($id_pernyataan)
    {
        $this->db->join('detail_form_8', $this->table . '.id_pernyataan=detail_form_8.id_pernyataan');
        $this->db->join('detail_form_14', $this->table . '.id_pernyataan=detail_form_14.id_pernyataan');
        return $this->db->get_where($this->table, [$this->table . '.id_pernyataan' => $id_pernyataan])->row();
    }

    // Menambah data
    public function save($post, $id_form_17 = NULL, $id_pernyataan = NULL)
    {
        $this->id_form_17 = $id_form_17;
        $this->id_pernyataan = $id_pernyataan;
        $this->existing_infokom = $post['existing_infokom'];
        $this->perbaikan_informasi = $post['perbaikan_informasi'];
        $this->perbaikan_komunikasi = $post['perbaikan_komunikasi'];
        $this->db->insert($this->table, $this);
    }

    // Ubah data
    public function update($put, $id_form_17 = NULL, $id_pernyataan = NULL)
    {
        $this->id_form_17 = $id_form_17;
        $this->id_pernyataan = $id_pernyataan;
        $this->existing_infokom = $put['existing_infokom'];
        $this->perbaikan_informasi = $put['perbaikan_informasi'];
        $this->perbaikan_komunikasi = $put['perbaikan_komunikasi'];
        $this->db->update($this->table, $this, ['id_pernyataan' => $id_pernyataan]);
    }

    public function rules()
    {
        return [
            [
                'field' => 'existing_infokom',
                'label' => 'Existing Infokom',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'perbaikan_informasi',
                'label' => 'Perbaikan Informasi',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'perbaikan_komunikasi',
                'label' => 'Perbaikan Komunikasi',
                'rules' => 'trim|required'
            ],
        ];
    }
}
