<?php
class M_berita extends CI_Model
{

    
    function m_data_berita()
    {

        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('id_berita', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_artikel_berita($id_berita)
    {
        $this->db->select('*');
        $this->db->from('data_berita');
        $this->db->where('berita_id', $id_berita);
        // $this->db->order_by('id_data_berita', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto_berita($id_berita)
    {
        $this->db->select('*');
        $this->db->from('foto_berita');
        // $this->db->where('data_berita_id', $id_berita);
        // $this->db->order_by('id_data_berita', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_add_content($data)
    {
        $result = $this->db->insert('data_berita', $data);
        return $result;
    }
    function m_simpan_foto_berita($data_berita_id, $file_foto_berita)
    {
        $data = array(
            'data_berita_id' => $data_berita_id,
            'file_foto_berita' => $file_foto_berita,
        );
        $result = $this->db->insert('foto_berita', $data);
        return $result;
    }
    function m_delete_foto_berita($id_foto_berita)
    {
        $delete = $this->db->where('id_foto_berita', $id_foto_berita)
            ->delete('foto_berita');
        return $delete;
    }
    function m_simpan_data_berita($judul_berita, $tgl_berita, $foto_berita , $tag_berita)
    {
        $data = array(
            'judul_berita' => $judul_berita,
            'tgl_berita' => $tgl_berita,
            'tag_berita' => $tag_berita,
            'foto_berita' => $foto_berita,
        );
        $result = $this->db->insert('berita', $data);
        return $result;
    }

    function m_edit_content($id_data_berita, $text_berita)
    {
        $update = $this->db->set('text_berita', $text_berita)
            ->where('id_data_berita', $id_data_berita)
            ->update('data_berita');
        return $update;
    }
    function m_edit_data_foto_berita($id_berita, $judul_berita, $tgl_berita, $foto_berita,$tag_berita)
    {
        $update = $this->db->set('judul_berita', $judul_berita)
            ->set('tgl_berita', $tgl_berita)
            ->set('tag_berita', $tag_berita)
            ->set('foto_berita', $foto_berita)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update;
    }
    function m_edit_berita($id_berita, $judul_berita, $tgl_berita, $tag_berita)
    {
        $update = $this->db->set('judul_berita', $judul_berita)
            ->set('tgl_berita', $tgl_berita)
            ->set('tag_berita', $tag_berita)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update;
    }

    function m_delete_berita($id_berita)
    {
        $delete = $this->db->where('id_berita', $id_berita)
            ->delete('berita');
        return $delete;
    }
}
