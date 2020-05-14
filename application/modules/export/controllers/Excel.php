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
        $this->load->model('form/detail_form_14_model', 'df14');
        $this->load->model('form/form_14_model', 'f14');
        $this->load->model('form/form_17_model', 'f17');
        $this->load->model('form/detail_form_17_model', 'df17');
        $this->load->model('form/form_22_model', 'f22');
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

    public function form_14($id) 
    {

        $form_14 = $this->f14->find($id);
        if ($form_14) {
            $data = ['detail_data' => $this->df14->get_detail($form_14->id_form_8), 'no' => 1, 'is_done' => $form_14->is_done, 'id_form_8' => $form_14->id_form_8, 'id_form_14' => $id, 'form_17' => $this->f17->get_form_8($form_14->id_form_8), 'role' => $this->role, 'nama' => "form_14_$id"];

            $this->load->view('template/head');
            $this->load->view('export/form_14', $data);

        } else {
            show_404();
        }
    }

    public function form_17($id) 
    {
        $form_17 = $this->f17->find($id);
        if ($form_17) {
            $data = ['detail_data' => $this->df17->get_detail($form_17->id_form_8), 'no' => 1, 'is_done' => $form_17->is_done, 'id_form_8' => $form_17->id_form_8, 'id_form_17' => $id, 'form_22' => $this->f22->get_form_8($form_17->id_form_8), 'role' => $this->role, 'nama' => "form_17_$id"];
            
            $this->load->view('template/head');
            $this->load->view('export/form_17',$data);
            $this->load->view('template/footer');
            $this->load->view('template/js');
        } else {
            show_404();
        }
    }

    public function form_22($id)
    {
        $form_22 = $this->f22->find($id);
        if ($form_22) {

            $datas = $this->sf11->get_skors22($id, $this->role);

            $detail_data = array();
            // Pemecahan data untuk Admin
            foreach ($datas->result_array() as $val) {
                $indeks = array_key_last($detail_data);
                if (empty($detail_data)) {
                    $detail_data[] = [
                        'id_pernyataan' => $val['id_pernyataan'],
                        'pernyataan_risiko' => $val['pernyataan_risiko'],
                        'pemilik_risiko' => $val['pemilik_risiko'],
                        'pengendalian_kunci' => $val['perbaikan_pengendalian'].', '.$val['perbaikan_informasi'].', '.$val['perbaikan_komunikasi'],
                        'pemantauan' => $val['pemantauan'],
                        'perbaikan_pemantauan' => $val['perbaikan_pemantauan'],
                        'waktu_pemantauan' => $val['waktu_pemantauan'],
                        'skor_risiko' => [$val['skor_risiko']],
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
                        'pemilik_risiko' => $val['pemilik_risiko'],
                        'pengendalian_kunci' => $val['perbaikan_pengendalian'].', '.$val['perbaikan_informasi'].', '.$val['perbaikan_komunikasi'],
                        'pemantauan' => $val['pemantauan'],
                        'perbaikan_pemantauan' => $val['perbaikan_pemantauan'],
                        'waktu_pemantauan' => $val['waktu_pemantauan'],
                        'skor_risiko' => [$val['skor_risiko']],
                        'skor_dampak' => [$val['skor_dampak']],
                        ];
                    }
                }
            }

            $data = ['detail_data' => $detail_data, 'responden' => $datas->result_array() ? $this->sf11->get_responden($datas->row()->id_pernyataan) : '', 'nama' => 'form_22_'.$id];
            // var_dump($data['detail_data'][1]);
            $this->load->view('template/head');
            $this->load->view('export/form_22',$data);
           
        } else {
            show_404();
        }
    }
}
