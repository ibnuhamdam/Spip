<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    public function get_total_user()
    {
        return $this->db->count_all('user');
    }

    public function get_total_ppk()
    {
        return $this->db->count_all('ppk');
    }
    
    public function get_total_form_8()
    {
        return $this->db->count_all('form_8');
    }

    public function get_total_form_11()
    {
        return $this->db->count_all('form_11');
    }

    public function get_total_form_14()
    {
        return $this->db->count_all('form_14');
    }

    public function get_total_form_17()
    {
        return $this->db->count_all('form_17');
    }

    public function get_total_form_22()
    {
        return $this->db->count_all('form_22');
    }

}
