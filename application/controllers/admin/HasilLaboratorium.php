<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HasilLaboratorium extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_hasil_pemeriksaan');
        $this->load->library('email');
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

    public function sendEmail($id = ''){
        $data['id'] = $id;
        $data['data'] = $this->M_hasil_pemeriksaan->selectJoin('', ['hasil_id' => $data['id']])->row();
        $data['hasil'] = $this->M_hasil_pemeriksaan->selectJoin('', ['tbl_hasil_pemeriksaan.kode_registrasi' => $data['data']->kode_registrasi])->result();
        
        // Menghitung umur
        $birthdate = new DateTime($data['data']->tanggal_lahir);
        $today = new DateTime('today');
        $umur = $birthdate->diff($today)->y . ' tahun ' . $birthdate->diff($today)->m . ' bulan ' . $birthdate->diff($today)->d . ' hari';
        $data['umur'] = $umur;

        $pdf_content = $this->load->view('admin/email/attachment', $data, true);
        $email_content = $this->load->view('admin/email/index', $data, true);

        // Email configuration
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'mail.ssnrc08.com',
            'smtp_port' => 465,
            'smtp_user' => 'singgasana-sport@ssnrc08.com',
            'smtp_pass' => '{3mvY+PX.&R8',
            'smtp_crypto' => 'ssl',
            'mailtype'  => 'html', 
            'charset'   => 'utf-8'
        );

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");

        // Set email parameters
        $this->email->from('singgasana-sport@ssnrc08.com', 'SIL Official');
        $this->email->to($data['data']->email);
        $this->email->subject('Laboratorium Hasil');
        $this->email->message($email_content);
        $this->email->attach($pdf_content, 'attachment', 'file.pdf', 'application/pdf'); 

        // Send the email
        if ($this->email->send()) {
            $this->session->set_flashdata('msg', swal("succ", "Berhasil dikirim ke email."));
            redirect($this->uri->segment(1)."/".$this->uri->segment(2));
        } else {
            show_error($this->email->print_debugger());
        }
    }
}
