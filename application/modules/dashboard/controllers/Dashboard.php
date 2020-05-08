<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('dashboard_model', 'dm');
        $this->load->module('template');
        $this->load->module('auth');
        $this->auth->is_login();
    }

    public function index()
    {
        $this->template->load('dashboard/index', ['total_user' => $this->dm->get_total_user(), 'total_ppk' => $this->dm->get_total_ppk(), 'total_form_8' => $this->dm->get_total_form_8(), 'total_form_11' => $this->dm->get_total_form_11(), 'total_form_14' => $this->dm->get_total_form_14(), 'total_form_17' => $this->dm->get_total_form_17(), 'total_form_22' => $this->dm->get_total_form_22()]);
    }
}
