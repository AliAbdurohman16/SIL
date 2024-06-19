<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends AUTH_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_pembayaran');
        $this->load->model('M_pemeriksaan');
    }

	public function index()
	{
        $data = [
            'title'         => "Dashboard",
            'pendapatan'    => $this->M_pembayaran->getMonthlyIncome(),
            'pasien'        => $this->M_pemeriksaan->jmlPasien(),
            'pemeriksaan'   => $this->M_pemeriksaan->jmlPemeriksaan(),
            'selesai'       => $this->M_pemeriksaan->jmlPemeriksaanSelesai(),
            'grafik'        => $this->M_pemeriksaan->jmlGrafik()
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('admin/partials/footer', $data);
	}
}
