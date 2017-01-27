<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	//перегляд всіх новин
	public function get_news($num, $offset)
	{	
        $query = $this->db->get('papers', $num, $offset);
        return $query->result_array();
    }
	
	//перегляд однієї новини
	public function get_new($paper_id)
	{
	    $query = $this->db->get_where('papers', array('paper_id' => $paper_id));
		return $query->row_array();
	}

}
