<?php
class My_model extends Model {
	function My_model() {
        parent::Model();
        $this->load->database();
	}
	function get_people() {
		static $query;
		$this->db->select('title, start,end');
		$query = $this->db->get('events');
		#If you don't want to use acrtive record then you can write your own querys aswell
		#example: $query = $this->db->query('SELECT id, name FROM people');
 
		if($query->num_rows() > 0) return $query->result();
		else return FALSE;
	}
 
}
 
/* End of file my_model.php */
/* Location: ./system/application/models/my_model.php */