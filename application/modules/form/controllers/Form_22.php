<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_22 extends MX_Controller
{
    private $title = 'Form 22';

    function __construct()
    {
        parent::__construct();
        $this->load->model('ppk/detail_ppk_model', 'dpm');
        $this->load->model('form_22_model', 'f22');
        $this->load->model('detail_form_22_model', 'df22');
        $this->load->module('template');
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->mybreadcrumb->add($this->title, site_url('form_22'));
        $this->role = $this->session->userdata('role');
    }

    public function index($start = NULL, $q = NULL)
    {
        $start = intval($start);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'form_22/index/' . urlencode($q);
            $config['first_url'] = base_url() . 'form_22/index/' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'form_22/index';
            $config['first_url'] = base_url() . 'form_22';
        }
        $config['per_page'] = 10;
        $config['total_rows'] = $this->f22->total_rows($q);
        $form_22 = $this->f22->get_limit_data($config['per_page'], $start, $q, $this->role);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('form/form_22/index', ['form_22_data' => $form_22, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1, 'role' => $this->role], $this->title, $this->mybreadcrumb->render());
    }

    public function show($id_form_22)
    {
        $form_22 = $this->f22->find($id_form_22);
        if ($form_22) {
            $this->mybreadcrumb->add('Detail Form 22', site_url('form_22/show/' . $id_form_22));
            $this->template->load('form/form_22/show', ['detail_data' => $this->df22->get_detail($form_22->id_form_8), 'no' => 1, 'is_done' => $form_22->is_done, 'id_form_8' => $form_22->id_form_8, 'id_form_22' => $id_form_22], $this->title, $this->mybreadcrumb->render());
        } else {
            show_404();
        }
    }

    public function create($id_form_8 = NULL)
    {
        $id_form_22 = $this->f22->get_id_form_22();
        $this->f22->save($id_form_8);
        redirect('form_22/show/' . $id_form_22);
    }

    public function done($id_form_22)
    {
        $form_22 = $this->f22->find($id_form_22);
        if ($form_22) {
            $this->f22->done($id_form_22);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Selesai dibuat!']);
            redirect('form_22/show/' . $id_form_22);
        } else {
            show_404();
        }
    }
}
