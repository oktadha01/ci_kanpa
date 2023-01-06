<?php
class M_dashboard extends CI_Model
{

    function m_data_fotoslide()
    {
        $this->db->select('*');
        $this->db->from('foto');
        $this->db->where('label_foto', 'dashboard');
        $this->db->ORDER_BY('id_foto', 'RANDOM');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_perum()
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->where('status_perum', 'Direkomendasikan');
        $this->db->ORDER_BY('order_perum', 'asc');
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
    function m_data_berita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->ORDER_BY('id_berita', 'desc');
        $this->db->LIMIT(4);
        $query = $this->db->get();
        return $query->result();
    }

    function m_detail_marketing()
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->where('nm_marketing', 'Customer Service');
        $this->db->Join('marketperum', 'marketperum.idmarketing = marketing.id_marketing');
        // $this->db->Join('marketing', 'marketing.id_marketing = marketperum.idmarketing');
        $query = $this->db->get();
        return $query->result();
    }
}
