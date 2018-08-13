<?php 
defined('BASEPATH') or exit('no direct script access not allowed');

class template 
{
	
	var $layout = array();

	function set($nama, $value)
	{
		$this->layout[$nama] =  $value;
	}

	function load($template='', $view='', $view_data= array(), $return= FALSE)
	{
		$this->CI =& get_instance();
		$this->set('contents', $this->CI->load->view($view, $view_data, TRUE));
		return $this->CI->load->view($template, $this->layout, $return);
	}
}

