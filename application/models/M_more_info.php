<?php
class M_more_info extends CI_Model
{

    function m_data_more_info()
    {
        $this->db->select('*');
        $this->db->from('perum');
        $this->db->Join('marketperum', 'marketperum.id_marketperum = perum.id_perum');
        $this->db->Join('marketing', 'marketing.id_marketing = marketperum.idmarketing');
        $this->db->where('marketperum.status_marketperum', 'aktif');
        $this->db->ORDER_BY('order_perum', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_cs()
    {
        $this->db->select('*');
        $this->db->from('marketing');
        $this->db->Join('marketperum', ' marketperum.idmarketing = marketing.id_marketing ');
        $this->db->where('marketing.id_marketing', '10');
        $query = $this->db->get();
        return $query->result();
    }
}
