<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
	//перегляд всіх новин
	public function get_news($num, $offset)
	{	
		$this->db->cache_on();//на багатьох форумах писали, що CI не підтримує prepared statement, тому я використала кешування 
		$this->db->order_by('paper_id','desc');
        $query = $this->db->get('papers', $num, $offset);
        return $query->result_array();
    }
	
	//перегляд однієї новини
	public function get_new($paper_id)
	{
		$this->db->cache_on();
	    $query = $this->db->get_where('papers', array('paper_id' => $paper_id));
		return $query->row_array();
	}
	
	//вибірка п'яти новин з тегами обраної новини
	public function get_five($paper_id)
	{
		$this->db->cache_on();
		$query = $this->db->get_where('paper_tags', array('paper_id' => $paper_id));
		$query = $query->result_array();
		
		
		$text = 'pt.tag_id="'.$query[0]['tag_id'].'"';
		for($i=1; $i<count($query); ++$i)
		{
			$text.=' or pt.tag_id="'.$query[$i]['tag_id'].'"';
		}
		
		$result = $this->db->query("SELECT DISTINCT p.paper_id, p.paper_head, p.paper_image FROM papers AS p, paper_tags as pt WHERE (".$text.")and p.paper_id!=".$paper_id." and p.paper_id = pt.paper_id ORDER BY paper_id DESC LIMIT 5");
		return $result->result_array();
		
	}
	
	//вибірка тегів
	public function get_tags()
	{
		$this->db->cache_on();
		$query = $this->db->get('tags');
		return $query->result_array();
	}
	
	//вибірка новин за тегом
	public function get_news_by_tag($id)
	{
		$this->db->cache_on();
		$query = $this->db->query("SELECT p.paper_id, p.paper_head, p.paper_short, p.paper_image FROM papers AS p, paper_tags as pt WHERE pt.tag_id=".$id." and p.paper_id = pt.paper_id ORDER BY paper_id DESC");
		return $query->result_array();
	}
	
	//один тег
	public function get_tag_name($id)
	{
		$this->db->cache_on();
		$query = $this->db->get_where('tags', array('tag_id '=> $id));
		$query = $query->row_array();
		return $query['tag_name'];
	}

}
