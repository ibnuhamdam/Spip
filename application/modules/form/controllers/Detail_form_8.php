<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_form_8 extends MX_Controller
{
    private $title = 'Form 8';
    private $role;

    function __construct()
    {
        parent::__construct();
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->load->model('detail_form_8_model', 'df8');
        $this->load->model('tahap_kegiatan_model', 'tkm');
        $this->load->module('template');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->role = $this->session->userdata('role');
        $this->load->module('auth');
        $this->auth->is_login();
    }

    private function _form()
    {
        $this->template->load('form/form_8/create', ['tahap_kegiatan_data' => $this->tkm->get_all()], $this->title, $this->mybreadcrumb->render());
    }

    public function create($id_form_8)
    {
        $this->mybreadcrumb->add('Form 8', site_url('form_8'));
        $this->mybreadcrumb->add('Detail Form 8', site_url('form_8/show/' . $id_form_8));
        $this->mybreadcrumb->add('Add new', site_url('detail_form_8/create/' . $id_form_8));
        $this->form_validation->set_rules($this->df8->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->_form();
        } else {
            $data = $this->input->post(NULL, TRUE);
            if ($data['id_tahap_kegiatan'] == 'buat_baru') {
                $this->form_validation->reset_validation();
                $this->form_validation->set_rules($this->tkm->rules());
                if ($this->form_validation->run() == FALSE) {
                    $this->_form();
                } else {
                    $id_tahap_kegiatan = $this->tkm->save($data['tahap_kegiatan']);
                    $this->df8->save($data, $id_form_8, $id_tahap_kegiatan);
                    $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
                    redirect('form_8/show/' . $id_form_8);
                }
            } else {
                $this->df8->save($data, $id_form_8, $data['id_tahap_kegiatan']);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
                redirect('form_8/show/' . $id_form_8);
            }
        }
    }

    public function show($id_pernyataan)
    {
        $detail = $this->df8->find($id_pernyataan);
        if ($detail) {
            $this->template->load('form/detail_form_8/show', ['detail' => $detail]);
        } else {
            show_404();
        }
    }

    private function _form_edit($detail)
    {
        $this->mybreadcrumb->add('Form 8', site_url('form_8'));
        $this->mybreadcrumb->add('Detail Form 8', site_url('form_8/show/' . $detail->id_form_8));
        $this->mybreadcrumb->add('Edit', site_url('detail_form_8/edit/' . $detail->id_pernyataan));
        $this->template->load('form/detail_form_8/update', ['tahap_kegiatan_data' => $this->tkm->get_all(), 'detail' => $detail], $this->title, $this->mybreadcrumb->render());
    }

    public function edit($id_pernyataan)
    {
        $detail = $this->df8->find($id_pernyataan);
        if ($detail) {
            $this->form_validation->set_rules($this->df8->rules());
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->_form_edit($detail);
            } else {
                $data = $this->input->post(NULL, TRUE);
                if ($data['id_tahap_kegiatan'] == 'buat_baru') {
                    $this->form_validation->reset_validation();
                    $this->form_validation->set_rules($this->tkm->rules());
                    if ($this->form_validation->run() == FALSE) {
                        $this->_form();
                    } else {
                        $id_tahap_kegiatan = $this->tkm->save($data['tahap_kegiatan']);
                        $this->df8->update($data, $id_pernyataan, $detail->id_form_8, $id_tahap_kegiatan);
                        $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil mengubah data!']);
                        redirect('form_8/show/' . $detail->id_form_8);
                    }
                } else {
                    $this->df8->update($data, $id_pernyataan, $detail->id_form_8, $data['id_tahap_kegiatan']);
                    $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil mengubah data!']);
                    redirect('form_8/show/' . $detail->id_form_8);
                }
            }
        } else {
            show_404();
        }
    }
}
