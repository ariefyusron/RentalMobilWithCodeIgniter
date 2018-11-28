<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		if (!empty($this->session->userdata('username'))) {
			redirect('app');
		}
		
		$data['notif'] = $this->session->flashdata('notif');

		$this->load->view('view_login',$data);
	}

	public function auth()
	{
		$data = $this->input->post(array('username','password'));
		
		$this->model_login->auth($data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect();
	}
}