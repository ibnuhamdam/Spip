<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    private $table = 'user';

    // get user by email
    public function get_user($email)
    {
        $this->db->select('email, password, id_user, role');
        $this->db->join('role', 'role.id_role=' . $this->table . '.id_role');
        return $this->db->get_where($this->table, ['email' => $email])->row();
    }
}
