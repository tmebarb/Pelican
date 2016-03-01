<?
function jsonEvents ()
{       $this->db->order_by('startDate', 'desc');
        $this->db->limit(10);
        return $this->db->get('calendar');}   
    }
    ?>