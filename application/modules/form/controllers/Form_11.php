<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form_11 extends MX_Controller
{
    private $title = 'Form 11';

    function __construct()
    {
        parent::__construct();
        $this->load->model('skor_form_11_model', 'sf11');
        $this->load->module('template');
        $this->load->model('form_11_model', 'f11');
        $this->load->library('form_validation');
        $this->form_validation->CI = &$this;
        $this->load->module('auth');
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->auth->is_login();
        $this->role = $this->session->userdata('role');
    }

    public function index($start = NULL, $q = NULL)
    {
        $this->load->model('ppk/detail_ppk_model', 'dpm');
        $this->mybreadcrumb->add($this->title, site_url('form_8'));
        $q = urldecode($q);
        $start = intval($start);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'form_11/index/' . urlencode($q);
            $config['first_url'] = base_url() . 'form_11/index/' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'form_11/index';
            $config['first_url'] = base_url() . 'form_11';
        }
        $config['per_page'] = 10;
        $config['total_rows'] = $this->f11->total_rows($q);
        $form_8 = $this->f11->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('form/form_11/index', ['form_8_data' => $form_8, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1], $this->title, $this->mybreadcrumb->render());
    }

    public function create($id_form_8)
    {
        $this->load->model('detail_form_8_model', 'df8');
        $detail_form_8 = $this->df8->get_detail($id_form_8);
        if ($detail_form_8) {
            $this->form_validation->set_rules($this->sf11->rules($detail_form_8));
            $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->mybreadcrumb->add('Form 11', site_url('form_11'));
                $this->mybreadcrumb->add('Input Score', site_url('form_11/create/' . $id_form_8));
                $this->template->load('form/form_11/create', ['detail_data' => $detail_form_8, 'no' => 1], $this->title, $this->mybreadcrumb->render());
            } else {
                $post = $this->input->post(NULL, TRUE);
                foreach ($post as $key => $value) {
                    $data[] = [
                        'id_pernyataan' => $key,
                        'id_user' => $this->session->userdata('id_user'),
                        'skor_risiko' => $value['risiko'],
                        'skor_dampak' => $value['dampak']
                    ];
                }
                $this->sf11->save($data);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil input data!']);
                redirect('form_11/show/' . $id_form_8);
            }
        } else {
            show_404();
        }
    }

    public function show($id_form_8)
    {
        $this->load->model('form_8_model', 'f8');
        $form_8 = $this->f8->find($id_form_8);
        if ($form_8) {
            $data = $this->sf11->get_skor($id_form_8, $this->role);
            $detail_data = array();
            // Pemecahan data untuk Admin
            foreach ($data->result_array() as $val) {
                $indeks = array_key_last($detail_data);
                if (empty($detail_data)) {
                    $detail_data[] = [
                        'id_pernyataan' => $val['id_pernyataan'],
                        'pernyataan_risiko' => $val['pernyataan_risiko'],
                        'skor_risiko' => [$val['skor_risiko']],
                        'dampak' => $val['dampak'],
                        'skor_dampak' => [$val['skor_dampak']],
                    ];
                } else {
                    if (in_array($val['id_pernyataan'], $detail_data[$indeks])) {
                        $detail_data[$indeks]['skor_risiko'][] = $val['skor_risiko'];
                        $detail_data[$indeks]['skor_dampak'][] = $val['skor_dampak'];
                    } else {
                        $detail_data[] = [
                            'id_pernyataan' => $val['id_pernyataan'],
                            'pernyataan_risiko' => $val['pernyataan_risiko'],
                            'skor_risiko' => [$val['skor_risiko']],
                            'dampak' => $val['dampak'],
                            'skor_dampak' => [$val['skor_dampak']],
                        ];
                    }
                }
            }
            $this->mybreadcrumb->add('Form 11', site_url('form_11'));
            $this->mybreadcrumb->add('Detail Form 11', site_url('form_11/show/' . $id_form_8));

            $this->template->load($this->role == 'Admin' ? 'form/form_11/show_admin' : 'form/form_11/show', ['has_created' => $this->sf11->get_user($id_form_8), 'detail_data' => $this->role == 'Admin' ? $detail_data : $data->result(), 'responden' => $data->result_array() ? $this->sf11->get_responden($data->row()->id_pernyataan) : '', 'no' => 1, 'id_form_8' => $id_form_8], $this->title, $this->mybreadcrumb->render());
        } else {
            show_404();
        }
    }

    public function edit($id_pernyataan)
    {
        $detail_skor = $this->sf11->find($id_pernyataan);
        if ($detail_skor) {
            $this->form_validation->set_rules($this->sf11->rules());
            $this->form_validation->set_error_delimiters('<span class="text-danger"', '</span>');
            if ($this->form_validation->run() == FALSE) {
                $this->mybreadcrumb->add('Form 11', site_url('form_11'));
                $this->mybreadcrumb->add('Detail Form 11', site_url('form_11/show/' . $detail_skor->id_form_8));
                $this->mybreadcrumb->add('Edit', site_url('form_11/edit/' . $id_pernyataan));
                $this->template->load('form/form_11/edit', ['detail' => $detail_skor], $this->title, $this->mybreadcrumb->render());
            } else {
                $data = $this->input->post(NULL, TRUE);
                $this->sf11->update($id_pernyataan, $data);
                $this->session->set_flashdata(['type' => 'success', 'message' => 'Berhasil ubah data!']);
                redirect('form_11/show/' . $detail_skor->id_form_8);
            }
        } else {
            show_404();
        }
    }
}
