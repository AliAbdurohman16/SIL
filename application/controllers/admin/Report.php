<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_pembayaran');
	}

    public function index()
    {
        $data = [
            'title' => "Laporan",
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/report', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function prosess(){
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');

        $data = [
            'title'         => "Laporan",
            'data'          => $this->M_pembayaran->report($start_date, $end_date)->result(),
            'start_date'    => $start_date,
            'end_date'      => $end_date
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/laporan/index', $data);
    }
}