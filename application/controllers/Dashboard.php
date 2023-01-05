<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public $load;
	public $m_dashboard;
	public $input;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_dashboard');
	}

	function index()
	{

		$data['_title'] = 'Kanzu Group Indonesia';
		$data['_script'] = 'dashboard/index_js';
		$data['_view'] = 'dashboard/index';
		$data['data_foto_slide'] = $this->m_dashboard->m_data_fotoslide();
		$data['data_perum'] = $this->m_dashboard->m_data_perum();
		$data['data_tipe'] = $this->m_dashboard->m_data_tipe();
		$data['data_berita'] = $this->m_dashboard->m_data_berita();
		$data['detail_marketing'] = $this->m_dashboard->m_detail_marketing();
		$this->load->view('layout/index', $data);
	}

	
}
