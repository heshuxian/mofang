<?php

/**
 * 
 * Meephone pagination control for admin page
 * @author marship
 *
 */
class MP_Paging extends CI_Model
{
	function __construct(){
		parent::__construct();
	}

	function Show($url,$totalRows,$pageSize,$uri_segment=3, $query=FALSE)
	{
		$this->load->library('pagination');
		$config = array();
		$config['num_links'] = 10;
		$config['base_url'] = $url;
		$config['total_rows'] = $totalRows;
		$config['per_page'] = $pageSize;
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = '<div class="main"><ul class="pagination">';
		$config['full_tag_close'] = '</div></div>';
		$config['page_query_string'] = $query;
		$config['prev_link'] = '上一页';
		$config['next_link'] = '下一页';
		$config['first_link'] = "第一页";
		$config['last_link'] = "最后一页";
		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}
	
	function Show_Portal($url,$totalRows,$pageSize,$uri_segment=3, $query=FALSE)
	{
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = $url;
		$config['total_rows'] = $totalRows;
		$config['per_page'] = $pageSize;
		$config['uri_segment'] = $uri_segment;
		$config['full_tag_open'] = '<div id="divPaging"><ul>';
		$config['full_tag_close'] = '</ul><div class="clearBoth"></div></div>';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="curPage">';
		$config['cur_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['page_query_string'] = $query;
		$config['first_link'] = "第一页";
		$config['last_link'] = "最后一页";
		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}
}