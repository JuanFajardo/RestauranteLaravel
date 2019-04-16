<?php
namespace App\Clases;

class Lin
{
	public static function url()
	{
		$url = "http://ssupotosi.com.bo";
		$servidor = $_SERVER['SERVER_ADDR'];
		if( $servidor == '190.129.35.163' || $servidor == '192.168.1.4'){
			$url = "http://192.168.1.4";
		}else{
			$url = "http://ssupotosi.com.bo";
		}
		return $url;
	}

}
