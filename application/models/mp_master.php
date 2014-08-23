<?php
class MP_Master extends CI_Model
{
	function __construct(){
		// Call the Model constructor
		parent::__construct();
	}

	function Show($mainPlaceHolder,$headerPlaceHolder,$pageTitle,$data)
	{
		$user = User::GetCurrentUser();
		$data['site_name'] = $this->config->item('site_name');
		$data['headerPlaceHolder'] = $headerPlaceHolder;
		$data['pageTitle'] = $pageTitle;
		$data['mainPlaceHolder'] = $mainPlaceHolder;
		$this->load->view('account/master',$data);
	}
	function Show_Portal($mainPlaceHolder,$headerPlaceHolder,$pageTitle,$data)
	{
		$data['site_name'] = $this->config->item('site_name');
		$data['headerPlaceHolder'] = $headerPlaceHolder;
		$data['pageTitle'] = $pageTitle;
		$data['mainPlaceHolder'] = $mainPlaceHolder;
		$this->load->view('portal/master',$data);
	}
}
?>