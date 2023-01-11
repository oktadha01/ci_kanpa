<?php
class M_news extends CI_Model
{
    function m_data_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->ORDER_BY('id_berita', 'desc');
        // $this->db->ORDER_BY('id_berita', 'RANDOM');
        // $this->db->LIMIT(2);
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_perum()
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('status_perum', 'Direkomendasikan');
        // $this->db->ORDER_BY('order_perum', 'asc');
        $this->db->ORDER_BY('id_perum', 'RANDOM');
        $this->db->LIMIT(2);
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
