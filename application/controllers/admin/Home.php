<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {

	public function index()
	{
        $data = [
            'title' => "Dashboard",
            'active1' => "active",
            'active2' => "",
            'active3' => "",
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/partials/footer', $data);
	}
}
