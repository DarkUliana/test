<?php
class Pages extends CI_Controller {

	public function view($page = 'home')
	{
			if ( ! file_exists('application/views/pages/'.$page.'.php'))
	{
		// ”пс, у нас нет такой страницы!
		show_404();
	}

	$data['title'] = ucfirst($page); // —делать первую букву заглавной

	$this->load->view('header', $data);
	$this->load->view('pages/'.$page, $data);
	$this->load->view('footer', $data);
	}
}
