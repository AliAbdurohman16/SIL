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
            'data'  => $this->M_hasil_pemeriksaan->selectJoin()->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/hasil_laboratorium', $data);
        $this->load->view('admin/partials/footer', $data);
	}

    public function exportPDF($id = ''){
        $data['id'] = $id;
        $data['data'] = $this->M_hasil_pemeriksaan->selectJoin('', ['hasil_id' => $data['id']])->row();
        $data['hasil'] = $this->M_hasil_pemeriksaan->selectJoin('', ['tbl_hasil_pemeriksaan.kode_registrasi' => $data['data']->kode_registrasi])->result();
        
        // Menghitung umur
        $birthdate = new DateTime($data['data']->tanggal_lahir);
        $today = new DateTime('today');
        $umur = $birthdate->diff($today)->y . ' tahun ' . $birthdate->diff($today)->m . ' bulan ' . $birthdate->diff($today)->d . ' hari';
        $data['umur'] = $umur;

        $this->load->view('admin/pdf/index', $data);
    }
}
