<?php
require_once('thirdparty/htmlpurifier/HTMLPurifier.standalone.php');
class Purifier {
	static $config;
	
	static function setConfig($namespace, $key, $value) {
		if (!isset(self::$config)) {
			self::$config = HTMLPurifier_Config::createDefault();
		}
		self::$config->set($namespace, $key, $value);
	}
		
	static function Purify($input) {
		if ( !isset(self::$config) ) {
			self::$config = HTMLPurifier_Config::createDefault();
		}
		$purifier = new HTMLPurifier(self::$config);
		return $purifier->purify($input);				
	}
}