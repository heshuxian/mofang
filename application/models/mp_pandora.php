<?php
class MP_Pandora extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function Get_UserList()
	{
		$dbObj = $this->load->database('default',TRUE);
		return $dbObj->get('user')->result();
	}
	function Get_StationList($user_id = FALSE)
	{
		$dbObj = $this->load->database('default',TRUE);
		if($user_id){
			$dbObj->join('user_station_link','user_station_link.station_id = station.id');
			$dbObj->where('user_station_link.user_id =',$user_id);
		}
		$dbObj->select('station.*');
		return $dbObj->get('station')->result();
	}
	function Get_ArticleList($type_id = FALSE, $limit = 0, $offset = 0)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('add_datetime','desc');
		if(!($type_id === FALSE)){
			if($limit == 0)
				return $dbObj->get_where('article',array('type_id'=>$type_id))->result();
			else
				return $dbObj->get_where('article',array('type_id'=>$type_id), $limit, $offset)->result();
		}

		if($limit == 0)
			return $dbObj->get('article')->result();
		else
			return $dbObj->get('article', $limit, $offset)->result();
	}
	function Get_ImageList($limit=0, $offset=0)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('id','desc');
		if($limit == 0)
			return $dbObj->get('big_image')->result();
		else
			return $dbObj->get('big_image', $limit, $offset)->result();
	}
	function Get_cooperationList($limit=0, $offset=0)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('id','desc');
		if($limit == 0)
			return $dbObj->get('cooperation')->result();
		else
			return $dbObj->get('cooperation', $limit, $offset)->result();
	}
	function Get_friendshipList($limit=0, $offset=0)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('id','desc');
		if($limit == 0)
			return $dbObj->get('friendship_link')->result();
		else
			return $dbObj->get('friendship_link', $limit, $offset)->result();
	}
	// 	function Get_CourseList($course_id = FALSE, $limit = 0, $offset = 0)
	// 	{
	// 		$dbObj = $this->load->database('default',TRUE);
	// 		if($course_id){
	// 			$dbObj->order_by('add_datetime','desc');
	// 			if($limit == 0)
	// 			{
	// 				$dbObj->where('article',array('type_id'=>2));
	// 				$dbObj->where('article',array('course_id'=>$course_id));
	// 				return $dbObj->get('article')->result();
	// 			}
	// 			$dbObj->where('type_id',2);
	// 			$dbObj->where('course_id',$course_id);
	// 			return $dbObj->get('article',$limit,$offset)->result();
	// 		}
	// 		$dbObj->order_by('add_datetime','desc');
	// 		return $dbObj->get_where('article')->result();
	// 	}
	// 	function Get_CourseTypeList()
	// 	{
	// 		$dbObj = $this->load->database('default',TRUE);
	// 		return $dbObj->get('course')->result();
	// 	}
	function Get_ArticleListCount($type_id = FALSE)
	{
		$dbObj = $this->load->database('default',TRUE);
		if(!($type_id === FALSE)){
			$dbObj->where('article.type_id', $type_id);
			return $dbObj->count_all_results('article');
		}
		$dbObj->order_by('add_datetime','desc');
		return $dbObj->count_all_results('article');
	}
	function Get_ImageListCount()
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('id','desc');
		return $dbObj->count_all_results('big_image');
	}
	function Get_CooperationListCount()
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('id','desc');
		return $dbObj->count_all_results('cooperation');
	}
	function Get_FriendshipListCount()
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('id','desc');
		return $dbObj->count_all_results('friendship_link');
	}
	// 	function Get_CourseListCount($course_id = FALSE)
	// 	{
	// 		$dbObj = $this->load->database('default',TRUE);
	// 		if($course_id){
	// 			$dbObj->order_by('add_datetime','desc');
	// 			$dbObj->where('article.course_id', $course_id);
	// 			return $dbObj->count_all_results('article');
	// 		}
	// 		$dbObj->order_by('add_datetime','desc');
	// 		return $dbObj->count_all_results('article');
	// 	}
	function Get_ArticleById($id)
	{
		$dbObj = $this->load->database('default',TRUE);
		if($id){
			return $dbObj->get_where('article',array('id'=>$id))->row();
		}
		return null;
	}
	function Get_ImageById($image_id)
	{
		$dbObj = $this->load->database('default',TRUE);
		if($image_id){
			return $dbObj->get_where('big_image',array('id'=>$image_id))->row();
		}
		return null;
	}
	function Get_CooperationById($cooperation_id)
	{
		$dbObj = $this->load->database('default',TRUE);
		if($cooperation_id){
			return $dbObj->get_where('cooperation',array('id'=>$cooperation_id))->row();
		}
		return null;
	}
	function Get_FriendshipById($friendship_id)
	{
		$dbObj = $this->load->database('default',TRUE);
		if($friendship_id){
			return $dbObj->get_where('friendship_link',array('id'=>$friendship_id))->row();
		}
		return null;
	}
	// 	function Get_CourseById($id)
	// 	{

	// 		$dbObj = $this->load->database('default',TRUE);
	// 		if($id){
	// 			return $dbObj->get_where('course',array('id'=>$id))->row();
	// 		}
	// 		return null;
	// 	}
	function Creat_Article($type_id,$title,$content,$manager,$img_name,$author/*,$course_id*/)
	{
		$dbObj = $this->load->database('default', TRUE);
		$dbObj->set("type_id", $type_id);
		$dbObj->set('title', $title);
		$dbObj->set("content", $content);
		$dbObj->set("manager", $manager);
		$dbObj->set("img_name", $img_name);
		$dbObj->set("author", $author);
		// 		$dbObj->set("course_id", $course_id);
		$dbObj->set("add_datetime", 'now()',false);
		return $dbObj->insert('article');
	}
	function Creat_Image($img_name, $memo)
	{
		$dbObj = $this->load->database('default', TRUE);
		$dbObj->set("img_name", $img_name);
		$dbObj->set('memo', $memo);
		return $dbObj->insert('big_image');
	}
	function Creat_Cooperation($name,$link)
	{
		$dbObj = $this->load->database('default', TRUE);
		$dbObj->set("name", $name);
		$dbObj->set('link', $link);
		return $dbObj->insert('cooperation');
	}
	function Creat_Friendship($name,$link)
	{
		$dbObj = $this->load->database('default', TRUE);
		$dbObj->set("name", $name);
		$dbObj->set('link', $link);
		return $dbObj->insert('friendship_link');
	}
	// 	function Creat_Course($name,$memo)
	// 	{
	// 		$dbObj = $this->load->database('default', TRUE);
	// 		$dbObj->set("name", $name);
	// 		$dbObj->set('memo', $memo);
	// 		return $dbObj->insert('course');
	// 	}
	function Delete_Article($id)
	{
		$dbObj = $this->load->database('default', true);
		$dbObj->where('id',$id);
		return $dbObj->delete('article');
	}
	function Delete_Image($image_id)
	{
		error_log($image_id);
		$dbObj = $this->load->database('default', true);
		$dbObj->where('id',$image_id);
		return $dbObj->delete('big_image');
	}
	function Delete_Cooperation($cooperation_id)
	{
		$dbObj = $this->load->database('default', true);
		$dbObj->where('id',$cooperation_id);
		return $dbObj->delete('cooperation');
	}
	function Delete_Friendship($friendship_id)
	{
		$dbObj = $this->load->database('default', true);
		$dbObj->where('id',$friendship_id);
		return $dbObj->delete('friendship_link');
	}
	// 	function Delete_Course($course_id)
	// 	{
	// 		$dbObj = $this->load->database('default', true);
	// 		$dbObj->where('id',$course_id);
	// 		return $dbObj->delete('course');
	// 	}
	function Update_ArticleInfo($id,$type_id,$title,$content,$manager,$img_name,$author/*,$course_id*/)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('type_id', $type_id);
		$dbObj->set('title', $title);
		$dbObj->set('content', $content);
		$dbObj->set("img_name", $img_name);
		$dbObj->set("author", $author);
		// 		$dbObj->set("course_id", $course_id);
		return $dbObj->update('article');
	}
	function Update_ImageInfo($id,$img_name,$memo)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('img_name', $img_name);
		$dbObj->set('memo', $memo);
		return $dbObj->update('big_image');
	}
	function Update_cooperationInfo($id,$name,$link)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('name', $name);
		$dbObj->set('link', $link);
		return $dbObj->update('cooperation');
	}
	function Update_friendshipInfo($id,$name,$link)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('name', $name);
		$dbObj->set('link', $link);
		return $dbObj->update('friendship_link');
	}
	// 	function Update_CourseInfo($id,$name,$memo)
	// 	{
	// 		$dbObj = $this->load->database('default',TRUE);
	// 		$dbObj->where('id', $id);
	// 		$dbObj->set('name', $name);
	// 		$dbObj->set('memo', $memo);
	// 		return $dbObj->update('course');
	// 	}

	function Get_LatestNoice()
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->order_by('add_datetime','desc');
		$dbObj->select('id,title');
		return $dbObj->get('article',10,0)->result();
	}
}


?>
