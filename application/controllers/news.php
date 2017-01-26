<?php
class News extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    public function index()
    {
    $data['news'] = $this->news_model->get_news();
    $data['title'] = "Новини";

    $this->load->view('header', $data);
    $this->load->view('news', $data);
    $this->load->view('footer');
    }

public function view($paper_id = 0)
{
    $data['news'] = $this->news_model->get_news($paper_id);

    if (empty($data['news']))
    {
        show_404();
    }

    if($paper_id=0)
	{
		$data['title'] = 'Новини';
	    $this->load->view('header', $data);
		$this->load->view('news', $data);
	}
	else
	{
		$data['title'] = $data['news']['paper_head'];
		$this->load->view('header', $data);
		$this->load->view('new', $data);
	}
		$this->load->view('footer');
}
}