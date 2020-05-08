<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Role extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('role_model', 'rm');
        $this->load->module('template');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start', TRUE));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'role/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'role/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'role/index';
            $config['first_url'] = base_url() . 'role/index';
        }
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->rm->total_rows($q);
        $role = $this->rm->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('user/role/index', ['role_data' => $role, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1]);
    }
}
