<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once 'HTTP/Request2.php';
class Util{
	public static function cutArticle($data,$cut=0,$str="....")
	{
		$data=strip_tags($data);//去除html标记
		$pattern = "/&[a-zA-Z]+;/";//去除特殊符号
		$data=preg_replace($pattern,'',$data);
		if(!is_numeric($cut))
			return $data;
		if($cut>0)
			$data=mb_strimwidth($data,0,$cut,$str);
		return $data;
	}
	public static function Post_Uri_Params($request_uri, $headers ,$params,array $postFiles=null)
	{
		$request = new HTTP_Request2($request_uri, HTTP_Request2::METHOD_POST);
		$request->setHeader($headers)->addPostParameter($params);
	
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
				return false;
			}
		} catch (HTTP_Request2_Exception $e) {
			return false;
		}
	}
}
?>
