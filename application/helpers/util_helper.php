<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
}
?>
