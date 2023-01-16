<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public $load;
    public $m_detail;
    public $input;
    public $uri;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_detail');
    }

    function perum()
    {
        $tittle = $this->uri->segment(3);
        $luas_bangunan = $this->uri->segment(5);
        $luas_tanah = $this->uri->segment(6);
        $nm_perum = preg_replace("![^a-z0-9]+!i", " ", $tittle);
        $test = $nm_perum;
        $data['_title'] = $test;
        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail';
        $data['detail_perum'] = $this->m_detail->m_detail_perum($nm_perum);
        $data['detail_fasilitas'] = $this->m_detail->m_detail_fasilitas($nm_perum);
        $data['detail_lokasi_terdekat'] = $this->m_detail->m_detail_lokasi_terdekat($nm_perum);
        $data['detail_tipe'] = $this->m_detail->m_detail_tipe($nm_perum);
        $data['detail_marketing'] = $this->m_detail->m_detail_marketing($nm_perum);
        $data['detail_cs'] = $this->m_detail->m_detail_cs();
        // $data['data_view'] = $this->m_detail->m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $this->load->view('layout/index', $data);
    }
    function detail_tipe()
    {
        $luas_bangunan =  $this->input->post('luas-bangunan');
        $luas_tanah =  $this->input->post('luas-tanah');
        $nm_perum =  $this->input->post('nm-perum');
        $data['_view'] = 'detail/detail_tipe';
        $data['data_detail_tipe'] = $this->m_detail->m_data_detail_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $data['data_view'] = $this->m_detail->m_view_tipe($nm_perum, $luas_bangunan, $luas_tanah);
        $this->load->view('detail/detail_tipe', $data);
    }
}
