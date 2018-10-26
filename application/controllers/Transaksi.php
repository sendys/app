<?php defined('BASEPATH') OR exit('no direct script access allowed');

class Transaksi extends CI_Controller
{
 
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->database();
		$this->load->library(array('aauth', 'form_validation','datatables','template'));
		$this->load->helper(array('url', 'language','form'));
    }

    public function index(){

		if(!$this->aauth->is_loggedin())
		{
			$this->load->view('account/login');
		}
		else if (!$this->aauth->is_admin())
		{
			$this->template->load('layout/template','transaksi/index');
		}
		else
		{
			$this->template->load('layout/template','transaksi/index');
		}
	}
}