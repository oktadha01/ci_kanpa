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
        $query = $this->db->get();
        return $query->result();
    }
    
    
}
