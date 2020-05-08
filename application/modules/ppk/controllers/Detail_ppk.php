<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_ppk extends MX_Controller
{
    private $title = 'PPK';

    function __construct()
    {
        parent::__construct();
        $this->load->model('user/user_model', 'um');
        $this->load->model('PPK_Model', 'pm');
        $this->load->model('Detail_ppk_Model', 'dpm');
        $this->load->module('template');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->load->module('auth');
        $this->auth->is_login();
    }

    public function index()
    {
        /* print_r($this->um->get_available_ppk());
        die; */
        $this->mybreadcrumb->add('Add new', site_url('detail_ppk'));
        $this->form_validation->set_rules($this->dpm->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('ppk/detail_ppk/index', ['ppk_data' => $this->pm->get_all(), 'user_data' => $this->um->get_available_ppk()], $this->title, $this->mybreadcrumb->render());
        } else {
            $data = $this->input->post(NULL, TRUE);
            $this->dpm->save($data);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
            redirect('ppk/show/' . $data['id_ppk']);
        }
    }

    public function delete()
    {
        $data = $this->input->post(NULL, TRUE);
        $user_in_ppk = $this->dpm->find_by_id($data['id_ppk'], $data['id_user']);
        if ($user_in_ppk) {
            $this->dpm->delete($data);
            $this->session->set_flashdata('type', 'success');
            $this->session->set_flashdata('message', 'Berhasil menghapus data');
            redirect('ppk/show/' . $data['id_ppk']);
        } else {
            show_404();
        }
    }
}
