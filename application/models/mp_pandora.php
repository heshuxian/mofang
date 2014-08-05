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
}


?>