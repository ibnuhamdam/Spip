<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Skor_form_11_model extends CI_Model
{
    private $table = 'skor_form_11';
    private $order = 'DESC';
    public $id_pernyataan;
    public $id_user;
    public $skor_risiko;
    public $skor_dampak;

    function __construct()
    {
        $this->id_user = $this->session->userdata('id_user');
    }

    // Menampilkan skor berdasarkan id_form_8
    public function get_skor($id_form_8, $role = '')
    {
        $this->db->select($this->table . '.id_pernyataan, pernyataan_risiko, dampak, skor_risiko, skor_dampak');
        if ($role == 'UKI') {
            $this->db->where('id_user', $this->id_user);
        }
        $this->db->where('id_form_8', $id_form_8);
        $this->db->order_by('detail_form_8.id_pernyataan', $this->order);
        $this->db->join($this->table, $this->table . '.id_pernyataan=detail_form_8.id_pernyataan', 'left');
        $this->db->join('tahap_kegiatan', 'detail_form_8.id_tahap_kegiatan=tahap_kegiatan.id_tahap_kegiatan');
        return $this->db->get('detail_form_8');
    }

    // Menghitung responden
    public function get_responden($id_pernyataan)
    {
        $this->db->select('id_user');
        $this->db->from($this->table);
        $this->db->where('id_pernyataan', $id_pernyataan);
        return $this->db->count_all_results();
    }

    // Mencari id_user di skor_form_11
    public function get_user($id_form_8)
    {
        $this->db->join($this->table, $this->table . '.id_pernyataan=detail_form_8.id_pernyataan');
        return $this->db->get_where('detail_form_8', ['id_form_8' => $id_form_8, 'id_user' => $this->id_user])->result();
    }

    // Mendapatkan data berdasarkan id
    public function find($id_pernyataan)
    {
        $this->db->join('detail_form_8', $this->table . '.id_pernyataan=detail_form_8.id_pernyataan');
        return $this->db->get_where($this->table, ['id_user' => $this->id_user, $this->table . '.id_pernyataan' => $id_pernyataan])->row();
    }

    // Menyimpan data
    public function save($post)
    {
        $this->db->insert_batch($this->table, $post);
    }

    // Mengubah data
    public function update($id_pernyataan, $put)
    {
        $this->id_pernyataan = $id_pernyataan;
        $this->skor_risiko = $put['risiko'];
        $this->skor_dampak = $put['dampak'];
        $this->db->update($this->table, $this, ['id_pernyataan' => $id_pernyataan, 'id_user' => $this->id_user]);
    }

    public function rules($detail_data = NULL)
    {
        if ($detail_data) {
            foreach ($detail_data as $detail) {
                $rule[] = [
                    'field' => $detail->id_pernyataan . '[risiko]',
                    'label' => 'Skor Risiko',
                    'rules' => 'trim|required|less_than_equal_to[4]'
                ];
                $rule[] = [
                    'field' => $detail->id_pernyataan . '[dampak]',
                    'label' => 'Skor Dampak',
                    'rules' => 'trim|required|less_than_equal_to[4]'
                ];
            }
        } else {
            $rule = [
                [
                    'field' => 'risiko',
                    'label' => 'Skor Risiko',
                    'rules' => 'trim|required|less_than_equal_to[4]'
                ],
                [
                    'field' => 'dampak',
                    'label' => 'Skor Dampak',
                    'rules' => 'trim|required|less_than_equal_to[4]'
                ]
            ];
        }
        return $rule;
    }

    // Menghitung skor dan hanya mengeluarkan nilai
    public function get_skors($id_form_8, $role = '')
    {
        $this->db->select($this->table . '.id_pernyataan, skor_risiko, skor_dampak');
        if ($role == 'UKI') {
            $this->db->where('id_user', $this->id_user);
        }
        $this->db->where('id_form_8', $id_form_8);
        $this->db->order_by('detail_form_8.id_pernyataan', $this->order);
        $this->db->join($this->table, $this->table . '.id_pernyataan=detail_form_8.id_pernyataan', 'left');
        $this->db->join('tahap_kegiatan', 'detail_form_8.id_tahap_kegiatan=tahap_kegiatan.id_tahap_kegiatan');
        return $this->db->get('detail_form_8');
    }

    public function get_skors22($id_form_8, $role = '')
    {
        // $this->db->select('detail_form_22'. '.id_pernyataan, skor_risiko, skor_dampak, pernyataan_risiko, pemilik_risiko, ');
        if ($role == 'UKI') {
            $this->db->where('id_user', $this->id_user);
        }
        $this->db->where('id_form_22', $id_form_8);
        $this->db->order_by('detail_form_22.id_pernyataan', $this->order);
        $this->db->join($this->table, $this->table . '.id_pernyataan=detail_form_22.id_pernyataan', 'left');
        $this->db->join('detail_form_17', 'detail_form_22.id_pernyataan=detail_form_17.id_pernyataan');
        $this->db->join('detail_form_14', 'detail_form_22.id_pernyataan=detail_form_14.id_pernyataan');
        $this->db->join('detail_form_8', 'detail_form_22.id_pernyataan=detail_form_8.id_pernyataan');
        return $this->db->get('detail_form_22');
    }
}
