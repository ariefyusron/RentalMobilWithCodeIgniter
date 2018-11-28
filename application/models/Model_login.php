<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_Model {

	public function auth($data)
	{
		$query = $this->db->query("SELECT * FROM admin WHERE uname='{$data['username']}';");
		if ($query->num_rows()>0) {
			$pass = $query->row_array();
			$cek_pass = password_verify($data['password'],$pass['pass']);
			if ($cek_pass) {
				$this->session->set_userdata('username',$data['username']);
				redirect('app');
			} else {
				$this->session->set_flashdata('notif','
						<div class="form-group">
							<p class="text-danger">Password salah!</p>
						</div>
					');
				redirect();				
			}
		} else {
			$this->session->set_flashdata('notif','
					<div class="form-group">
						<p class="text-danger">Username tidak terdaftar!</p>
					</div>
				');
			redirect();
		}
	}
	
}