<?php
defined('BASEPATH') or exit('No direct script access allowed');

class More_info extends CI_Controller
{
    public $load;
    public $m_more_info;
    public $input;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_more_info');
    }

    function index()
    {

        $data['_title'] = 'Kanzu Group Indonesia';
        $data['_script'] = 'more_info/more_info_js';
        $data['_view'] = 'more_info/more_info';
        $data['data_marketing'] = $this->m_more_info->m_data_more_info();
        $this->load->view('layout/index', $data);
    }
    function klik_wa_marketing()
    {
        // $id_market = $this->input->post('id-market');
       
        // $sql = "SELECT * FROM marketperum WHERE id_market = $id_market ";
        // $query = $this->db->query($sql);
        // if ($query->num_rows() > 0) {
        //     foreach ($query->result() as $project) {
        //         $add_klik = $project->klik_marketperum + 1;
        //     }
        // }
        // $update_view = $this->db->set('klik_marketperum', $add_klik)
        //     ->where('id_market', $id_market)
        //     ->update('marketperum');
        // return $update_view;

    }
}
