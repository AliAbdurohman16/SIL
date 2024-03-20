<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_rekam_medis');
        $this->load->model('M_customers');
	}
	
	public function index()
	{
        $data = [
            'title' => "Klinik",
            'data'  => $this->M_rekam_medis->select()->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/klinik', $data);
        $this->load->view('admin/partials/footer', $data);
	}

    public function prosesadd(){
        $data = $this->input->post();

        //saving to customers
        $resultCust = $this->M_customers->insert($data);

        if ($resultCust){
            $result = $this->M_rekam_medis->insert($data);

            if ($result){
                echo "Ini masuk";
            }else{
                echo "ini gagal";
            }
        }

        redirect('admin/klinik');
    }

    public function delete($id){
        $result = $this->M_rekam_medis->delete($id);

        if ($result){
            echo "ini sukses";
        }else{
            echo "ini gagal";
        }

        redirect('admin/klinik');
    }
}
