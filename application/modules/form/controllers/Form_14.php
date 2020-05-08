<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_14 extends MX_Controller
{
    private $title = 'Form 14';

    function __construct()
    {
        parent::__construct();
        $this->load->model('form_14_model', 'f14');
        $this->load->model('form_17_model', 'f17');
        $this->load->model('detail_form_14_model', 'df14');
        $this->load->model('ppk/detail_ppk_model', 'dpm');
        $this->load->helper('date');
        $this->load->module('template');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->role = $this->session->userdata('role');
    }

    public function index($start = NULL, $q = NULL)
    {
        $this->mybreadcrumb->add('Form 14', site_url('form_14'));
        $start = intval($start);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'form_14/index/' . urlencode($q);
            $config['first_url'] = base_url() . 'form_14/index/' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'form_14/index';
            $config['first_url'] = base_url() . 'form_14';
        }
        $config['per_page'] = 10;
        $config['total_rows'] = $this->f14->total_rows($q);
        $form_14 = $this->f14->get_limit_data($config['per_page'], $start, $q, $this->role);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('form/form_14/index', ['form_14_data' => $form_14, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1, 'role' => $this->role], $this->title, $this->mybreadcrumb->render());
    }

    public function show($id_form_14)
    {
        $form_14 = $this->f14->find($id_form_14);
        if ($form_14) {
            $this->mybreadcrumb->add('Form 14', site_url('form_14'));
            $this->mybreadcrumb->add('Detail Form 14', site_url('form_14/show/' . $id_form_14));
            $this->template->load('form/form_14/show', ['detail_data' => $this->df14->get_detail($form_14->id_form_8), 'no' => 1, 'is_done' => $form_14->is_done, 'id_form_8' => $form_14->id_form_8, 'id_form_14' => $id_form_14, 'form_17' => $this->f17->get_form_8($form_14->id_form_8), 'role' => $this->role], $this->title, $this->mybreadcrumb->render());
        } else {
            show_404();
        }
    }

    public function create($id_form_8 = NULL)
    {
        $id_form_14 = $this->f14->get_id_form_14();
        $this->f14->save($id_form_8);
        redirect('form_14/show/' . $id_form_14);
        /* $this->form_validation->set_rules($this->f14->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('form/form_14/create');
        } else {
            $data = $this->input->post(NULL, TRUE);
            $this->f14->save($data);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
            redirect('form_11');
        } */
    }

    public function done($id_form_14)
    {
        $form_14 = $this->f14->find($id_form_14);
        if ($form_14) {
            $this->f14->done($id_form_14);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Selesai dibuat!']);
            redirect('form_14/show/' . $id_form_14);
        } else {
            show_404();
        }
    }
}
