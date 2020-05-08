<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Peta extends MX_Controller
{
    private $title = 'Peta Resiko';

    function __construct()
    {
        parent::__construct();
        $this->load->module('template');
        $this->load->model('form/skor_form_11_model', 'sf11');
        $this->load->model('form/form_11_model', 'f11');
        $this->mybreadcrumb->add('Home', site_url('dashboard'));
        $this->role = $this->session->userdata('role');
        $this->load->module('auth');
        $this->auth->is_login();
    }

    public function index($start = NULL, $q = NULL)
    {
        $this->load->model('ppk/detail_ppk_model', 'dpm');
        $this->mybreadcrumb->add($this->title, site_url('peta'));
        $q = urldecode($q);
        $start = intval($start);
        if ($q <> '') {
            $config['base_url'] = base_url() . 'peta/index/' . urlencode($q);
            $config['first_url'] = base_url() . 'peta/index/' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'peta/index';
            $config['first_url'] = base_url() . 'peta';
        }
        $config['per_page'] = 10;
        $config['total_rows'] = $this->f11->total_rows($q);
        $form_8 = $this->f11->get_limit_data($config['per_page'], $start, $q);
        $this->load->library('pagination');
        $this->pagination->initialize($config);
        $this->template->load('peta/index', ['form_8_data' => $form_8, 'q' => $q, 'pagination' => $this->pagination->create_links(), 'total_rows' => $config['total_rows'], 'start' => $start, 'no' => 1], $this->title, $this->mybreadcrumb->render());
    }

    public function show($id_form_8)
    {
        $this->mybreadcrumb->add($this->title, site_url('show'));
        $this->load->model('form/form_8_model', 'f8');
        $this->load->model('form/skor_form_11_model', 'sf11');
        $form_8 = $this->f8->find($id_form_8);

        if ($form_8) {
            $datas = $this->sf11->get_skor($id_form_8, $this->role);
            $detail_data = array();
            // Pemecahan data untuk Admin
            foreach ($datas->result_array() as $val) {
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
        }

        // foreach($detail_data as $d) :
        //     echo $d['id_pernyataan'];
        // endforeach;
        // var_dump($detail_data[1]);
        // die;
        $data['responden'] = $this->sf11->get_responden($datas->row()->id_pernyataan);
        $data['detail_data'] = $detail_data;

        $this->load->view('peta/show',$data);
    }

   
}
