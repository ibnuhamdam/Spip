<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
    private $table = 'user';
    private $order = 'DESC';
    private $primary_key = 'id_user';
    public $id_role = NULL;
    public $email;
    public $is_active = 1;
    public $token = NULL;

    // Total Baris
    public function total_rows($q = NULL)
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data per halaman
    public function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->select('email, role, id_user, is_active');
        $this->db->order_by($this->primary_key, $this->order);
        $this->db->join('role', 'role.id_role=' . $this->table . '.id_role');
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // Mendapatkan semua data
    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    // Mendapatkan user yang belum masuk ke PPK
    public function get_available_ppk()
    {
        $this->db->join('role', $this->table . '.id_role=role.id_role');
        $this->db->where('id_user NOT IN (SELECT id_user FROM detail_ppk)');
        $this->db->where('role', 'PPK');
        // $this->db->get($this->table)->result();
        // var_dump($this->db->last_query());
        // die;
        return $this->db->get($this->table)->result();
    }

    // Mendapatkan user berdasarkan id user
    public function find($id_user)
    {
        return $this->db->get_where($this->table, ['id_user' => $id_user])->row();
    }

    // Menambah data
    public function save($post)
    {
        $this->email = $post['email'];
        $this->id_role = $post['id_role'];
        $this->password = password_hash('12345',PASSWORD_DEFAULT);
        $this->db->insert($this->table, $this);
    }

    // ON
    public function on($id_user)
    {
        $this->db->update($this->table, ['is_active' => 1], ['id_user' => $id_user]);
    }

    // OFF
    public function off($id_user)
    {
        $this->db->update($this->table, ['is_active' => 0], ['id_user' => $id_user]);
    }

    public function rules()
    {
        return [
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|is_unique[' . $this->table . '.email]'
            ]
        ];
    }
}
