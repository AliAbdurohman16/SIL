<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
	}

    public function index()
    {
        $data = [
            'title' => "Pembayaran",
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/partials/footer', $data);
    }
}