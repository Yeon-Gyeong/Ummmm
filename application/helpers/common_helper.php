<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//랜덤 문자열 생성
if(!function_exists('random_str')){
	function random_str($length=10){

		$str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		$str_length = strlen($str);
		$random_str = '';

		for($i=0; $i<$length; $i++){
			$random_str .= $str[rand(0, $str_length-1)];
		}

		return $random_str;
	}
}