<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_form_22 extends MX_Controller
{
    private $title = 'Form 22';

    function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('detail_form_8_model', 'df8');
        $this->load->model('detail_form_22_model', 'df22');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->mybreadcrumb->add($this->title, site_url('form_22'));
    }

    public function create($id_form_22, $id_pernyataan)
    {
        $this->form_validation->set_rules($this->df22->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->mybreadcrumb->add('Detail Form 22', site_url('form_22/show/' . $id_form_22));
            $this->mybreadcrumb->add('Add New', site_url('detail_form_22/create/' . $id_form_22 . '/' . $id_pernyataan));
            $this->template->load('form/detail_form_22/create', ['detail' => $this->df8->find($id_pernyataan)], $this->title, $this->mybreadcrumb->render());
        } else {
            $data = $this->input->post();
            $this->df22->save($data, $id_form_22, $id_pernyataan);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
            redirect('form_22/show/' . $id_form_22);
        }
    }

    public function edit($id_pernyataan)
    {
        $form_22 = $this->df22->find($id_pernyataan);
        if ($form_22) {
            $this->form_validation->set_rules($this->df22->rules());
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->mybreadcrumb->add('Detail Form 22', site_url('form_22/show/' . $form_22->id_form_22));
                $this->mybreadcrumb->add('Edit', site_url('detail_form_22/edit/' . $id_pernyataan));
                $this->template->load('form/detail_form_22/edit', ['detail' => $this->df22->find($id_pernyataan)], $this->title, $this->mybreadcrumb->render());
            } else {
                $data = $this->input->post();
                $this->df22->update($data, $form_22->id_form_22, $id_pernyataan);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil mengubah data!']);
                redirect('form_22/show/' . $form_22->id_form_22);
            }
        } else {
            show_404();
        }
    }

    public function show($id_pernyataan)
    {
        $detail = $this->df22->find($id_pernyataan);
        if ($detail) {
            $this->template->load('form/detail_form_22/show', ['detail' => $detail]);
        } else {
            show_404();
        }
    }
}
