<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_form_8_model extends CI_Model
{
    private $table = 'detail_form_8';
    private $order = 'DESC';
    private $primary_key = 'id_pernyataan';
    public $id_pernyataan;
    public $id_tahap_kegiatan;
    public $id_form_8;
    public $pernyataan_risiko;
    public $penyebab;
    public $sumber;
    public $dampak;
    public $pemilik_risiko;

    // Menampilkan data berdasarkan id_form_8
    public function get_detail($id_form_8)
    {
        $this->db->order_by($this->table . '.' . $this->primary_key, $this->order);
        //$this->db->join('skor_form_11', $this->table . '.id_pernyataan=skor_form_11.id_pernyataan', 'left');
        $this->db->join('tahap_kegiatan', $this->table . '.id_tahap_kegiatan=tahap_kegiatan.id_tahap_kegiatan');
        return $this->db->get_where($this->table, ['id_form_8' => $id_form_8])->result();
    }

    // Menampilkan data berdasarkan id
    public function find($id_pernyataan)
    {
        $this->db->join('tahap_kegiatan', $this->table . '.id_tahap_kegiatan=tahap_kegiatan.id_tahap_kegiatan');
        return $this->db->get_where($this->table, [$this->primary_key => $id_pernyataan])->row();
    }

    // Menyimpan data
    public function save($post, $id_form_8, $id_tahap_kegiatan)
    {
        $this->id_pernyataan = $this->get_id_pernyataan($id_form_8);
        $this->id_tahap_kegiatan = $id_tahap_kegiatan;
        $this->id_form_8 = $id_form_8;
        $this->pernyataan_risiko = $post['pernyataan_risiko'];
        $this->penyebab = $post['penyebab'];
        $this->sumber = json_encode($post['sumber']);
        $this->dampak = $post['dampak'];
        $this->pemilik_risiko = $post['pemilik_risiko'];
        $this->db->insert($this->table, $this);
    }

    // Menyimpan data
    public function update($post, $id_pernyataan, $id_form_8, $id_tahap_kegiatan)
    {
        $this->id_pernyataan = $id_pernyataan;
        $this->id_tahap_kegiatan = $id_tahap_kegiatan;
        $this->id_form_8 = $id_form_8;
        $this->pernyataan_risiko = $post['pernyataan_risiko'];
        $this->penyebab = $post['penyebab'];
        $this->sumber = json_encode($post['sumber']);
        $this->dampak = $post['dampak'];
        $this->pemilik_risiko = $post['pemilik_risiko'];
        $this->db->update($this->table, $this, [$this->primary_key => $id_pernyataan]);
    }

    // Generate id_pernyataan
    public function get_id_pernyataan($id_form_8)
    {
        $this->db->select_max('RIGHT(' . $this->primary_key . ', 3)', 'kd_max');
        $this->db->from($this->table);
        $this->db->where('id_form_8', $id_form_8);
        $q = $this->db->get();
        $kd = "";
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $k) {
                $tmp = ((int) $k->kd_max) + 1;
                $kd = sprintf("%03s", $tmp);
            }
        } else {
            $kd = "001";
        }
        return $id_form_8 . '-' . $kd;
    }

    public function rules()
    {
        return [
            [
                'field' => 'id_tahap_kegiatan',
                'label' => 'Tahap Kegiatan',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'pernyataan_risiko',
                'label' => 'Pernyataan Risiko',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'penyebab',
                'label' => 'Penyebab',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'sumber[]',
                'label' => 'Sumber',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'dampak',
                'label' => 'Dampak',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'pemilik_risiko',
                'label' => 'Pemilik Risiko',
                'rules' => 'trim|required'
            ],
        ];
    }
}
