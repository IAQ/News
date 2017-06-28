<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class getNews extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url_helper');
		$this->load->library('session');
	}
	
	public function index()
	{
		$data = array(
				'title' => $this->input->post('title'), 
				'author' => $this->input->post('author'),
				'date' => $this->input->post('date'),
				'body' => $this->input->post('body'),
				'tag' => $this->input->post('tag')
				);
        $this->load->view('templates/header.php');
        $this->load->view('news',$data);
	}

}