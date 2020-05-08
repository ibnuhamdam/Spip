<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_17 extends MX_Controller
{
    private $title = 'Form 17';

    function __construct()
    {
        parent::__construct();
        $this->load->model('ppk/detail_ppk_model', 'dpm');
        $this->load->model('form_17_model', 'f17');
        $this->load->model('form_22_model', 'f22');
        $this->load->model('detail_form_17_model', 'df17');
        $this->load->module('template');
        $this->load->helper('date');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->role = $this->session->userdata('role');
    }

    public function index($start = NULL, $q = NULL)
    {
        $this->mybreadcrumb->add('Form 17', site_url('form_17'));
        $start = intval($start);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'form_17/index/' . urlencode($q);
            $config['first_url'] = base_url() . 'form_17/index/' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'form_17/index';
            $config['first_url'] = base_url() . 'form_17';
        }
        $config['per_page'] = 10;
        $config['total_rows'] = $this->f17->total_rows($q);
        $form_17 = $this->f17->get_limit_data($config['per_page'], $start, $q, $this->role);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('form/form_17/index', ['form_17_data' => $form_17, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1, 'role' => $this->role], $this->title, $this->mybreadcrumb->render());
    }

    public function show($id_form_17)
    {
        $form_17 = $this->f17->find($id_form_17);
        if ($form_17) {
            $this->mybreadcrumb->add('Form 17', site_url('form_17'));
            $this->mybreadcrumb->add('Detail Form 17', site_url('form_14/show/' . $id_form_17));
            $this->template->load('form/form_17/show', ['detail_data' => $this->df17->get_detail($form_17->id_form_8), 'no' => 1, 'is_done' => $form_17->is_done, 'id_form_8' => $form_17->id_form_8, 'id_form_17' => $id_form_17, 'form_22' => $this->f22->get_form_8($form_17->id_form_8), 'role' => $this->role], $this->title, $this->mybreadcrumb->render());
        } else {
            show_404();
        }
    }

    public function create($id_form_8 = NULL)
    {
        $id_form_17 = $this->f17->get_id_form_17();
        $this->f17->save($id_form_8);
        redirect('form_17/show/' . $id_form_17);
    }

    public function done($id_form_17)
    {
        $form_17 = $this->f17->find($id_form_17);
        if ($form_17) {
            $this->f17->done($id_form_17);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Selesai dibuat!']);
            redirect('form_17/show/' . $id_form_17);
        } else {
            show_404();
        }
    }
}
