<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	var $authserver;
	var $server;
	var $response = array();
	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-Requested-With");
		header("Access-Control-Request-Method: GET,POST,PUT,DELETE");
		header('Content-Type: application/json');
		header('Access-Control-Allow-Headers: Authorization');
		parent::__construct();
		// Initiate the request handlerw which deals with $_GET, $_POST, etc
		$request = new League\OAuth2\Server\Util\Request();
		require "application/config/database.php";
		// Initiate a new database connection
		$conn_str = 'mysql://'.$db['default']['username'].":".$db['default']['password'].'@'.$db['default']['hostname'].'/'.$db['default']['database'];
		$db = new League\OAuth2\Server\Storage\PDO\Db($conn_str);

		$this->server = new League\OAuth2\Server\Resource(
				new League\OAuth2\Server\Storage\PDO\Session($db)
		);
		try {
			$this->server->isValid();
		}
		// The access token is missing or invalid...
		catch (League\OAuth2\Server\Exception\InvalidAccessTokenException $e)
		{
			$jsonRet = array();
			$jsonRet['ret'] = 1;
			$jsonRet['msg'] = $e->getMessage();
			echo json_encode($jsonRet);
			die();
		}
	}
	
	public function getuserinfo()
	{
		$jsonRet = array();
		$userObj = User::GetUserById($this->server->getOwnerId());
		unset($userObj->password);
		$jsonRet['userObj'] = $userObj;
		echo json_encode($jsonRet);
		return;
	}
}
