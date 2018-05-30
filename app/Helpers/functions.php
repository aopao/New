<?php

/**
 * 漂亮打印数组
 *
 * @param $array
 */
if (!function_exists('p')) {
	function p($array)
	{
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}
}


/**
 * 正则表达式验证手机号码是否合法
 *
 * @param $phone
 * @return bool
 */
if (!function_exists('validationPhone')) {
	function validationPhone($phone)
	{
		if (!is_numeric($phone)) {
			return FALSE;
		}
		$pattern = '#^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$#';
		return preg_match($pattern , $phone) ? TRUE : FALSE;
	}
}