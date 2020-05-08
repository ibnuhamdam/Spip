<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'am');
        $this->load->library('form_validation');
        //$this->form_validation->CI = &$this;
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_error_delimiters('<h4 class="badge badge-danger mb-3">', '</h4>');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('index');
        } else {
            $user = $this->am->get_user($this->input->post('email', TRUE));
           
            if ($user) {
                if ($user->password == password_verify($this->input->post('password', TRUE), $user->password)) {
                    $this->session->set_userdata([
                        'id_user' => $user->id_user,
                        'email' => $user->email,
                        'role' => $user->role
                    ]);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', 'Password salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', 'Email tidak terdaftar!');
                redirect('auth');
            }
        }
    }

    public function is_login()
    {
        if (!$this->session->userdata('id_user') && !$this->session->userdata('email') && !$this->session->userdata('role')) {
            redirect();
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['id_user', 'email', 'role']);
        $this->session->set_flashdata('message', 'Anda logout!');
        redirect();
    }
}
