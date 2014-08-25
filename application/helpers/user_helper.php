<?php
/**
 * 
 * Pandora User_Help Class
 * @author peter
 *
 */
class User{

	static $userRole = array();

	function AutoSign(&$outScript)
	{
		$token = $this->input->get("token");
		if($token)
		{
			$dbObj = $this->load->database('yunqi', TRUE);
			$dbObj->where('token', $token);
			$row = $dbObj->get('user_sign_token')->row();
			if(count($row))
			{
				$dbObj->set('token','');
				$dbObj->where('id', $row->id);
				$dbObj->update('user_sign_token');

				$_SESSION["PANDORA_REALM"] = $row->realm;
				User::LogInUserId($row->user_id, FALSE, $outScript);

				return true;
			}
		}
		return false;
	}

	function CreateUser($username,$password,$full_name,$user_role,$email){

		$dbObj = $this->load->database('default', TRUE);
		$dbObj->set("username", $username);
		$dbObj->set('password', md5($password));
		$dbObj->set("full_name", $full_name);
		$dbObj->set("user_role", $user_role);
		$dbObj->set("email", $email);
		$dbObj->set('added_datetime', 'now()', false);
		return $dbObj->insert('user');
	}

	function GetUserByName($name)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbQuery = $dbObj->get_where('user',array('username'=>$name));
		if ($dbQuery->num_rows() > 0){
			return $dbQuery->row();
		}
		return null;
	}
	function UpdateUserBindingphone($id, $phone)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('phone', $phone);
		$dbObj->update('user');
	}
	function UpdateUserinfo($id,$full_name,$user_role,$email)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('full_name', $full_name);
		$dbObj->set('user_role', $user_role);
		$dbObj->set('email', $email);
		$dbObj->update('user');
		return $dbObj->get_where('user',array('id'=>$id))->row();
	}
	function UpdateUserPasswd($id, $password)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('password', md5($password));
		$dbObj->update('user');
		return $dbObj->get_where('user',array('id'=>$id))->row();
	}
	function UpdateLastSendCode($id,$times)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('id', $id);
		$dbObj->set('last_sendcode', 'now()', FALSE);
		$dbObj->set('today_send_times',$times);
		$dbObj->update('user');
		return $dbObj->get_where('user',array('id'=>$id))->row();
	}
	/**
	 * regernate User's password
	 *
	 * @param string|object $user
	 * @param string $errMsg
	 * @return newPassword or null if error
	 */
	function GeneratePassword($user){
		$dbObj = $this->load->database('default',TRUE);
		if(is_string($user)){
			$user = User::GetUser($user);
		}
		if($user){
			$this->load->helper('string');
			$newPassword = random_string('alnum', 12);
			$dbObj->set('password',md5($newPassword));
			$dbObj->where('id',$user->id);
			$dbObj->update('user');
			return $newPassword;
		}
		return null;
	}
	/**
	 * Change User's Password
	 *
	 * @param string|object $user
	 * @param old password $oldPassword
	 * @param new password $newPassword
	 * @param error message $errorMsg
	 * @return bool
	 */
	function ChangePassword($user,$oldPassword,$newPassword,&$errorMsg){
		$this->load->database('default');
		if(is_string($user)){
			$user = User::GetUser($user);
		}
		if(!strcmp($user->password,md5($oldPassword))){
			$user->password = md5($newPassword);
			$this->db->where('id',$user->id);
			$this->db->update('user',$user);
			return true;
		}
		$errorMsg = "Incorrect old password!";
		return false;
	}
	function SetInterest($user_id, $interestStr)
	{
		$this->load->database('default');
		$this->db->set('interest', $interestStr);
		$this->db->where('user_id',$user_id);
		$this->db->update('user');
	}
	function GetMemberUser($name){
		$_SESSION["membername"] = $name;
		return User::GetUser($name);
	}

	function SetPhone($user_id, $newPhone)
	{
		$otherUser = User::GetUser($newPhone);
		if($otherUser && $otherUser->id != $user_id)
		{
			return false;
		}
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->set('phone', $newPhone);
		$dbObj->where('id', $user_id);
		$dbObj->update('user');
	}

	function ConfirmMail($code)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('code', $code);
		$confObj = $dbObj->get('email_change_request')->row();
		if($confObj)
		{
			if( (time() - strtotime($confObj->request_date)) > (60*60*24) )
			{
				return "您的验证码已过期";
			}else{
				$otherUser = User::GetUser($confObj->email);
				if($otherUser)
				{
					$dbObj->where('id', $confObj->id);
					$dbObj->delete('email_change_request');
					return "邮箱验证失败！您的新邮箱已被其他用户注册并验证";
				}
				$dbObj->set('email', $confObj->email);
				$dbObj->where('id', $confObj->user_id);
				$dbObj->update('user');
				$dbObj->where('id', $confObj->id);
				$dbObj->delete('email_change_request');
				return "您的邮箱已被成功修改";
			}
		}else{
			return "您的验证码无效";
		}
	}
	function ChangeEmail($user, $newEmail)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('user_id', $user->id);
		$dbObj->delete('email_change_request');

		$dbObj->set('user_id', $user->id);
		$dbObj->set('email', $newEmail);

		$this->load->helper('string');
		$code = random_string('alnum', 10);

		$dbObj->set('code', $code);
		$dbObj->set('request_date', 'now()', FALSE);
		$dbObj->insert('email_change_request');
		return $code;
	}
	/**
	 * Get User by Email,UserId,Username
	 *
	 * @param string(email,userid,username) $name
	 * @return Object or Null
	 */
	function GetUser($value){
		$dbObj = $this->load->database('default',TRUE);
		return $dbObj->get_where('user',array('username'=>$value))->row();
	}

	function GetUserById($id)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbQuery = $dbObj->get_where('user',array('id'=>$id));
		if ($dbQuery->num_rows() > 0){
			return $dbQuery->row();
		}
		return null;
	}
	/**
	 * Get Current User
	 *
	 * @return object or null
	 */
	function GetCurrentUser($bForceLoad = false){
		if(User::IsAuthenticated()){
			$userid = $_SESSION["PANDORA_USERNAME"];
			$user =  User::GetUserById($userid, $bForceLoad);
			if($user)
			return $user;
			else{
				$this->load->helper("cookie");
				unset($_SESSION['PANDORA_USERNAME']);
				unset($_SESSION['PANDORA_HASH']);
				unset($_SESSION["PANDORA_USERID"]);
				delete_cookie("PANDORA_HASH");
			}
		}
		$this->load->library('session');
		$this->session->set_userdata('returnUrl', $_SERVER['REQUEST_URI']);
		header("Location:".site_url('/login'));
		exit();
		//return null;
	}


	/**
	 *
	 * Add/Remove user from role
	 * @param $username
	 * @param $role
	 */
	function MarkUserRole($username, $role)
	{
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('user_id', $username);
		$dbObj->where('role',$role);
		$dbQuery = $dbObj->get('user_roles');
		if($dbQuery->num_rows() > 0)
		{
			$dbObj->where('id', $dbQuery->row()->id);
			$dbObj->delete('user_roles');
			return FALSE;
		}
		$dbObj->set('user_id',$username);
		$dbObj->set('role',$role);
		$dbObj->insert('user_roles');
		return TRUE;
	}


	function IsUserInRole($username, $role)
	{
		if(empty($role))
		{
			debug_print_backtrace();
			return;
		}
		if(empty($username)){
			//test myself
			if(!User::IsAuthenticated()){
				return FALSE;
			}
			$username = $_SESSION["PANDORA_USERNAME"];
		}
		if(isset(User::$userRole[$username."_".$role])){
			return User::$userRole[$username."_".$role];
		}
		$dbObj = $this->load->database('default',TRUE);
		$dbObj->where('role',$role);
		$dbObj->where('user_id',$username);
		$dbQuery = $dbObj->get('user_roles');

		User::$userRole[$username."_".$role] = ($dbQuery->num_rows() > 0);
		return User::$userRole[$username."_".$role];
	}
	/**
	 * Is User logged in
	 *
	 * @return bool
	 */
	function IsAuthenticated(){
		if(isset($_SESSION["PANDORA_USERNAME"])){
			//for performance reason
			return true;
		}else{
			//test if cookie exists
			$this->load->helper("cookie");
			$username = get_cookie("PANDORA_USERNAME");
			if(isset($username)){
				$user = User::GetUser($username);
				if($user){
					if(!strcmp(get_cookie("PANDORA_HASH"),md5($username.$user->password))){
						$_SESSION["PANDORA_USERNAME"] = $username;
						$_SESSION["PANDORA_HASH"] = md5($username.$user->password);
						return true;
					}
				}
			}
		}
		return false;
	}
	/*
	 * Validate user
	 */
	/**
	 * Validate User
	 *
	 * @param string $userName
	 * @param string $pwd
	 * @param string(Is pwd in md5 format) $isMd5
	 * @return -1,user not exists; -2, user expire. -3, password incorrect, 1 passed
	 */
	function ValidUser($userName,$password,$isMd5=false){
		$user = User::GetUser($userName, true);
		if(!$user){
			return -1;
		}
		if(!$isMd5){
			$password = md5($password);
		}
		if(!strcmp($user->password,$password)){
			return 1;
		}else{
			return -3;
		}
	}

	/**
	 * LogIn user, if success, user is kept logged in.
	 *
	 * @param username $username
	 * @param string  $password
	 * @param string $isMd5
	 * @return bool
	 */
	function LogInUser($username,$password,$isMd5=false,$isRememberMe=false){

		if(1 == User::ValidUser($username,$password,$isMd5)){
			$user = User::GetUser($username);
			return User::LogInUserObj($user,$isRememberMe);
		}
		return false;
	}
	function LogInUserObj($user,$isRememberMe=false){
		$username = $user->id;
		$password = $user->password;
		$sData = array( 'PANDORA_USERNAME' => $username, 'PANDORA_HASH' =>  md5($username.$password));
		if($isRememberMe){
			$this->load->helper('cookie');

			set_cookie("PANDORA_USERNAME",$username,86400*7);
			set_cookie("PANDORA_HASH",$sData["PANDORA_HASH"],86400*7);
		}
		$_SESSION["PANDORA_USERID"] = $user->id;
		$_SESSION['PANDORA_USERNAME'] = $username;
		$_SESSION['PANDORA_HASH'] = $sData["PANDORA_HASH"];
		return true;
	}

	function DeleteUser($userid)
	{
		//Scott 2013-4-17, need to do more works here. Pending
		//Only remove user
		$dbObj = $this->load->database('default', true);
		$dbObj->where('id',$userid);
		return $dbObj->delete('user');
	}
	function Save($user){
		$dbObj = $this->load->database('default', true);
		$dbObj->where('id',$user->id);
		$dbObj->update('user',$user);
	}
	function LogInUserId($userid,$isRememberMe=false,&$outScript=''){
		$user = User::GetUser($userid);
		if(!$user){
			return false;
		}
		User::LogInUserObj($user,$isRememberMe,$outScript);
		return true;
	}

	/**
	 * Logout User
	 *
	 */
	function LogOutUser(){
		$this->load->helper("cookie");
		unset($_SESSION['PANDORA_USERNAME']);
		unset($_SESSION['PANDORA_HASH']);
		unset($_SESSION["PANDORA_USERID"]);

		delete_cookie("PANDORA_HASH");

	}
}


?>
