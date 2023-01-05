<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Surat extends CI_Controller
{
	public $load;
	public $m_surat;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_surat');
	}

	function promo()
	{

		$data['_title'] = 'PROMO';
		$data['_script'] = 'serti/sertifikat_js';
		$data['_view_login'] = 'serti/sertifikat';
		$data['data_surat'] = $this->m_surat->m_surat_promo();
		$this->load->view('layout/index', $data);
	}
}
