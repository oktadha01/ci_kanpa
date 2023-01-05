<?php
class M_produk extends CI_Model
{

    function m_data_perum()
    {
        $this->db->select('*');
        $this->db->from('perum');

        // $this->db->where('label_foto', 'dashboard');
        $this->db->Join('tipe', 'tipe.id_tipe_perum = perum.id_perum');
        $this->db->ORDER_BY('id_perum', 'desc');
        // $this->db->ORDER_BY('id_perum', 'RANDOM');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tipe()
    {
        $this->db->select('*');
        $this->db->from('tipe');
        $this->db->ORDER_BY('luas_bangunan', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    
}
