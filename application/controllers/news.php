<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

	//перегляд всіх новин з пагінацією
	public function view()
	{
		$config['base_url'] = '/test/index.php/news/view';
		$config['total_rows'] = $this->db->count_all_results('papers');
		$config['per_page'] = 3; 
		$config['full_tag_open'] = '<div>';
		$config['full_tag_close'] = '</div>';

		$this->pagination->initialize($config);
		$data['news'] = $this->news_model->get_news($config['per_page'], $this->uri->segment(3));
		$data['title'] = 'Новини';
	    $this->load->view('header', $data);
		$this->load->view('news', $data);

		$this->load->view('footer');
	}
	
	//перегляд обраної новини
	public function page($paper_id )
	{
		$data['news'] = $this->news_model->get_new($paper_id);
		$data['title'] = $data['news']['paper_head'];
		$this->load->view('head_with_js', $data);
		$this->load->view('new', $data);
		$this->load->view('five_news', $data);
		$this->load->view('footer');

	}
	
	//вибірка п'яти новин з тегами обраної новини
	public function five()
	{
			$text = $this->input->post('id');
			$data['five'] = $this->news_model->get_five($text);
			echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}
}
