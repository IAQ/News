<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class userManage extends CI_Controller {

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
		$data['id'] = $_SESSION['user_id'];
		$data['email'] = $this->users_model->getEmail($data['id'])->email;
		$this->session->set_userdata('user_email',$data['email']);
		$this->load->view('templates/header.php');
		$this->load->view('userManage',$data);
	}

	public function editIndex($edit_error,$flag,$edit_success)
	{
		$data['id'] = $_SESSION['user_id'];
		$data['email'] = $this->users_model->getEmail($data['id'])->email;
		$data['edit_flag'] = $flag;
		if(!empty($edit_error))
			$data['edit_error'] = $edit_error;
		if(!empty($edit_success))
			$data['edit_success'] = $edit_success;
		$this->session->set_userdata('user_email',$data['email']);
		$this->load->view('templates/header.php');
		$this->load->view('userManage',$data);

	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('/Update/index','refresh');
	}

	public function editAccount()
	{
		$this->form_validation->set_rules('password', 'Password', 'trim');
		$this->form_validation->set_rules('password-confirm', 'Password-confirm', 'trim|matches[password]',
			array('matches' => '两次输入密码不一致!'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
			array('required' => '邮箱必填!',
				'valid_email' => '邮箱格式错误!'
				));


		if ($this->form_validation->run() == FALSE)
		{
			$this->editIndex("",'true',"");	        
		}
		else
		{
			$edit_error = "";
			$edit_success = "";
			$id = $_SESSION['user_id'];
			$password = $this->input->post('password');
			$email = $this->input->post('email');
			if(empty($password))
			{
				if($email != $_SESSION['user_email'])
				{
					echo $email;
					if($this->users_model->checkemail($email))
						{
							$this->users_model->updateE($id,$email);
							$edit_success = '邮箱更改成功!';
						}
					else
						$edit_error = '邮箱已被使用!';
				}
			}
			else if(strlen($password)<6)
			{
				$edit_error = '密码最少为6字节!';
			}
			else 
			{

				if($email == $_SESSION['user_email'])
					{
						$this->users_model->updateP($id,$password);
						$edit_success = '密码修改成功!';
					}
				else
				{
					if($this->users_model->checkemail($email))
					{
						$this->users_model->updateEAndP($id,$password,$email);
						$edit_success = '密码和邮箱修改成功!';
					}
					else
						$edit_error = '邮箱已被使用!';
				}


			}

			if(empty($edit_error))
			{
				$this->session->set_userdata('user_email',$email);
				$this->editIndex("",'false',$edit_success);
			}
			else
				$this->editIndex($edit_error,'true',"");

		}


	}

	public function editColoum()
	{
		$like = $this->input->post('like');

		$data = array(
			'id' => $_SESSION['user_id'],
			'head' => '0',
			'native' => '0',
			'world' => '0',
			'eco' => '0',
			'sports' => '0',
			'ent' => '0',
			'war' => '0',
			'car' => '0',
			'tech' => '0',
			'society' => '0',
			);

		for($i=0; $i<count($like); ++$i)
		{
			if($like[$i] == 'head')
				$data['head'] = '1';
			if($like[$i] == 'native')
				$data['native'] = '1';
			if($like[$i] == 'world')
				$data['world'] = '1';
			if($like[$i] == 'eco')
				$data['eco'] = '1';
			if($like[$i] == 'sports')
				$data['sports'] = '1';
			if($like[$i] == 'ent')
				$data['ent'] = '1';
			if($like[$i] == 'war')
				$data['war'] = '1';
			if($like[$i] == 'car')
				$data['car'] = '1';
			if($like[$i] == 'tech')
				$data['tech'] = '1';
			if($like[$i] == 'society')
				$data['society'] = '1';
		}
 
		$this->session->set_userdata('car',$data['car']);
        $this->session->set_userdata('eco',$data['eco']);
        $this->session->set_userdata('ent',$data['ent']);
        $this->session->set_userdata('head',$data['head']);
        $this->session->set_userdata('native',$data['native']);
        $this->session->set_userdata('society',$data['society']);
        $this->session->set_userdata('sports',$data['sports']);
        $this->session->set_userdata('tech',$data['tech']);
        $this->session->set_userdata('war',$data['war']);
        $this->session->set_userdata('world',$data['world']);
		$this->users_tag->update($data);
		$this->editIndex("","","栏目设置成功!");

	}
}