<?php
class Lib_Curl {

	public static $cookie_file = '/data/wwwroot/operating/web/.cookie';

	public static $opts = array(
		CURLOPT_POST => 1,
	    CURLOPT_CONNECTTIMEOUT => 1,
	    CURLOPT_RETURNTRANSFER => true,
	    CURLOPT_TIMEOUT        => 2,
	    CURLOPT_USERAGENT      => 'KingKong-Operating',
  	);
  	
	public static function request($url, $params){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$re = curl_exec($ch);
		curl_close($ch);
		return $re;
	}

	  
        public static function requestGet($url,$timeout=20,$dns_cache_time=120){
           
                $ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                
		curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
                curl_setopt($ch, CURLOPT_DNS_CACHE_TIMEOUT, $dns_cache_time);
                
		$re = curl_exec($ch);
		curl_close($ch);
		return $re;
	}

	public static  function login_post($url, $cookie, $post) { 
    		$curl = curl_init();
    		curl_setopt($curl, CURLOPT_URL, $url); 
   		curl_setopt($curl, CURLOPT_HEADER, 0); 
    		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0); 
    		curl_setopt($curl, CURLOPT_COOKIEJAR, $cookie); //设置Cookie信息保存在指定的文件中 
    		curl_setopt($curl, CURLOPT_POST, 1);
    		curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post)); 
    		$ret = curl_exec($curl);
    		curl_close($curl);
		return $ret;
	} 
	

	public static function request_content($url, $cookie, $post) { 
  		$ch = curl_init(); 
    		curl_setopt($ch, CURLOPT_URL, $url); 
    		curl_setopt($ch, CURLOPT_HEADER, 0); 
    		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
   		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); //设置cookie 
    		curl_setopt($ch, CURLOPT_POST, 1);
	        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    		$ret = curl_exec($ch); 
    		curl_close($ch); 
    		return $ret; 
	} 

}
