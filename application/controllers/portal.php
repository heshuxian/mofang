<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
const DEFAULT_PAGE_SIZE = 10;
class Portal extends CI_Controller {
	
	var $article_type = array("老师风采","行业动态","课程介绍","活动相关","学员感悟","俱乐部","老师观点");
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mp_pandora');
		$this->load->model('mp_master');
		$this->load->model('mp_paging');
	}

	public function index()
	{
		$data = array();
		$data['site_name'] =  $this->config->item('site_name');
		$data['pageTitle'] = '主页';
		$data['pageIndex'] = 10;
		$data['bigImageList'] = $this->mp_pandora->Get_ImageList(3);
		$data['teacherList'] = $this->mp_pandora->Get_ArticleList(0,1);
		$data['industryList'] = $this->mp_pandora->Get_ArticleList(1,6);
		$data['courseList'] = $this->mp_pandora->Get_ArticleList(2,7);
		$data['activityList'] = $this->mp_pandora->Get_ArticleList(3,6);
		$data['studentList'] = $this->mp_pandora->Get_ArticleList(4,2);
		$data['clubList'] = $this->mp_pandora->Get_ArticleList(5,4);
		$data['friendshipList'] = $this->mp_pandora->Get_friendshipList(6);
		$data['cooperationList'] = $this->mp_pandora->Get_cooperationList(6);
		$scriptExtra ='';// '<script type="text/javascript" src="/public/js/article_manage.js"></script>';
		$content = $this->load->view('portal/index', $data, TRUE);
		$this->mp_master->Show_Portal($content, $scriptExtra, "主页" , $data);
	}
	public function showList()
	{
		$data = array();
		$data['type_id'] = $data['pageIndex'] = $type_id = $this->input->get('type_id');
		$rand_id = $type_id;
		while($rand_id == $type_id)
			$rand_id = rand(0, 6);
		$data['rand_id'] = $rand_id;
		$data['randList'] = $this->mp_pandora->Get_ArticleList($rand_id,6);
		$offset = intval($this->input->get('per_page'));
//		$data['courseTypeList'] = $this->mp_pandora->Get_CourseTypeList();
		$data['typeList'] = $this->article_type;
		$data['courseList'] = $this->mp_pandora->Get_ArticleList(2,5);
		$data['friendshipList'] = $this->mp_pandora->Get_friendshipList(6);
		$data['cooperationList'] = $this->mp_pandora->Get_cooperationList(6);
		$count = $this->mp_pandora->Get_ArticleListCount($type_id);
		$data['articleList'] = $this->mp_pandora->Get_ArticleList($type_id,DEFAULT_PAGE_SIZE,$offset);	
		$data['pagination'] = $this->mp_paging->Show(site_url('portal/showList?type_id='.$type_id),$count,DEFAULT_PAGE_SIZE,3,TRUE);
		$content = $this->load->view('portal/list',$data,TRUE);
		$scriptExtra = '<script type="text/javascript" src="/public/js/alphanumeric.js"></script>';
		$scriptExtra .= '<script type="text/javascript" src="/public/portal/js/showlist.js"></script>';
		$this->mp_master->Show_Portal($content, $scriptExtra, "详情列表" , $data);
	}
// 	public function showCourseList()
// 	{
// 		$data = array();
// 		$data['course_id'] = $course_id = $this->input->get('course_id');
// 		$data['type_id'] = $data['pageIndex'] = 2;
// 		$offset = intval($this->input->get('per_page'));
// 		$data['articleList'] = $this->mp_pandora->Get_CourseList($course_id,DEFAULT_PAGE_SIZE,$offset);
// 		$data['typeList'] = $this->article_type;
// 		$data['courseTypeList'] = $this->mp_pandora->Get_CourseTypeList();
// 		$count = $this->mp_pandora->Get_CourseListCount($course_id);
// 		$data['pagination'] = $this->mp_paging->Show(site_url('portal/showList?course_id='.$course_id),$count,DEFAULT_PAGE_SIZE,3,TRUE);
// 		$content = $this->load->view('portal/list',$data,TRUE);
// 		$scriptExtra ='';
// 		$this->mp_master->Show_Portal($content, $scriptExtra, "详情列表" , $data);
// 	}
	public function showDetail()
	{
		$data = array();
		$id = $this->input->get('id');
		$data['articleObj'] = $this->mp_pandora->Get_ArticleById($id);
		$data['type_id'] = $data['pageIndex'] = $data['articleObj']->type_id;
		$rand_id = $data['type_id'];
		while($rand_id == $data['type_id'])
			$rand_id = rand(0, 6);
		$data['rand_id'] = $rand_id;
		$data['randList'] = $this->mp_pandora->Get_ArticleList($rand_id,6);
		$data['typeList'] = $this->article_type;
//		$data['courseTypeList'] = $this->mp_pandora->Get_CourseTypeList();
		$data['articleList'] = $this->mp_pandora->Get_ArticleList($data['type_id']);
		$data['friendshipList'] = $this->mp_pandora->Get_friendshipList(6);
		$data['cooperationList'] = $this->mp_pandora->Get_cooperationList(6);
		$content = $this->load->view('portal/detail',$data,TRUE);
		$scriptExtra ='<script type="text/javascript" ckharset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=4&lang=zh&sn=true"></script>';
		//$scriptExtra .= '<script type="text/javascript" src="/public/js/article_detail.js"></script>';
		$this->mp_master->Show_Portal($content, $scriptExtra, "详情列表" , $data);
	}
	
	public function uploadArticleImg()
	{
		$jsonRet = array();
		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			$this->load->library('upload');
			$config['upload_path'] = './article_img/';
			$config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
			$config['max_size']	= '8000';
			$config['encrypt_name'] = TRUE;
			$this->upload->initialize($config);
			if (isset($_FILES['uploadImage']))
			{
				$bRet = $this->upload->do_upload('uploadImage');
				if($bRet){
					$fileData = $this->upload->data();
					$photo_img = $fileData["file_name"];
					$jsonRet['ret'] = 0;
					$jsonRet['file_name'] = $photo_img;
					$jsonRet['addr'] =  '/article_img/'.$photo_img;
					echo json_encode($jsonRet);
					return;
				}
			}
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] =  "上传失败";
			echo json_encode($jsonRet);
			return;
		}
	}
	function resize_img($file_name)
	{
		$this->load->library("image_moo");
		$this->image_moo->load($file_name)->resize_crop(156,116)->save($file_name,true);
	}
	public function _Get_Image_Thumb($filename, $width, $height=0)
	{
		$this->load->library('image_moo');
		$this->image_moo->load(".".$filename);
		if($this->image_moo->width <= $width)
		{
			$this->image_moo->save_dynamic();
		}else{
			$this->image_moo->resize_crop($width,$height,FALSE)->save_dynamic();
		}
	}
	public function Get_Logo_0($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 177, 263);
	}
	public function Get_Logo_4($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 44, 44);
	}
	public function Get_Logo_2($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 156, 116);
	}
	public function Get_Logo_3($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 245, 145);
	}
	public function Get_Logo_5($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 245, 145);
	}
	public function Get_Logo_1($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 156, 116);
	}
	public function Get_Logo_big($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 1000, 292);
	}
	public function Get_Logo_small($filename)
	{
		$filename = urldecode($filename);
		return $this->_Get_Image_Thumb("/article_img/".$filename, 500, 146);
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
