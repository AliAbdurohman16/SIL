<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_pembayaran');
	}

    public function index()
    {
        $data = [
            'title' => "Pembayaran",
            'data'  => $this->M_pembayaran->select()
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('admin/partials/footer', $data);
    }

    public function cetakInvoice($invoice = ''){
        $data['invoice'] = $invoice;
        $data = [
            'title' => "Invoice",
            'data' => $this->M_pembayaran->select('', ['invoice' => $data['invoice']])[0]
        ];

        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/invoice/index', $data);
    }
}