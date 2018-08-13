<?php defined('BASEPATH') OR exit('no direct script access allowed');

/**
 * 
 */
class Barang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library(array('aauth', 'form_validation','datatables','template'));
		$this->load->helper(array('url', 'language','form'));
		$this->load->model('Barang_model','ibarang');

	}

	public function index(){

		if(!$this->aauth->is_loggedin())
		{
			$this->load->view('account/login');
		}
		else if (!$this->aauth->is_admin())
		{
			$this->template->load('layout/template','barang/index');
		}
		else
		{
			$this->template->load('layout/template','barang/index');
		}
	}

	public function ajax_list()
	{
		$list = $this->ibarang->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $ibarang) {
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $ibarang->firstname;
			$row[] = $ibarang->lastname;
			$row[] = $ibarang->dob;
			$row[] = $ibarang->gender;
			$row[] = $ibarang->address;
			
			//add html for action
			$row[] = '<a class="btn btn-primary btn-xs" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$ibarang->id."'".')"><i class="fa fa-pencil"></i></a>
				  <a class="btn btn-danger btn-xs" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$ibarang->id."'".')"><i class="fa fa-trash"></i></a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->ibarang->count_all(),
						"recordsFiltered" => $this->ibarang->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->ibarang->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		$this->_validate();
		$data = array(
				'firstname' => $this->input->post('firstName'),
				'lastname' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);
		$insert = $this->ibarang->save($data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
				'firstname' => $this->input->post('firstName'),
				'lastname' => $this->input->post('lastName'),
				'gender' => $this->input->post('gender'),
				'address' => $this->input->post('address'),
				'dob' => $this->input->post('dob'),
			);
		$this->ibarang->update(array('id' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		$this->ibarang->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}

	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = TRUE;

		if($this->input->post('firstName') == '')
		{
			$data['inputerror'][] = 'firstName';
			$data['error_string'][] = 'First name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('lastName') == '')
		{
			$data['inputerror'][] = 'lastName';
			$data['error_string'][] = 'Last name is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('dob') == '')
		{
			$data['inputerror'][] = 'dob';
			$data['error_string'][] = 'Date of Birth is required';
			$data['status'] = FALSE;
		}

		if($this->input->post('gender') == '')
		{
			$data['inputerror'][] = 'gender';
			$data['error_string'][] = 'Please select gender';
			$data['status'] = FALSE;
		}

		if($this->input->post('address') == '')
		{
			$data['inputerror'][] = 'address';
			$data['error_string'][] = 'Addess is required';
			$data['status'] = FALSE;
		}

		if($data['status'] === FALSE)
		{
			echo json_encode($data);
			exit();
		}
	}
	

}