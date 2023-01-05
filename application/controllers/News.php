<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends CI_Controller
{
	public $load;
	public $m_news;
	public $input;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_news');
	}

	function index()
	{

		$data['_title'] = 'News';
		$data['_script'] = 'news/news_js';
		$data['_view'] = 'news/news';
		$data['data_berita'] = $this->m_news->m_data_berita();
		$this->load->view('layout/index', $data);
	}

	
}
