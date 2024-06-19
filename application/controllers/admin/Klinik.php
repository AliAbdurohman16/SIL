<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klinik extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_pemeriksaan');
        $this->load->model('M_customers');
        $this->load->model('M_pembayaran');
        $this->load->model('M_detail_pembayaran');
        $this->load->model('M_parameter');
        $this->load->model('M_hasil_pemeriksaan');
	}
	
	public function index()
	{
        $data = [
            'title' => "Klinik",
            'data'  => $this->M_pemeriksaan->select()->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/klinik', $data);
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

        // Generate one invoice for all parameters
        $invoice = 'INV' . rand(1000, 9999);
        $totalTarif = 0;

        $dataPembayaran = [
            'invoice'           => $invoice,
            'kode_registrasi'   => $data['kode_registrasi'],
            'nama'              => $data['nama'],
            'jenis_pemeriksaan' => $data['jenis_pemeriksaan'],
            'tanggal'           => date('Y-m-d H:i:s'),
            'total'             => $totalTarif
        ];

        $this->M_pembayaran->insert($dataPembayaran);

        foreach ($data['parameter'] as $parameter) {
            $parameterData = $this->M_parameter->select('', ['nama' => $parameter])->row();
    
            $dataDetailPembayaran = [
                'invoice'           => $invoice,
                'parameter'         => $parameter,
                'tarif'             => $parameterData->tarif
            ];
    
            $this->M_detail_pembayaran->insert($dataDetailPembayaran);

            $totalTarif += $parameterData->tarif;
    
            $hasilPemeriksaan = [
                'kode_registrasi'   => $data['kode_registrasi'],
                'parameter'         => $parameter
            ];
    
            $this->M_hasil_pemeriksaan->insert($hasilPemeriksaan);
            
        }

        $dataPembayaran = [
            'invoice' => $invoice, 
            'total' => $totalTarif
        ];

        $this->M_pembayaran->updateTotal($dataPembayaran);

		if ($hasilPemeriksaan){
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

    public function cekRM()
    {
        $data = $this->input->get();

        $cekData = $this->M_customers->select('', ['no_rekam_medis' => $data['noRM']]);
        if ($cekData->num_rows() > 0){
            $dataReturn = array(
                'status' => true,
                'data'   => $cekData->row()
            );
        }else{
            $dataReturn = array(
                'status' => false,
                'data'   => null
            );
        }

        echo json_encode($dataReturn);
    }

    public function cekNik()
    {
        $data = $this->input->get();

        $cekData = $this->M_customers->select('', ['nik' => $data['nik']]);
        if ($cekData->num_rows() > 0){
            $dataReturn = array(
                'status' => true,
                'data'   => $cekData->row()
            );
        }else{
            $dataReturn = array(
                'status' => false,
                'data'   => null
            );
        }

        echo json_encode($dataReturn);
    }

    public function cekNama()
    {
        $data = $this->input->get();

        $cekData = $this->M_customers->select('', ['nama' => $data['nama']]);
        if ($cekData->num_rows() > 0){
            $dataReturn = array(
                'status' => true,
                'data'   => $cekData->row()
            );
        }else{
            $dataReturn = array(
                'status' => false,
                'data'   => null
            );
        }

        echo json_encode($dataReturn);
    }
}
