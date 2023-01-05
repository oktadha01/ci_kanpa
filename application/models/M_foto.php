<?php
class M_foto extends CI_Model
{

    function m_data_perum()
    {

        $this->db->select('*');
        $this->db->from('perum');
        $this->db->order_by('id_perum', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tipe()
    {

        $this->db->select('*');
        $this->db->from('perum');
        $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
        $this->db->order_by('tipe.id_tipe', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto_perum($id_foto_tipe)
    {
        $this->db->select('*');
        $this->db->from('foto');
        $this->db->where('id_foto_tipe', $id_foto_tipe);
        $this->db->order_by('id_foto', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_add_foto($data)
    {
        $result = $this->db->insert('foto', $data);
        return $result;
    }
    function m_edit_foto($id_foto, $foto_tipe, $label_foto)
    {
        $update = $this->db->set('foto_tipe', $foto_tipe)
            ->set('label_foto', $label_foto)
            ->where('id_foto', $id_foto)
            ->update('foto');
        return $update;
    }
    function m_edit_label_foto($id_foto, $label_foto)
    {
        $update = $this->db->set('label_foto', $label_foto)
            ->where('id_foto', $id_foto)
            ->update('foto');
        return $update;
    }
    function m_delete_foto($id_foto)
    {
        $delete = $this->db->where('id_foto', $id_foto)
            ->delete('foto');
        return $delete;
    }
    


}
