<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Excel extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('form/skor_form_11_model', 'sf11');
        $this->load->model('form/form_8_model', 'f8');
        $this->load->model('form/detail_form_8_model', 'df8');
        $this->role = $this->session->userdata('role');
        //$this->form_validation->CI = &$this;
    }

    public function index($id)
    {
        $this->load->model('form/form_14_model', 'f14');
        $data['detail_data'] = $this->df8->get_detail($id);
        $data['nama'] = 'form_8_'.$id;

        $this->load->view('export/excel',$data);
    }

    public function form_11($id) 
    {
        $this->load->model('form/form_8_model', 'f8');
        $form_8 = $this->f8->find($id);
        if ($form_8) {
            $data = $this->sf11->get_skor($id, $this->role);
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
        }

        $data = ['has_created' => $this->sf11->get_user($id), 'detail_data' => $this->role == 'Admin' ? $detail_data : $data->result(), 'responden' => $data->result_array() ? $this->sf11->get_responden($data->row()->id_pernyataan) : '', 'no' => 1, 'id_form_8' => $id];
        $data['nama'] = 'form_11_'.$id;
        
        $this->load->view('export/form_11',$data);
    }
}
