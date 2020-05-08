<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_form_17 extends MX_Controller
{
    private $title = 'Form 17';

    function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('detail_form_8_model', 'df8');
        $this->load->model('detail_form_17_model', 'df17');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
    }

    public function create($id_form_17, $id_pernyataan)
    {
        $this->form_validation->set_rules($this->df17->rules());
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run() == FALSE) {
            $this->mybreadcrumb->add($this->title, site_url('form_17'));
            $this->mybreadcrumb->add('Detail Form 17', site_url('form_17/show/' . $id_form_17));
            $this->mybreadcrumb->add('Add New', site_url('detail_form_17/create/' . $id_form_17 . '/' . $id_pernyataan));
            $this->template->load('form/detail_form_17/create', ['detail' => $this->df8->find($id_pernyataan)], $this->title, $this->mybreadcrumb->render());
        } else {
            $data = $this->input->post();
            $this->df17->save($data, $id_form_17, $id_pernyataan);
            $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil menambah data!']);
            redirect('form_17/show/' . $id_form_17);
        }
    }

    public function edit($id_pernyataan)
    {
        $form_17 = $this->df17->find($id_pernyataan);
        if ($form_17) {
            $this->form_validation->set_rules($this->df17->rules());
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->mybreadcrumb->add($this->title, site_url('form_17'));
                $this->mybreadcrumb->add('Detail Form 17', site_url('form_17/show/' . $form_17->id_form_17));
                $this->mybreadcrumb->add('Edit', site_url('detail_form_17/edit/' . $id_pernyataan));
                $this->template->load('form/detail_form_17/edit', ['detail' => $this->df17->find($id_pernyataan)], $this->title, $this->mybreadcrumb->render());
            } else {
                $data = $this->input->post();
                $this->df17->update($data, $form_17->id_form_17, $id_pernyataan);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil mengubah data!']);
                redirect('form_17/show/' . $form_17->id_form_17);
            }
        } else {
            show_404();
        }
    }

    public function show($id_pernyataan)
    {
        $detail = $this->df17->find($id_pernyataan);
        if ($detail) {
            $this->template->load('form/detail_form_17/show', ['detail' => $detail]);
        } else {
            show_404();
        }
    }
}
