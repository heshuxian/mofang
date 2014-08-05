<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	var $user = null;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mp_master');
		if(!User::IsAuthenticated())
		{
			redirect('/login');
		}
		$this->user = User::GetCurrentUser();
		$this->load->model('mp_pandora');
	}

	public function index()
	{
		$data = array();
		$data['actLi'] = "index";
		$content = $this->load->view('account/index', $data, TRUE);
		$this->mp_master->Show($content, "", "主页" , $data);
	}
	public function usermanage()
	{
		if($this->user->user_role !== 'admin')
		{
			show_404();
		}
		$data = array();
		$data['actLi'] = 'usermanage';

		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('txtId','用户ID','trim|required');
			$this->form_validation->set_rules('txtUserFullName',"用户名称",'trim|required');
			$this->form_validation->set_rules('selUserrole',"用户类型",'trim|required');
			$this->form_validation->set_rules('txtEmail',"邮箱地址",'trim|required');
			if ($this->form_validation->run() == TRUE)
			{
				$id = $this->input->post('txtId');
				$userFullName = $this->input->post('txtUserFullName');
				$userRole = $this->input->post('selUserrole');
				$email = $this->input->post('txtEmail');
				$password = $this->input->post('txtPassword');

				if($password != FALSE)
				{
					User::UpdateUserPasswd($id,$password);
				}
				if(User::UpdateUserinfo($id,$userFullName,$userRole,$email))
				{
					$data['success_msg'] = '修改用户信息'.$userFullName.'成功';
				}else{
					$data['error_msg'] = '修改用户信息'.$userFullName.'失败';
				}
			}
		}
		$data['userList'] = $userList = $this->mp_pandora->Get_UserList();
		$content = $this->load->view('account/usermanage', $data, TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/js/account/usermanage.js"></script>';
		$this->mp_master->Show($content, $scriptExtra , "用户管理" , $data);
	}
	public function deleteuser()
	{
		$jsonRet = array();
		if($this->user->user_role != 'admin'){
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = '您没有权限进行此操作';
		}else{
			$user_id = $this->input->post('user_id');
			$ret = User::DeleteUser($user_id);
			if($ret){
				$json['ret'] = 0;
			}
			else{
				$jsonRet['ret'] = 1;
				$jsonRet['msg'] = '删除失败';
			}
		}
		echo json_encode($jsonRet);
		return;
	}

	public function getuserinfo()
	{
		$jsonRet = array();
		if($this->user->user_role != 'admin'){
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = '没有权限进行此操作';
			echo json_encode($jsonRet);
			return;
		}
		$user_id = $this->input->get('user_id');
		$userObj = User::GetUserById($user_id);
		if($userObj != null)
		{
			$jsonRet['ret'] = 0;
			$jsonRet['html'] = $this->load->view('/account/edituserinfo',array('userObj' =>$userObj),TRUE);
		}else{
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = '获取用户信息失败，无法编辑用户信息';
		}
		echo json_encode($jsonRet);
		return;
	}
	function adduser()
	{
		$data = array();
		$data['actLi'] = 'usermanage';
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library('form_validation');
			$this->form_validation->set_rules('txtUsername',"用户登陆名",'trim|required');
			$this->form_validation->set_rules('txtUserFullName',"用户全名",'trim|required');
			$this->form_validation->set_rules('selUserrole',"用户类型",'trim|required');
			$this->form_validation->set_rules('txtEmail',"邮箱地址",'trim|required');
			if ($this->form_validation->run() == TRUE)
			{
				$username = $this->input->post('txtUsername');
				$password = $this->input->post('txtPassword');
				$userFullName = $this->input->post('txtUserFullName');
				$userRole = $this->input->post('selUserrole');
				$email = $this->input->post('txtEmail');
				$password = $this->input->post('txtPassword');
				if(User::CreateUser($username,$password,$userFullName,$userRole,$email)){
					redirect('/account/usermanage');
				}else{
					$data['error_msg'] = '创建用户失败，请重试';
				}
			}else{
				$data['error_msg'] = '填写信息不全，创建失败';
			}
		}
		$content = $this->load->view('account/adduser', $data, TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/theme/scripts/jquery-validation/dist/jquery.validate.min.js"></script>';
		$scriptExtra .= '<script type="text/javascript" src="/public/js/account/adduser.js"></script>';
		$this->mp_master->Show($content, $scriptExtra , "添加用户" , $data);
	}

	function checkaccount()
	{
		$username = $this->input->get('txtUsername');
		if(empty($username))
		{
			echo 'false';
			return;
		}
		$user = User::GetUser($username);
		echo $user == null? 'true' :'false';
		return;
	}
	
	public function rolemanage()
	{
		$data = array();
		$data['actLi'] = 'rolemanage';
		$data['userList'] = $userList = $this->mp_smartmeter->Get_UserList();
		$data['stationList'] = $stationList = $this->mp_smartmeter->Get_StationList();
		$content = $this->load->view('account/rolemanage', $data, TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/js/account/rolemanage.js"></script>';
		$this->mp_master->Show($content, $scriptExtra, "监控管理" , $data);
	}
	public function logout()
	{
		User::LogOutUser();
		redirect('/login');
	}
}
