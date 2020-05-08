<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Errors extends CI_Controller
{
    public function error_404()
    {
        $this->load->view('index', ['error_code' => 404]);
    }

    public function error_403()
    {
        $this->load->view('index', ['error_code' => 403]);
    }
}
