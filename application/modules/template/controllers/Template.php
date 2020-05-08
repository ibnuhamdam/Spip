<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template extends MX_Controller
{
    public function load($view = NULL, $data = NULL, $title = '', $breadcrumb = '')
    {
        $this->load->view('head');
        $this->load->view('navbar');
        $this->load->view('sidebar', ['role' => $this->session->userdata('role'), 'hal' => $this->uri->segment(1)]);
        $this->load->view('breadcrumb', ['title' => empty($title) ? ucwords($this->uri->segment(1)) : $title, 'breadcrumb' => empty($breadcrumb) ? '' : $breadcrumb]);
        // Di sini halaman dinamis
        /* module/view.php atau
        module/folder/view.php */
        if ($view != NULL) {
            $this->load->view($view, $data);
        }
        // Akhir halaman dinamis
        $this->load->view('footer');
        $this->load->view('js');
        $this->load->view('chart',$data);
    }
}
