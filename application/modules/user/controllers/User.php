<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model', 'um');
        $this->load->model('role_model', 'rm');
        $this->load->module('template');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->load->module('auth');
        $this->auth->is_login();
    }

    public function index()
    {
        $this->mybreadcrumb->add('User', site_url('user'));
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start', TRUE));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'user/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'user/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'user/index';
            $config['first_url'] = base_url() . 'user/index';
        }
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->um->total_rows($q);
        $user = $this->um->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('user/index', ['user_data' => $user, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1], '', $this->mybreadcrumb->render());
        
    }

    public function create()
    {
        $this->mybreadcrumb->add('User', site_url('user'));
        $this->mybreadcrumb->add('Add new', site_url('user/create'));
        $this->form_validation->set_rules($this->um->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('user/create', ['role_data' => $this->rm->get_all()], '', $this->mybreadcrumb->render());
        } else {
            $this->um->save($this->input->post(NULL, TRUE));
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
            redirect('user');
        }
        
    }

    public function on()
    {
        $id_user = $this->input->post('id_user');
        $user = $this->um->find($id_user);
        if ($user) {
            $this->um->on($id_user);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Diaktifkan!']);
            redirect('user');
        }
    }

    public function off()
    {
        $id_user = $this->input->post('id_user');
        $user = $this->um->find($id_user);
        if ($user) {
            $this->um->off($id_user);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Di Nonaktifkan!']);
            redirect('user');
        }
    }

    public function profile()
    {
        $this->template->load('user/profile');
    }
}
