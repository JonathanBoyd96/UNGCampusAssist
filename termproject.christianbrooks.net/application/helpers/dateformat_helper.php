<?
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('dateFormat'))
{
	function dateFormat($timestamp)
	{
		$CI =& get_instance();
		return date("Y-d-m H:i:s",$timestamp);
	}
}

?>