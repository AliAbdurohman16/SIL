<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilLaboratorium extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_hasil_pemeriksaan');
	}
	

	public function index()
	{
        $data = [
            'title' => "Informasi Nilai Kritis",
            'data'  => $this->M_hasil_pemeriksaan->select()->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/hasil_laboratorium', $data);
        $this->load->view('admin/partials/footer', $data);
	}

    public function delete($id){
        $result = $this->M_hasil_pemeriksaan->delete($id);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

        redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }
}
