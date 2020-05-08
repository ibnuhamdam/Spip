<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_8 extends MX_Controller
{
    private $title = 'Form 8';
    private $role;

    function __construct()
    {
        parent::__construct();
        $this->load->model('form_8_model', 'f8');
        $this->load->model('ppk/detail_ppk_model', 'dpm');
        $this->load->model('detail_form_8_model', 'df8');
        $this->load->model('tahap_kegiatan_model', 'tkm');
        $this->load->module('template');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->role = $this->session->userdata('role');
        $this->load->module('auth');
        $this->auth->is_login();
    }

    public function index($start = NULL, $q = NULL, $title = '')
    {
        $this->mybreadcrumb->add($title == '' ? $this->title : $title, site_url('form_8'));
        $q = urldecode($q);
        $start = intval($start);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'form_8/index/' . urlencode($q);
            $config['first_url'] = base_url() . 'form_8/index/' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'form_8/index';
            $config['first_url'] = base_url() . 'form_8';
        }
        $config['per_page'] = 10;
        $config['total_rows'] = $this->f8->total_rows($q);
        $form_8 = $this->f8->get_limit_data($config['per_page'], $start, $q, $this->role);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('form/form_8/index', ['form_8_data' => $form_8, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1, 'is_writed' => $this->f8->get_this_year(), 'role' => $this->role], $title == '' ? $this->title : $title, $this->mybreadcrumb->render());
    }

    public function show($id)
    {
        $this->load->model('form_14_model', 'f14');
        $this->mybreadcrumb->add('Form 8', site_url('form_8'));
        $this->mybreadcrumb->add('Detail Form 8', site_url('form_8/show/' . $id));
        $this->template->load('form/form_8/show', ['detail_data' => $this->df8->get_detail($id), 'no' => 1, 'id_form_8' => $id, 'role' => $this->role, 'is_done' => $this->f8->find($id)->is_done, 'form_14' => $this->f14->get_form_8($id)], $this->title, $this->mybreadcrumb->render());
    }

    private function _form()
    {
        $this->template->load('form/form_8/create', ['tahap_kegiatan_data' => $this->tkm->get_all()], $this->title, $this->mybreadcrumb->render());
    }

    public function create()
    {
        $this->mybreadcrumb->add('Form 8', site_url('form_8'));
        $this->mybreadcrumb->add('Add new', site_url('form_8/create'));
        $this->form_validation->set_rules($this->df8->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->_form();
        } else {
            $data = $this->input->post(NULL, TRUE);
            $id_ppk = $this->dpm->get_id_ppk();
            $id_form_8 = $this->f8->get_id_form_8();
            if ($data['id_tahap_kegiatan'] == 'buat_baru') {
                $this->form_validation->reset_validation();
                $this->form_validation->set_rules($this->tkm->rules());
                if ($this->form_validation->run() == FALSE) {
                    $this->_form();
                } else {
                    $this->f8->save($id_ppk);
                    $id_tahap_kegiatan = $this->tkm->save($data['tahap_kegiatan']);
                    $this->df8->save($data, $id_form_8, $id_tahap_kegiatan);
                    $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
                    redirect('form_8/show/' . $id_form_8);
                }
            } else {
                $this->f8->save($id_ppk);
                $this->df8->save($data, $id_form_8, $data['id_tahap_kegiatan']);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
                redirect('form_8/show/' . $id_form_8);
            }
        }
    }

    public function done($id_form_8)
    {
        $this->load->model('form_11_model', 'f11');
        $form_8 = $this->f8->find($id_form_8);
        if ($form_8) {
            $this->f8->done($form_8, $id_form_8);
            $this->f11->save($id_form_8);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Selesai dibuat']);
            redirect('form_8/show/' . $id_form_8);
        } else {
            show_404();
        }
    }
}
