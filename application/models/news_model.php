<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();// or die("dick");
    }
	
	public function get_news($paper_id = 0)
{
    if ($paper_id == 0)
    {
        $query = $this->db->get('papers');
        return $query->result_array();
    }

    $query = $this->db->get_where('papers', array('paper_id' => $paper_id));
    return $query->row_array();
}
}