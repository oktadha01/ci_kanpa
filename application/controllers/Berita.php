<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public $load;
    public $m_berita;
    public $upload;
    public $image_lib;
    public $input;
	public $db;

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_berita');
    }

    function index()
    {

        $data['_title'] = 'Data Berita';
        $data['_script'] = 'berita/berita_js';
        $data['_view'] = 'berita/berita';
        $this->load->view('layout/index', $data);
    }
    function data_berita()
    {
        $data['data_berita'] = $this->m_berita->m_data_berita();
        $data['_view'] = 'berita/data_berita';
        $this->load->view('berita/data_berita', $data);
    }
    function simpan_data_berita()
    {
        $config['upload_path'] = "./upload/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto-berita")) {
            $data = array('upload_data' => $this->upload->data());
            $judul_berita = $this->input->post('judul-berita');
            $tgl_berita = $this->input->post('tgl-berita');
            $desk_berita = $this->input->post('desk-berita');
            $foto_berita = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();

            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_berita->m_simpan_data_berita($judul_berita, $tgl_berita, $desk_berita, $foto_berita);
            echo json_encode($insert);
        }
        exit;
    }
    function edit_data_berita()
    {
        $action_change_berita = $this->input->post('ceklis-ubah-foto-berita');
        if ($action_change_berita == 'change-foto-berita') {
            $foto_lama = $this->input->post('foto-lama');
            unlink('./upload/' . $foto_lama);

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("foto-berita")) {
                $data = array('upload_data' => $this->upload->data());
                $id_berita = $this->input->post('id-berita');
                $judul_berita = $this->input->post('judul-berita');
                $tgl_berita = $this->input->post('tgl-berita');
                $desk_berita = $this->input->post('desk-berita');
                $foto_berita = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $update = $this->m_berita->m_edit_data_foto_berita($id_berita, $judul_berita, $tgl_berita, $desk_berita, $foto_berita);
                echo json_encode($update);
            }
            exit;
        } else {
            $id_berita = $this->input->post('id-berita');
            $judul_berita = $this->input->post('judul-berita');
            $tgl_berita = $this->input->post('tgl-berita');
            $desk_berita = $this->input->post('desk-berita');
            $update = $this->m_berita->m_edit_berita($id_berita, $judul_berita, $tgl_berita, $desk_berita);
            echo json_encode($update);
        }
    }
    function delete_data_berita()
    {
        $foto_lama = $this->input->post('foto-berita');
        unlink('./upload/' . $foto_lama);
        $id_berita = $this->input->post('id-berita');
        $delete = $this->m_berita->m_delete_berita($id_berita);
        echo json_encode($delete);
    }

    function add_view_berita()
    {
        $id_berita =  $this->input->post('id-berita');

        $sql = "SELECT * FROM berita WHERE id_berita=$id_berita";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data_view) {
                $id_berita = $data_view->id_berita;
                $add_view = $data_view->view_berita + 1;
            }
        }
        $update_view = $this->db->set('view_berita', $add_view)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update_view;
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
