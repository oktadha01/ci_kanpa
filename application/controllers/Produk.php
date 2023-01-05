<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public $load;
    public $m_produk;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_produk');
    }

    function index()
    {

        $data['_title'] = 'Kanzu Group Indonesia';
        $data['_script'] = 'produk/produk_js';
        $data['_view'] = 'produk/produk';
        // $data['data_foto_slide'] = $this->m_produk->m_data_fotoslide();
        $data['data_perum'] = $this->m_produk->m_data_perum();
        $data['data_tipe'] = $this->m_produk->m_data_tipe();
        $this->load->view('layout/index', $data);
    }
}
