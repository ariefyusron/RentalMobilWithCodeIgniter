<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (empty($this->session->userdata('username'))) {
			redirect();
		}
	}

	public function index($page = 'mobil')
	{
		$data['notif'] = $this->session->flashdata('notif');
		$data['data'] = $this->model_app->profil($this->session->userdata('username'));
		$data['page'] = $page;
		$data['title'] = 'App - Data '.ucfirst($page);

		if ($page=='pengaturan' or $page=='profil') {
			$data['title'] = 'App - '.ucfirst($page);
		}

		$data['datamobil'] = $this->model_app->data_mobil();
		$data['datapenyewa'] = $this->model_app->data_penyewa();

		$this->load->view('app/view_content',$data);
	}

	public function addmobil()
	{
		$data = $this->input->post(array('nama', 'merk', 'harga', 'jumlah'));
		
		$this->model_app->add_mobil($data);
	}

	public function editmobil()
	{
		$data = $this->input->post(array('id','nama', 'merk', 'harga', 'jumlah'));
		
		$this->model_app->edit_mobil($data);
	}

	public function hapusmobil($a)
	{
		$this->model_app->hapus_mobil($a);	
	}

	public function addpenyewa()
	{
		$data = $this->input->post(array('nik', 'nama', 'mobil', 'hari','tanggal','jam','hp'));
		
		$this->model_app->add_penyewa($data);
	}

	public function editpenyewa()
	{
		$data = $this->input->post(array('id', 'status'));
		
		$this->model_app->edit_penyewa($data);
	}

	public function hapuspenyewa($a)
	{
		$this->model_app->hapus_penyewa($a);
	}

	public function gantifoto()
	{
		$data['upload_path'] = './assets/img/';
        $data['allowed_types'] = 'gif|jpg|png';
        $data['file_name'] = uniqid();

        $this->load->library('upload', $data);

        if ( ! $this->upload->do_upload('foto'))
        {
            $this->session->set_flashdata('notif','
						<div class="alert alert-danger alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        	Foto gagal diganti!
                        </div>
					');
			redirect('app/pengaturan');
        } else {
        	$ext = $this->upload->data();
        	$this->model_app->ganti_foto($this->session->userdata('username'),$ext['file_name']);
        }
	}

	public function cetak()
	{
		$data['data'] = $this->model_app->profil($this->session->userdata('username'));
		$waktu = $this->input->post('waktu');

		$data['print'] = $this->model_app->laporan($waktu);
		$data['total'] = $this->model_app->total($waktu);

		$this->load->view('app/view_print',$data);
	}

	public function gantipassword()
	{
		$data = $this->input->post(array('passlama','passbaru','passbarulagi'));
		
		$this->model_app->ganti_password($this->session->userdata('username'),$data);
	}

}