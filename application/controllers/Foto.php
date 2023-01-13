<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Foto extends CI_Controller
{
    public $load;
    public $m_foto;
    public $input;
    public $upload;
    public $image_lib;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_foto');
    }

    function index()
    {
        $data['_title'] = 'Data Foto Perumahan';
        $data['_script'] = 'foto/foto_js';
        $data['_view'] = 'foto/foto';
        $data['data_perum'] = $this->m_foto->m_data_perum();
        $data['data_tipe'] = $this->m_foto->m_data_tipe();
        $this->load->view('layout/index', $data);
    }

    function data_foto_perum()
    {
        $id_foto_tipe = $this->input->post('id-foto-tipe');
        $data['data_foto'] = $this->m_foto->m_data_foto_perum($id_foto_tipe);
        $data['_view'] = 'foto/data_foto';
        $this->load->view('foto/data_foto', $data);
    }
    function add_foto()
    {
        $config['upload_path'] = "./upload/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("foto-tipe")) {
            $data = array('upload_data' => $this->upload->data());
            $id_foto_tipe = $this->input->post('id-foto-tipe');
            $label_foto = $this->input->post('label-foto');
            $foto_tipe = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();
            $data = array(
                'id_foto_tipe' => $id_foto_tipe,
                'foto_tipe' => $foto_tipe,
                'label_foto' => $label_foto,
            );
            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_foto->m_add_foto($data);
            echo json_encode($insert);
        }
        exit;
    }
    function edit_foto()
    {
        $action = $this->input->post('action');
        if ($action == 'ubah-foto') {
            $foto_tipe_lama = $this->input->post('foto-tipe-lama');
            unlink('./upload/' . $foto_tipe_lama);

            $config['upload_path'] = "./upload/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload("foto-tipe")) {
                $data = array('upload_data' => $this->upload->data());
                $id_foto = $this->input->post('id-foto');
                $label_foto = $this->input->post('label-foto');
                $foto_tipe = $data['upload_data']['file_name'];
                $uploadedImage = $this->upload->data();

                $this->resizeImage($uploadedImage['file_name']);
                $insert = $this->m_foto->m_edit_foto($id_foto, $foto_tipe, $label_foto);
                echo json_encode($insert);
            }
        } else {
            $id_foto = $this->input->post('id-foto');
            $label_foto = $this->input->post('label-foto');
            $insert = $this->m_foto->m_edit_label_foto($id_foto, $label_foto);
            echo json_encode($insert);
        }
        exit;
    }
    function delete_foto()
    {
        $foto_tipe = $this->input->post('foto-tipe');
        unlink('./upload/' . $foto_tipe);

        $id_foto = $this->input->post('id-foto');
        $delete = $this->m_foto->m_delete_foto($id_foto);
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
            'width' => '1440',
            'height' => 'auto',
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
    // function add_data_tipe()
    // {
    //     $data = array(
    //         'id_tipe_perum' => $this->input->post('id-tipe-perum'),
    //         'lantai' => $this->input->post('lantai'),
    //         'luas_tanah' => $this->input->post('luas-tanah'),
    //         'luas_bangunan' => $this->input->post('luas-bangunan'),
    //         'hrg' => $this->input->post('hrg'),
    //         'satuan_hrg' => $this->input->post('satuan-hrg'),
    //         'promo' => $this->input->post('promo'),
    //         'balkon' => $this->input->post('balkon'),
    //         'taman' => $this->input->post('taman'),
    //         'carport' => $this->input->post('carport'),
    //         'r_tamu' => $this->input->post('r-tamu'),
    //         'r_keluarga' => $this->input->post('r-keluarga'),
    //         'k_tidur' => $this->input->post('k-tidur'),
    //         'k_mandi' => $this->input->post('k-mandi'),
    //         'r_makan' => $this->input->post('r-makan'),
    //         'dapur' => $this->input->post('dapur'),
    //     );

    //     $insert = $this->m_tipe->m_add_data_tipe($data);
    //     echo json_encode($insert);
    // }
    // function edit_data_tipe()
    // {

    //     $id_tipe = $this->input->post('id-tipe');
    //     $lantai = $this->input->post('lantai');
    //     $luas_tanah = $this->input->post('luas-tanah');
    //     $luas_bangunan = $this->input->post('luas-bangunan');
    //     $hrg = $this->input->post('hrg');
    //     $satuan_hrg = $this->input->post('satuan-hrg');
    //     $promo = $this->input->post('promo');
    //     $balkon = $this->input->post('balkon');
    //     $taman = $this->input->post('taman');
    //     $carport = $this->input->post('carport');
    //     $r_tamu = $this->input->post('r-tamu');
    //     $r_keluarga = $this->input->post('r-keluarga');
    //     $k_tidur = $this->input->post('k-tidur');
    //     $k_mandi = $this->input->post('k-mandi');
    //     $r_makan = $this->input->post('r-makan');
    //     $dapur = $this->input->post('dapur');


    //     $update = $this->m_tipe->m_edit_data_tipe($lantai, $luas_tanah, $luas_bangunan, $hrg, $satuan_hrg, $promo, $balkon, $taman, $carport, $r_tamu, $r_keluarga, $k_tidur, $k_mandi, $r_makan, $dapur, $id_tipe);
    //     echo json_encode($update);
    // }

    // function delete_denah()
    // {
    //     $denah_lama = $this->input->post('deneh-lama');
    //     unlink('./upload/' . $denah_lama);

    //     $action = $this->input->post('action');
    //     $id_tipe = $this->input->post('id-tipe');
    //     $denah = $this->input->post('nm-denah');
    //     $delete = $this->m_tipe->m_add_denah_tipe($id_tipe,  $denah, $action);
    //     echo json_encode($delete);
    // }

}
