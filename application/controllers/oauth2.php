<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class OAuth2 extends CI_Controller {

	var $authserver;
	public function __construct()
	{
		parent::__construct();
		// Initiate the request handler which deals with $_GET, $_POST, etc
		$request = new League\OAuth2\Server\Util\Request();

		require "application/config/database.php";
		// Initiate a new database connection
		$conn_str = 'mysql://'.$db['default']['username'].":".$db['default']['password'].'@'.$db['default']['hostname'].'/'.$db['default']['database'];
		$db = new League\OAuth2\Server\Storage\PDO\Db($conn_str);
		
		$this->authserver = new League\OAuth2\Server\Authorization(
		new League\OAuth2\Server\Storage\PDO\Client($db),
		new League\OAuth2\Server\Storage\PDO\Session($db),
		new League\OAuth2\Server\Storage\PDO\Scope($db)
		);
		// Enable the authorization code grant type
		$this->authserver->addGrantType(new League\OAuth2\Server\Grant\AuthCode($this->authserver));
		$this->authserver->addGrantType(new League\OAuth2\Server\Grant\RefreshToken($this->authserver));
	}

	public function token()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: X-Requested-With");
		header("Access-Control-Request-Method: GET,POST");
		header('Content-Type: application/json');
		try {

			// Tell the auth server to issue an access token
			$response = $this->authserver->issueAccessToken();

		} catch (League\OAuth2\Server\Exception\ClientException $e) {

			// Throw an exception because there was a problem with the client's request
			$response = array(
					'error' =>  $this->authserver->getExceptionType($e->getCode()),
					'error_description' => $e->getMessage()
			);
			//var_dump($this->authserver->getExceptionHttpHeaders($this->authserver->getExceptionType($e->getCode())));
			// Set the correct header
			$headers = $this->authserver->getExceptionHttpHeaders($this->authserver->getExceptionType($e->getCode()));
			foreach($headers as $headStr)
			{
				header($headStr);
			}
		} catch (Exception $e) {

			// Throw an error when a non-library specific exception has been thrown
			$response = array(
					'error' =>  'undefined_error',
					'error_description' => $e->getMessage()
			);
		}
		echo json_encode($response);
	}

	/**
	 * Use for application to login directly
	 */
	public function authenticate()
	{
		//Do validation of App and user's login
		$this->load->library("form_validation");
		$this->form_validation->set_rules('client_id','client_id','required');
		$this->form_validation->set_rules('client_secret','client_secret','required');
		$this->form_validation->set_rules('redirect_uri','redirect_uri','required');
		$this->form_validation->set_rules('userid','userid','required');
		$this->form_validation->set_rules('password','password','required');

		$_POST['response_type'] = "code";
		$_POST['grant_type'] = 'authorization_code';
		$_POST['scope'] = "";
		if($this->form_validation->run())
		{
			try {
				$params = $this->authserver->getGrantType('authorization_code')->checkAuthoriseParams($_POST);
			}catch (Oauth2\Exception\ClientException $e) {
				$jsonRet = array();
				$jsonRet['ret'] = 1;
				$jsonRet['error'] = "incorrect app login info";
				$jsonRet['response'] = '';
				echo json_encode($jsonRet);
				return;
			} catch (Exception $e) {
				$jsonRet = array();
				$jsonRet['ret'] = 5;
				$jsonRet['error'] = "Server internal error";
				$jsonRet['response'] = '';
				echo json_encode($jsonRet);
				return;
			}
			//Validate User Info
			if(1 != User::ValidUser($this->input->post('userid'), $this->input->post('password')))
			{
				$jsonRet = array();
				$jsonRet['ret'] = 2;
				$jsonRet['error'] = "incorrect user login info";
				$jsonRet['response'] = '';
				echo json_encode($jsonRet);
				return;
			}
			//validation pass, now issue the access token
			$user = User::GetUser($this->input->post('userid'));
			$userid = $user->id;
			$_POST['scopes'] = array();
			$_POST['code'] = $this->authserver->getGrantType('authorization_code')->newAuthoriseRequest('user', $userid, $_POST);
			$response = $this->authserver->issueAccessToken($_POST);
			$response['ret'] = 0;
			$response['error'] = '';
			unset($user->password);
			$response['user_info'] = $user;
			echo json_encode($response);
			return;
		}else{
			$jsonRet = array();
			$jsonRet['ret'] = 3;
			$jsonRet['error'] = validation_errors();
			$jsonRet['response'] = '';
			echo json_encode($jsonRet);
		}
	}

}