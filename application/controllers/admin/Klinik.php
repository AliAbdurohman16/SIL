<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik extends AUTH_Controller {

	public function index()
	{
        $data = [
            'title' => "Klinik",
            'active1' => "",
            'active2' => "active",
            'active3' => "",
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/klinik', $data);
        $this->load->view('admin/partials/footer', $data);
	}
}
