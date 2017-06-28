<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
        $this->load->model('users_tag');
		$this->load->helper('url_helper');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger alert-dismissible" role="alert" id="alert">', '</div>');
		$this->load->library('session');
	}
	
	public function index()
	{
        $this->load->view('templates/header.php');
        $this->load->view('login');
	}

	public function login()
	{
		$this->form_validation->set_rules('id', 'Id', 'trim|required|min_length[6]',
			array('required' => '用户名必填!',
				  'min_length' => '用户名最少为6字节!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
			array('required' => '密码必填!',
				  'min_length' => '密码最少为6字节!'));


		if ($this->form_validation->run() == FALSE)
        {
        	$this->load->view('templates/header.php');
            $this->load->view('Login');
        }
        else
        {
        	$id = $this->input->post('id');
        	if($this->users_model->checkid($id))
        	{
        		$psd = $this->input->post('password');
        		if($this->users_model->checkpsd($id,$psd))
        		{

        			$this->session->set_userdata('user_id',$id);
                    $tag = $this->users_tag->getTag($id);
                    $this->session->set_userdata('car',$tag->car);
                    $this->session->set_userdata('eco',$tag->eco);
                    $this->session->set_userdata('ent',$tag->ent);
                    $this->session->set_userdata('head',$tag->head);
                    $this->session->set_userdata('native',$tag->native);
                    $this->session->set_userdata('society',$tag->society);
                    $this->session->set_userdata('sports',$tag->sports);
                    $this->session->set_userdata('tech',$tag->tech);
                    $this->session->set_userdata('war',$tag->war);
                    $this->session->set_userdata('world',$tag->world);
        			redirect('/Update/index','refresh');
        		}
        		else
        		{
        			$data['login_error'] = '用户名或者密码错误';
        			$this->load->view('templates/header.php');
        			$this->load->view('Login',$data);

        		}
        	}
        	else
        	{
        		$data['login_error'] = '用户名不存在';
        		$this->load->view('templates/header.php');
        		$this->load->view('Login',$data);
        	}
        }
	}
}