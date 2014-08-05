<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Portal extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mp_pandora');
		$this->load->model('mp_master');
	}

	public function index()
	{
		$this->login();
	}
	public function login()
	{
		$data = array();
		$data['site_name'] =  $this->config->item('site_name');
		$data['pageTitle'] = '登录';
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('txtUsername','用户名','trim|required');
			$this->form_validation->set_rules('txtPassword', "密码",'required');
			if ($this->form_validation->run())
			{
				$username = $this->input->post('txtUsername');
				$password = $this->input->post('txtPassword');
				if(User::LogInUser($username, $password))
				{
					redirect("/account");
				}else{
					$data['msg'] = "您的用户名密码不匹配!";
				}
			}
			$data['msg'] = "登录失败";
		}
		$data['scriptExtra'] = '<script type="text/javascript" src="/public/js/jquery.validate.min.js"></script>';
		$data['scriptExtra'] .= '<script type="text/javascript" src="/public/js/login.js"></script>';
		$this->load->view('login',$data);
	}
}
