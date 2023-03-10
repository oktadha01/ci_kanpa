<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public $load;
    public $session;
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }
    public function index()
    {
        $sess_data = ['id_user', 'user_name', 'password', 'privilage', 'is_login'];

        $this->session->unset_userdata($sess_data);
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
