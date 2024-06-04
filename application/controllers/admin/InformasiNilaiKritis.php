<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InformasiNilaiKritis extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
	}
	

	public function index()
	{
        $data = [
            'title' => "Informasi Nilai Kritis",
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/informasi_nilai_kritis', $data);
        $this->load->view('admin/partials/footer', $data);
	}
}
