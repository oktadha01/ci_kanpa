<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Artikel extends CI_Controller
{
	public $load;
	public $m_artikel;
	public $input;
	public $uri;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_artikel');
	}

	function index()
	{

		$data['_title'] = 'ARTIKEL PT KANPA';
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$data['data_berita_left'] = $this->m_artikel->m_data_berita_left();
		$data['data_berita_right'] = $this->m_artikel->m_data_berita_right();
		$data['data_berita_center'] = $this->m_artikel->m_data_berita_center();
		$data['data_perum'] = $this->m_artikel->m_data_perum();
		$data['data_tipe'] = $this->m_artikel->m_data_tipe();
		$this->load->view('layout/index', $data);
	}
	function page()
	{
		$tittle = $this->uri->segment(3);
		$judul_berita = preg_replace("![^a-z0-9]+!i", " ", $tittle);

		$data['_title'] =  $judul_berita;
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/page_artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$data['data_berita_left'] = $this->m_artikel->m_data_berita_left();
		$data['data_berita_right'] = $this->m_artikel->m_data_berita_right();
		$data['data_berita_detail'] = $this->m_artikel->m_data_berita_detail($judul_berita);
		$data['data_perum'] = $this->m_artikel->m_data_perum();
		$data['data_tipe'] = $this->m_artikel->m_data_tipe();
		$data['data_artikel_berita'] = $this->m_artikel->m_data_artikel_berita();
		$data['data_foto_berita'] = $this->m_artikel->m_data_foto_berita();
		$this->load->view('layout/index', $data);
	}
	function tag()
	{
		$tag = $this->uri->segment(3);
		$tag_berita = preg_replace("![^a-z0-9]+!i", " ", $tag);
		$data['_title'] = 'tag';
		$data['_script'] = 'artikel/artikel_js';
		$data['_view'] = 'artikel/tag_artikel';
		$data['data_tag'] = $this->m_artikel->m_data_tag();
		$data['data_berita_tag'] = $this->m_artikel->m_data_berita_tag($tag_berita);
		$data['data_perum'] = $this->m_artikel->m_data_perum();
		$data['data_tipe'] = $this->m_artikel->m_data_tipe();
		$this->load->view('layout/index', $data);
	}
}
