<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

const DEFAULT_PAGE_SIZE = 20;
class Account extends CI_Controller {
	var $user = null;
	var $article_type = array("老师风采","行业动态","课程介绍","活动相关","学员感悟","俱乐部","老师观点");
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
	public function articlemanage()
	{
		$data = array();
		$data['actLi'] = "article";
		$data['typeArr'] = $this->article_type;
		$count = $this->mp_pandora->Get_ArticleListCount();
		$data['offset'] = $offset = intval($this->input->get('per_page'));
		$data['articleList'] = $this->mp_pandora->Get_ArticleList(FALSE, DEFAULT_PAGE_SIZE, $offset);
		$this->load->model('mp_paging');
		$data['pagination'] = $this->mp_paging->Show_Account(site_url('account/articlemanage?'),$count,DEFAULT_PAGE_SIZE,3,TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/js/article_manage.js"></script>';
		$content = $this->load->view('account/article_manage', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	public function imagemanage()
	{
		$data = array();
		$data['actLi'] = "image";
		$count = $this->mp_pandora->Get_ImageListCount();
		$data['offset'] = $offset = intval($this->input->get('per_page'));
		$data['imageList'] = $this->mp_pandora->Get_ImageList(DEFAULT_PAGE_SIZE, $offset);
		$this->load->model('mp_paging');
		$data['pagination'] = $this->mp_paging->Show_Account(site_url('account/imagemanage?'),$count,DEFAULT_PAGE_SIZE,3,TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/js/image_manage.js"></script>';
		$content = $this->load->view('account/image_manage', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	public function cooperationmanage()
	{
		$data = array();
		$data['actLi'] = "cooperation";
		$this->load->model('mp_paging');
		$count = $this->mp_pandora->Get_CooperationListCount();
		$data['offset'] = $offset = intval($this->input->get('per_page'));
		$data['cooperationList'] = $this->mp_pandora->Get_cooperationList(DEFAULT_PAGE_SIZE, $offset);
		$data['pagination'] = $this->mp_paging->Show_Account(site_url('account/cooperationmanage?'),$count,DEFAULT_PAGE_SIZE,3,TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/js/cooperation_manage.js"></script>';
		$content = $this->load->view('account/cooperation_manage', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	public function friendshipmanage()
	{
		$data = array();
		$data['actLi'] = "friendship";
		$this->load->model('mp_paging');
		$count = $this->mp_pandora->Get_FriendshipListCount();
		$data['offset'] = $offset = intval($this->input->get('per_page'));
		$data['friendshipList'] = $this->mp_pandora->Get_friendshipList(DEFAULT_PAGE_SIZE, $offset);
		$data['pagination'] = $this->mp_paging->Show_Account(site_url('account/friendshipmanage?'),$count,DEFAULT_PAGE_SIZE,3,TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/js/friendship_manage.js"></script>';
		$content = $this->load->view('account/friendship_manage', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	// 	public function coursemanage()
	// 	{
	// 		$data = array();
	// 		$data['actLi'] = "course";
	// 		$data['courseTypeList'] = $this->mp_pandora->Get_CourseTypeList();
	// 		$scriptExtra = '<script type="text/javascript" src="/public/js/course_manage.js"></script>';
	// 		$content = $this->load->view('account/course_manage', $data, TRUE);
	// 		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	// 	}
	public function addarticle()
	{
		$data = array();
		// 		$course_id = 0;
		$img_name = '';
		$data['actLi'] = "article";
		$data['typeList'] = $this->article_type;
		//		$data['courseTypeList'] = $this->mp_pandora->Get_CourseTypeList();
		$id = $this->input->get('article_id');
		if($id){
			$data['articleObj'] = $this->mp_pandora->Get_ArticleById($id);
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library('form_validation');
			$id = $this->input->post('txtId');

			$this->form_validation->set_rules('selArticleType',"文章类型",'trim|required');
			$this->form_validation->set_rules('txtTitle',"标题",'trim|required');
			$this->form_validation->set_rules('txtContent',"内容",'trim|required');
			if($this->form_validation->run() == TRUE){
				$type_id = trim($this->input->post("selArticleType"));
				$title = trim($this->input->post("txtTitle"));
				$content = trim($this->input->post("txtContent"));
				$img_name = trim($this->input->post("txtImgLink"));
				$author = trim($this->input->post("txtAuthor"));
				// 				if($type_id == 2)
				// 					$course_id = $this->input->post("selCourseType");
			}
			$currentUser = User::GetCurrentUser();
			$manager = $currentUser->full_name;
			if($id){
				if($this->mp_pandora->Update_ArticleInfo($id,$type_id,$title,$content,$manager,$img_name,$author/*,$course_id*/))
				redirect("/account/articlemanage");
				else
				$data['error_msg'] = "更新文章信息失败，请重试！";
			}else
			{
				if($this->mp_pandora->Creat_Article($type_id,$title,$content,$manager,$img_name,$author/*,$course_id*/))
				redirect("/account/articlemanage");
				else
				$data['error_msg'] = "新建文章失败，请重试！";
			}
		}
		$scriptExtra = '<script type="text/javascript" src="/public/js/jquery.validate.min.js"></script>';
		$scriptExtra .= '<script type="text/javascript" src="/public/js/add_article.js"></script>';
		$content = $this->load->view('account/add_article', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	public function deletearticle()
	{
		$jsonRet = array();
		$article_id = $this->input->post('article_id');
		if($this->mp_pandora->Delete_Article($article_id))
		{
			$jsonRet['ret'] = 0;
		}else{
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = '删除失败';
		}
		echo json_encode($jsonRet);
		return;
	}
	public function addimage()
	{
		$data = array();
		$data['actLi'] = "image";
		$image_id = $this->input->get('image_id');
		if($image_id){
			$data['imageObj'] = $this->mp_pandora->Get_ImageById($image_id);
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library('form_validation');
			$image_id = trim($this->input->post('txtId'));

			$this->form_validation->set_rules('txtImgName',"合作机构链接",'trim|required');
			if($this->form_validation->run() == TRUE){
				$img_name = trim($this->input->post("txtImgName"));
				$memo = trim($this->input->post("txtMemo"));
			}
			if($image_id){
				if($this->mp_pandora->Update_ImageInfo($image_id,$img_name,$memo))
				redirect("/account/imagemanage");
				else
				$data['error_msg'] = "更新课程类型信息失败，请重试！";
			}else
			{
				if($this->mp_pandora->Creat_Image($img_name,$memo))
				redirect("/account/imagemanage");
				else
				$data['error_msg'] = "新建课程类型失败，请重试！";
			}
		}
		$scriptExtra = '<script type="text/javascript" src="/public/js/jquery.validate.min.js"></script>';
		$scriptExtra .= '<script type="text/javascript" src="/public/js/add_image.js"></script>';
		$content = $this->load->view('account/add_image', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	public function deleteimage()
	{
		$jsonRet = array();
		$image_id = $this->input->post('image_id');
		if($this->mp_pandora->Delete_Image($image_id))
		{
			$jsonRet['ret'] = 0;
		}else{
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = '删除失败';
		}
		echo json_encode($jsonRet);
		return;
	}
	public function addcooperation()
	{
		$data = array();
		$data['actLi'] = "cooperation";
		$cooperation_id = trim($this->input->get('cooperation_id'));
		if($cooperation_id){
			$data['cooperationObj'] = $this->mp_pandora->Get_CooperationById($cooperation_id);
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library('form_validation');
			$cooperation_id = trim($this->input->post('txtId'));

			$this->form_validation->set_rules('txtName',"合作机构名称",'trim|required');
			$this->form_validation->set_rules('txtLink',"合作机构链接",'trim|required');
			if($this->form_validation->run() == TRUE){
				$name = trim($this->input->post("txtName"));
				$link = trim($this->input->post("txtLink"));
			}
			if($cooperation_id){
				if($this->mp_pandora->Update_CooperationInfo($cooperation_id,$name,$link))
				redirect("/account/cooperationmanage");
				else
				$data['error_msg'] = "更新课程类型信息失败，请重试！";
			}else
			{
				if($this->mp_pandora->Creat_Cooperation($name,$link))
				redirect("/account/cooperationmanage");
				else
				$data['error_msg'] = "新建课程类型失败，请重试！";
			}
		}
		$scriptExtra = '<script type="text/javascript" src="/public/js/jquery.validate.min.js"></script>';
		$scriptExtra .= '<script type="text/javascript" src="/public/js/add_cooperation.js"></script>';
		$content = $this->load->view('account/add_cooperation', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	public function deletecooperation()
	{
		$jsonRet = array();
		$cooperation_id = $this->input->post('cooperation_id');
		if($this->mp_pandora->Delete_Cooperation($cooperation_id))
		{
			$jsonRet['ret'] = 0;
		}else{
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = '删除失败';
		}
		echo json_encode($jsonRet);
		return;
	}
	public function addfriendship()
	{
		$data = array();
		$data['actLi'] = "friendship";
		$friendship_id = trim($this->input->get('friendship_id'));
		if($friendship_id){
			$data['friendshipObj'] = $this->mp_pandora->Get_FriendshipById($friendship_id);
		}
		if($_SERVER['REQUEST_METHOD'] == 'POST')
		{
			$this->load->library('form_validation');
			$friendship_id = trim($this->input->post('txtId'));

			$this->form_validation->set_rules('txtName',"合作机构名称",'trim|required');
			$this->form_validation->set_rules('txtLink',"合作机构链接",'trim|required');
			if($this->form_validation->run() == TRUE){
				$name = trim($this->input->post("txtName"));
				$link = trim($this->input->post("txtLink"));
			}
			if($friendship_id){
				if($this->mp_pandora->Update_FriendshipInfo($friendship_id,$name,$link))
				redirect("/account/friendshipmanage");
				else
				$data['error_msg'] = "更新课程类型信息失败，请重试！";
			}else
			{
				if($this->mp_pandora->Creat_Friendship($name,$link))
				redirect("/account/friendshipmanage");
				else
				$data['error_msg'] = "新建课程类型失败，请重试！";
			}
		}
		$scriptExtra = '<script type="text/javascript" src="/public/js/jquery.validate.min.js"></script>';
		$scriptExtra .= '<script type="text/javascript" src="/public/js/add_friendship.js"></script>';
		$content = $this->load->view('account/add_friendship', $data, TRUE);
		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	}
	public function deletefriendship()
	{
		$jsonRet = array();
		$friendship_id = $this->input->post('friendship_id');
		if($this->mp_pandora->Delete_Friendship($friendship_id))
		{
			$jsonRet['ret'] = 0;
		}else{
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = '删除失败';
		}
		echo json_encode($jsonRet);
		return;
	}
	// 	public function addcourse()
	// 	{
	// 		$data = array();
	// 		$memo = '';
	// 		$data['actLi'] = "course";
	// 		$course_id = $this->input->get('course_id');
	// 		if($course_id){
	// 			$data['courseObj'] = $this->mp_pandora->Get_CourseById($course_id);
	// 		}
	// 		if($_SERVER['REQUEST_METHOD'] == 'POST')
	// 		{
	// 			$this->load->library('form_validation');
	// 			$course_id = $this->input->post('txtId');

	// 			$this->form_validation->set_rules('txtName',"课程类型名称",'trim|required');
	// 			if($this->form_validation->run() == TRUE){
	// 				$name = $this->input->post("txtName");
	// 				$memo = $this->input->post("txtMemo");
	// 			}
	// 			if($course_id){
	// 				if($this->mp_pandora->Update_CourseInfo($course_id,$name,$memo))
	// 					redirect("/account/coursemanage");
	// 				else
	// 					$data['error_msg'] = "更新课程类型信息失败，请重试！";
	// 			}else
	// 			{
	// 				if($this->mp_pandora->Creat_Course($name,$memo))
	// 					redirect("/account/coursemanage");
	// 				else
	// 					$data['error_msg'] = "新建课程类型失败，请重试！";
	// 			}
	// 		}
	// 		$scriptExtra = '<script type="text/javascript" src="/public/js/jquery.validate.min.js"></script>';
	// 		$scriptExtra .= '<script type="text/javascript" src="/public/js/add_course.js"></script>';
	// 		$content = $this->load->view('account/add_course', $data, TRUE);
	// 		$this->mp_master->Show($content, $scriptExtra, "主页" , $data);
	// 	}
	// 	public function deletecourse()
	// 	{
	// 		$jsonRet = array();
	// 		$course_id = $this->input->post('course_id');
	// 		if($this->mp_pandora->Delete_Course($course_id))
	// 		{
	// 			$jsonRet['ret'] = 0;
	// 		}else{
	// 			$jsonRet['ret'] = 1;
	// 			$jsonRet['msg'] = '删除失败';
	// 		}
	// 		echo json_encode($jsonRet);
	// 		return;
	// 	}
	public function getArticleType()
	{
		$jsonRet = array();
		$type_id = $this->input->post('selArticleType');
		$jsonRet['type_id'] = $type_id;
		echo json_encode($jsonRet);
		return;
	}
// 	public function getCourseTypeList()
// 	{
// 		$jsonRet = array();
// 		$jsonRet['courseTypeList'] = $this->mp_pandora->Get_CourseTypeList();
// 		echo json_encode($jsonRet);
// 		return;
// 	}
	/////////////////////////////////////////////
	public function test()
	{
		//		$this->mp_pandora->Creat_Course("乏味而");
		$this->Get_Logo("db7e37d68902c8103139b7b53a9a7613.jpg",100,150);
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
