<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_form_14 extends MX_Controller
{
    private $title = 'Form 14';

    function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('detail_form_8_model', 'df8');
        $this->load->model('detail_form_14_model', 'df14');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
    }

    public function create($id_form_14, $id_pernyataan)
    {
        $this->form_validation->set_rules($this->df14->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->mybreadcrumb->add($this->title, site_url('form_14'));
            $this->mybreadcrumb->add('Detail Form 14', site_url('form_14/show/' . $id_form_14));
            $this->mybreadcrumb->add('Add New', site_url('detail_form_14/create/' . $id_form_14 . '/' . $id_pernyataan));
            $this->template->load('form/detail_form_14/create', ['detail' => $this->df8->find($id_pernyataan)], $this->title, $this->mybreadcrumb->render());
        } else {
            $data = $this->input->post();
            $this->df14->save($data, $id_form_14, $id_pernyataan);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
            redirect('form_14/show/' . $id_form_14);
        }
    }

    public function edit($id_pernyataan)
    {
        $form_14 = $this->df14->find($id_pernyataan);
        if ($form_14) {
            $this->form_validation->set_rules($this->df14->rules());
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->mybreadcrumb->add($this->title, site_url('form_14'));
                $this->mybreadcrumb->add('Detail Form 14', site_url('form_14/show/' . $form_14->id_form_14));
                $this->mybreadcrumb->add('Edit', site_url('detail_form_14/edit/' . $id_pernyataan));
                $this->template->load('form/detail_form_14/edit', ['detail' => $this->df14->find($id_pernyataan)], $this->title, $this->mybreadcrumb->render());
            } else {
                $data = $this->input->post();
                $this->df14->update($data, $form_14->id_form_14, $id_pernyataan);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil mengubah data!']);
                redirect('form_14/show/' . $form_14->id_form_14);
            }
        } else {
            show_404();
        }
    }

    public function show($id_pernyataan)
    {
        $detail = $this->df14->find($id_pernyataan);
        if ($detail) {
            $this->template->load('form/detail_form_14/show', ['detail' => $detail]);
        } else {
            show_404();
        }
    }
}
