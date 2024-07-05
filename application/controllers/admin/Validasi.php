<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validasi extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_pemeriksaan');
        $this->load->model('M_customers');
        $this->load->model('M_hasil_pemeriksaan');
	}
	
	public function index()
	{
        $data = [
            'title' => "Validasi",
            'data'  => $this->M_pemeriksaan->select('', ['status' => 'VERIF'])->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/validasi', $data);
        $this->load->view('admin/partials/footer', $data);
	}

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['id'] = $id;

        $selectData = $this->M_pemeriksaan->select('', ['tbl_pemeriksaan.id' => $data['id']]);
        if ($selectData->num_rows() > 0){
            $selectData = $selectData->row();

            $this->M_hasil_pemeriksaan->delete('', ['kode_registrasi' => $selectData->kode_registrasi]);

            for ($i =0; $i < count($data['parameter']); $i++){
                $arr = array(
                    'kode_registrasi'   => $selectData->kode_registrasi,
                    'parameter'         => $data['parameter'][$i],
                    'hasil'             => $data['hasil'][$i] ?? 0,
                    'tgl_pengujian'     => $data['tgl_pengujian'][$i] ?? null,
                    'tgl_selesai'       => $data['tgl_selesai'][$i] ?? null
                );
                $result = $this->M_hasil_pemeriksaan->insert($arr);
            }


            if ($result){
                $this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
            }else{
                $this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
            }
        }else{
            $this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
        }
		redirect($this->uri->segment(1)."/".$this->uri->segment(2));
	}
    
    public function validnow($id)
    {
        $cekData = $this->M_pemeriksaan->select('', ['tbl_pemeriksaan.id' => $id]);
        
        if ($cekData->num_rows() > 0){
            $cek = $cekData->row();

            $data = $this->M_hasil_pemeriksaan->select('', ['kode_registrasi' => $cek->kode_registrasi])->row();
            
            if ($data->hasil != 0 && $data->tgl_pengujian != null && $data->tgl_selesai != null) {
                $arr = array(
                    'status'    => 'VALID',
                    'id'        => $id
                );
                $result = $this->M_pemeriksaan->update($arr);

                $hasil = [
                    'hasil_id' => $data->hasil_id,
                    'dokter' => $this->userdata->nama
                ];

                $this->M_hasil_pemeriksaan->update($hasil);


                if ($result){
                    $this->session->set_flashdata('msg', swal("succ", "Data berhasil divalidasi."));
                } else {
                    $this->session->set_flashdata('msg', swal("err", "Data gagal divalidasi."));
                }
            } else {
                $this->session->set_flashdata('msg', swal("err", "Data tidak dapat divalidasi karena Hasil, Tanggal Pengujian, atau Tanggal Selesai belum diisi!"));
            }

        } else {
            $this->session->set_flashdata('msg', swal("err", "Data gagal divalidasi."));
        }
        redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }
}
