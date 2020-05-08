<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_ppk_model extends CI_Model
{
    private $table = 'detail_ppk';
    public $id_ppk;
    public $id_user;

    // Mendapatkan data user berdasarkan id_ppk
    public function find($id_ppk)
    {
        $this->db->join('user', $this->table . '.id_user=user.id_user');
        return $this->db->get_where($this->table, ['id_ppk' => $id_ppk])->result();
    }

    // Mendapatkan data user berdasarkan id_ppk dan id_user
    public function find_by_id($id_ppk, $id_user)
    {
        return $this->db->get_where($this->table, ['id_ppk' => $id_ppk, 'id_user' => $id_user])->row();
    }

    // Menambah data
    public function save($post)
    {
        $this->id_ppk = $post['id_ppk'];
        $this->id_user = $post['id_user'];
        $this->db->insert($this->table, $this);
    }

    // Menghapus data
    public function delete($delete)
    {
        $this->db->where('id_ppk', $delete['id_ppk']);
        $this->db->where('id_user', $delete['id_user']);
        $this->db->delete($this->table);
    }

    // Mengambil id_ppk
    public function get_id_ppk()
    {
        $detail_ppk = $this->db->get_where($this->table, ['id_user' => $this->session->userdata('id_user')])->row();
        if ($detail_ppk) {
            return $detail_ppk->id_ppk;
        } else {
            return NULL;
        }
    }

    public function rules()
    {
        return [
            [
                'field' => 'id_ppk',
                'label' => 'PPK',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'id_user',
                'label' => 'User',
                'rules' => 'trim|required'
            ]
        ];
    }
}
