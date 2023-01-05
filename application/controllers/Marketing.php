<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Marketing extends CI_Controller
{
    public $load;
    public $m_marketing;
    public $input;
    public $upload;
    public $image_lib;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_marketing');
    }

    function index()
    {

        $data['_title'] = 'Marketing';
        $data['_script'] = 'marketing/marketing_js';
        $data['_view'] = 'marketing/marketing';
        $data['data_perum'] = $this->m_marketing->m_data_perum();
        $this->load->view('layout/index', $data);
    }

    function data_marketing()
    {
        $data['data_marketing'] = $this->m_marketing->m_data_marketing();
        $data['_view'] = 'marketing/data_marketing';
        $this->load->view('marketing/data_marketing', $data);
    }
    function simpan_data_marketing()
    {
        $config['upload_path'] = "./upload/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto-marketing")) {
            $data = array('upload_data' => $this->upload->data());
            $nm_marketing = $this->input->post('nm-marketing');
            $foto_marketing = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();

            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_marketing->m_simpan_data_marketing($nm_marketing, $foto_marketing);
            echo json_encode($insert);
        }
        exit;
    }
    function simpan_data_marketperum()
    {
        $id_marketing = $this->input->post('id-marketing');
        $bitly = $this->input->post('bitly');
        $id_perum = $this->input->post('id-perum');
        $insert = $this->m_marketing->m_simpan_data_marketperum($id_marketing, $id_perum, $bitly);
        echo json_encode($insert);
    }
    function switch_data_marketperum()
    {
        $id_market = $this->input->post('id-market');
        $status = $this->input->post('status-marketperum');
        $update = $this->m_marketing->m_switch_data_marketperum($id_market, $status);
        echo json_encode($update);
    }

    function delete_data_marketperum()
    {
        $id_market = $this->input->post('id-market');
        $delete = $this->m_marketing->m_delete_data_marketperum($id_market);
        echo json_encode($delete);
    }
    function edit_data_marketing()
    {
        $action_change_marketing = $this->input->post('ceklis-ubah-foto-marketing');
        if ($action_change_marketing == 'change-foto-marketing') {
            $foto_lama = $this->input->post('foto-lama');
            unlink('./upload/' . $foto_lama);

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("foto-marketing")) {
                $data = array('upload_data' => $this->upload->data());
                $id_marketing = $this->input->post('id-marketing');
                $nm_marketing = $this->input->post('nm-marketing');
                $foto_marketing = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $update = $this->m_marketing->m_edit_data_foto_marketing($id_marketing, $nm_marketing, $foto_marketing);
                echo json_encode($update);
            }
            exit;
        } else {
            $id_marketing = $this->input->post('id-marketing');
            $nm_marketing = $this->input->post('nm-marketing');
            $update = $this->m_marketing->m_edit_data_marketing($id_marketing, $nm_marketing);
            echo json_encode($update);
        }
    }
    function delete_data_marketing()
    {
        $foto_lama = $this->input->post('foto-lama');
        unlink('./upload/' . $foto_lama);
        $id_marketing = $this->input->post('id-marketing');
        $delete = $this->m_marketing->m_delete_data_marketing($id_marketing);
        echo json_encode($delete);
    }
    function resizeImage($filename)
    {
        $source_path = 'upload/' . $filename;
        $target_path = 'upload/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '50%',
            'width' => 'auto',
            'height' => '2560',
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        return 1;
    }
}
