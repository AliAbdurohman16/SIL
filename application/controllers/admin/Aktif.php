<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aktif extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_pemeriksaan');
        $this->load->model('M_customers');
	}
	
	public function index()
	{
        $data = [
            'title' => "Aktif",
            'data'  => $this->M_pemeriksaan->select()->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/aktif', $data);
        $this->load->view('admin/partials/footer', $data);
	}

    public function prosesadd(){
        $data = $this->input->post();

        //checking customer
        $cekData = $this->M_customers->select('', ['no_rekam_medis' => $data['no_rekam_medis']]);
        if ($cekData->num_rows() > 0){

        }else{
            //saving to customers
            $resultCust = $this->M_customers->insert($data);
        }

        $result = $this->M_pemeriksaan->insert($data);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}
        
        redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }

    

    public function delete($id){
        $result = $this->M_pemeriksaan->delete($id);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

        redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }
}
