<?php defined('BASEPATH') OR exit('no direct script access allowed');

class Grup extends CI_Controller
{
 
    public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('aauth', 'form_validation','datatables','template'));
		$this->load->helper(array('url', 'language','form'));
		$this->load->model('Kategori_model','igrup');

	}

	public function index(){

		if(!$this->aauth->is_loggedin())
		{
			$this->load->view('account/login');
		}
		else if (!$this->aauth->is_admin())
		{
			$this->template->load('layout/template','grup/index');
		}
		else
		{
			$this->template->load('layout/template','grup/index');
		}
	}

	public function ajax_list()
	{
		$list = $this->igrup->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $igrup) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $igrup->kategori;
			//add html for action
			$row[] = '<a class="btn btn-primary btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$igrup->id."'".')"><i class="fa fa-pencil" aria-hidden="true"></i>&nbspEdit</a>
				      <a class="btn btn-danger btn-xs" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$igrup->id."'".')"><i class="fa fa-trash" aria-hidden="true"></i>&nbspDelete</a>';
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->igrup->count_all(),
						"recordsFiltered" => $this->igrup->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function create_ket(){
		$this->igrup->save();
	}

}