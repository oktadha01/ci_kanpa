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
    function m_simpan_data_berita($judul_berita, $tgl_berita,  $desk_berita, $foto_berita)
    {
        $data = array(
            'judul_berita' => $judul_berita,
            'tgl_berita' => $tgl_berita,
            'desk_berita' => $desk_berita,
            'foto_berita' => $foto_berita,
        );
        $result = $this->db->insert('berita', $data);
        return $result;
    }

    function m_edit_data_foto_berita($id_berita, $judul_berita, $tgl_berita, $desk_berita, $foto_berita)
    {
        $update = $this->db->set('judul_berita', $judul_berita)
            ->set('tgl_berita', $tgl_berita)
            ->set('desk_berita', $desk_berita)
            ->set('foto_berita', $foto_berita)
            ->where('id_berita', $id_berita)
            ->update('berita');
        return $update;
    }
    function m_edit_berita($id_berita, $judul_berita, $tgl_berita, $desk_berita)
    {
        $update = $this->db->set('judul_berita', $judul_berita)
            ->set('tgl_berita', $tgl_berita)
            ->set('desk_berita', $desk_berita)
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
