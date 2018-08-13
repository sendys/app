<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller 
{
	public function __construct(){
		parent:: __construct();
		$this->load->database();
		$this->load->library(array('aauth', 'form_validation','datatables','template'));
		$this->load->helper(array('url', 'language','form'));
	}

	public function dashboard()
	{
		if(!$this->aauth->is_loggedin())
		{
			$this->load->view('account/login');
		}
		else if (!$this->aauth->is_admin())
		{
			$this->template->load('layout/template','account/dashboard');
		}
		else
		{
			$this->template->load('layout/template','account/dashboard');
		}
		
	}

	public function sign_out()
	{
		if(!$this->aauth->is_loggedin()){
			redirect('welcome');
		}
		$this->aauth->logout();
		redirect('welcome');
	}

	public function index()
	{
		if($this->aauth->is_loggedin()){
			redirect('account/dashboard');
		}
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			if($this->input->post('remember') == 'TRUE'){
				$remember = TRUE;
			}else{
				$remember = FALSE;
			}
			if($this->aauth->login($email, $password)){
				redirect('account/dashboard');
			}else{
				$this->session->set_flashdata('gagal',' Username atau password yang ada ketik belum benar, silakan kembali saat kemudian');
				redirect(base_url('/'));
			}
		}else{
			$this->load->view('account/login');
		}
	}

	public function sign_up()
	{
		if(!$this->aauth->is_loggedin())
		{
			redirect('account/login');
		}

		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$name = $this->input->post('name');

			if($this->aauth->create_user($email, $password, $name)){
				$this->aauth->info('Your account has been created successfully and is ready to use. You can use the Login form.');
				$this->template->load('layout/template','account/dashboard');
				//redirect('account/login');
			}else{
				$this->template->load('layout/template','account/sign_up');
				
			}
		}else{
			$this->template->load('layout/template','account/sign_up');
			
		}
	}

	public function remind_password()
	{
		if($this->aauth->is_loggedin()){
			redirect('account/dashboard');
		}
		if($this->input->post()){
			$email = $this->input->post('email');

			$this->aauth->remind_password($email);
			$this->aauth->info('The Account Verification mail will be sent to your email address.');

			$this->load->view('account/remind_password');
		}else{
			$this->load->view('account/remind_password');
		}
	}

	public function reset_password()
	{
		if($this->aauth->is_loggedin()){
			redirect('account/dashboard');
		}
		if($this->input->post()){
			$user_id = $this->input->post('user_id');
			$ver_code = $this->input->post('verification_code');

			if($this->aauth->reset_password($user_id, $ver_code)){
				$this->aauth->info('A new password will be sent to your email address.');
			}else{
				$this->aauth->error('E-mail Address and Verification Code do not match.');
			}
			$this->load->view('account/reset_password');
		}else{
			$this->load->view('account/reset_password');
		}
	}
	public function update()
	{
		if(!$this->aauth->is_loggedin()){
			redirect('account/sign_in');
		}
		if($this->input->post()){
			$user = $this->aauth->get_user();
			$user_id = $user->id;
			if(!empty($this->input->post('email'))){
				$email = $this->input->post('email');
			}else{
				$email = FALSE;
			}
			if(!empty($this->input->post('password'))){
				$password = $this->input->post('password');
			}else{
				$password = FALSE;
			}
			if(!empty($this->input->post('name'))){
				$name = $this->input->post('name');
			}else{
				$name = FALSE;
			}
			if($email == FALSE AND $password == FALSE AND $name == FALSE){
				$this->load->view('account/update');
				return FALSE;
			}
			if($this->aauth->update_user($user_id, $email, $password, $name)){
				$this->aauth->info('Your account has been updated successfully.');
			}
			$this->load->view('account/update');
		}else{
			$this->load->view('account/update');
		}
	}

	public function logout()
	{
		$this->data['title'] = "Logout";

		// log the user out
		$logout = $this->aauth->logout();
		$this->aauth->logout();
		redirect(base_url('/'));
	}
}
