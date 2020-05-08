<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PPK extends MX_Controller
{
    private $title = 'PPK';

    function __construct()
    {
        parent::__construct();
        $this->load->model('user/user_model', 'um');
        $this->load->model('PPK_Model', 'ppkm');
        $this->load->model('detail_ppk_model', 'dpm');
        $this->load->module('template');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->load->module('auth');
        $this->auth->is_login();
    }

    public function index()
    {
        $this->mybreadcrumb->add('PPK', site_url('ppk'));
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start', TRUE));
        if ($q <> '') {
            $config['base_url'] = base_url() . 'ppk/index?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'ppk/index?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'ppk/index';
            $config['first_url'] = base_url() . 'ppk/index';
        }
        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->ppkm->total_rows($q);
        $ppk = $this->ppkm->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('ppk/index', ['ppk_data' => $ppk, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1], $this->title, $this->mybreadcrumb->render());
    }

    public function show($id_ppk)
    {
        $this->mybreadcrumb->add('PPK', site_url('ppk'));
        $this->mybreadcrumb->add('Detail PPK', site_url('ppk/show/' . $id_ppk));
        $ppk = $this->ppkm->find($id_ppk);
        if ($ppk) {
            $this->template->load('ppk/show', ['ppk' => $ppk, 'detail_data' => $this->dpm->find($id_ppk), 'no' => 1], $this->title, $this->mybreadcrumb->render());
        } else {
            show_404();
        }
    }

    public function create()
    {
        $this->mybreadcrumb->add('PPK', site_url('ppk'));
        $this->mybreadcrumb->add('Add new', site_url('ppk/create'));
        $this->form_validation->set_rules($this->ppkm->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('ppk/form', ['title' => 'tambah', 'nama_ppk' => '', 'deskripsi' => ''], $this->title, $this->mybreadcrumb->render());
        } else {
            $this->ppkm->save($this->input->post(NULL, TRUE));
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
            redirect('ppk');
        }
    }

    public function edit($id_ppk)
    {
        $ppk = $this->ppkm->find($id_ppk);
        $this->mybreadcrumb->add('PPK', site_url('ppk'));
        $this->mybreadcrumb->add('Edit', site_url('ppk/update/' . $id_ppk));
        if ($ppk) {
            $this->form_validation->set_rules($this->ppkm->rules());
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->template->load('ppk/form', ['title' => 'ubah', 'nama_ppk' => $ppk->nama_ppk, 'deskripsi' => $ppk->deskripsi], $this->title, $this->mybreadcrumb->render());
            } else {
                $this->ppkm->update($this->input->post(NULL, TRUE), $id_ppk);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil mengubah data!']);
                redirect('ppk');
            }
        } else {
            show_404();
        }
    }
}
