<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends AUTH_Controller {
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
        $this->load->view('admin/informasi', $data);
        $this->load->view('admin/partials/footer', $data);
	}
}
