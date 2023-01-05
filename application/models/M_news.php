<?php
class M_news extends CI_Model
{
    function m_data_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->ORDER_BY('id_berita', 'desc');
        // $this->db->LIMIT(4);
        $query = $this->db->get();
        return $query->result();
    }
}
