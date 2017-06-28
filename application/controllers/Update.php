<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Update extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->model('rss_model');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	public function index()
	{

		$data['news'] = $this->news_model->get_news("head");
        $data['tag'] = 'head';
        $this->load->view('templates/header.php');
        $this->load->view('news_list',$data);

	}

	public function update($tag)
	{

		$data['news'] = $this->news_model->get_news($tag);
        $data['tag'] = $tag;
        $this->load->view('templates/header.php');
        $this->load->view('news_list',$data);
	}

	public function updatee()
	{
		$tags = array("car", "eco", "ent", "head", "native", "society", "sports", "tech", "war", "world");
		foreach ($tags as $tag) {
			$rss = $this->rss_model->get_rss($tag);
			$urls = explode(",", $rss->url);
			foreach ($urls as $url) {
				$this->news_model->save($url,$tag);
			}
		}
	}

}