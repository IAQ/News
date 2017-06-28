<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

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
        $this->load->view('register');
	}

	public function register()
	{
		$this->form_validation->set_rules('id', 'Id', 'trim|required|min_length[6]|is_unique[user.id]',
			array('required' => '用户名必填!',
				  'min_length' => '用户名最少为6字节!',
                  'is_unique' => '用户名已存在!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
			array('required' => '密码必填!',
				  'min_length' => '密码最少为6字节!'));
        $this->form_validation->set_rules('password-confirm', 'Password-confirm', 'trim|required|matches[password]',
            array('required' => '确认密码必填!',
                  'min_length' => '密码最少为6字节!',
                  'matches' => '两次输入密码不一致!'));
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]',
            array('required' => '邮箱必填!',
                  'valid_email' => '邮箱格式错误!',
                  'is_unique' => '邮箱已被使用!'));

		if ($this->form_validation->run() == FALSE)
        {

                $this->index();	        
        }
        else
        {
        	$id = $this->input->post('id');
            $password = $this->input->post('password');
            $email = $this->input->post('email');

            $this->users_model->save($id,$password,$email);
            $this->users_tag->init($id);

            $this->session->set_userdata('user_id',$id);
            $this->session->set_userdata('user_email',$email);
            redirect('/Update/index','refresh');
        }


	}
}