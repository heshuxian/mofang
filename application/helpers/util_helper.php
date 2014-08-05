<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'HTTP/Request2.php';

class Util{
	public static function Post_Uri_Params($request_uri,$headers,$params,array $postFiles=null)
	{
		$request = new HTTP_Request2($request_uri, HTTP_Request2::METHOD_POST);
		$request->setHeader($headers)->addPostParameter($params);
		foreach ($params as $key=>$value)
		{
			$request->addPostParameter($key,$value);
		}
		if (count($postFiles))
		{
			foreach ($postFiles as $key=>$value)
			{
				$request->addUpload($key, $value['tmp_name'], $value['name']);
			}
		}
		try
		{
			$response = $request->send();
			if (200 == $response->getStatus())
			{
				return $response->getBody();
			}
			else
			{
				return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
						$response->getReasonPhrase();
			}
		} catch (HTTP_Request2_Exception $e) {
			return 'Error: ' . $e->getMessage();
		}
	}
	public static function Get_Uri_Params($request_uri,$headers,$params)
	{
		$request = new HTTP_Request2($request_uri, HTTP_Request2::METHOD_GET);
		$request->setHeader($headers);
		$url = $request->getUrl();
		$url->setQueryVariables($params);
		try 
		{
			$response = $request->send();
			if (200 == $response->getStatus()) 
			{
				return $response->getBody();
			} 
			else 
			{
				return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
						$response->getReasonPhrase();
			}		
		} catch (HTTP_Request2_Exception $e) {
			return 'Error: ' . $e->getMessage();
		}
	}
	public static function Delete_Uri_Params($request_uri,$headers,$params)
	{
 		$request = new HTTP_Request2($request_uri, HTTP_Request2::METHOD_DELETE);
		$request->setHeader($headers);
		$url = $request->getUrl();
		$url->setQueryVariables($params);
		try
		{
			$response = $request->send();
			if (200 == $response->getStatus())
			{
				return $response->getBody();
			}
			else
			{
				return 'Unexpected HTTP status: ' . $response->getStatus() . ' ' .
						$response->getReasonPhrase();
			}
		} catch (HTTP_Request2_Exception $e) {
			return 'Error: ' . $e->getMessage();
		}
		
		/* try
		{
			$client = new GuzzleClient();
			$request = $client->delete($uri,$headers,$params);
			$response = $request->send();
			return $response->getBody();
		}
		catch (\Guzzle\Http\Exception\BadResponseException $e)
		{
			$raw_response = explode("\n", $e->getResponse());
			throw new IDPException(end($raw_response));
		} */
	}
}
?>
