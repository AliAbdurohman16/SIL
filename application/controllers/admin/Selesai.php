<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Selesai extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_pemeriksaan');
        $this->load->model('M_customers');
	}
	
	public function index()
	{
        $data = [
            'title' => "Selesai",
            'data'  => $this->M_pemeriksaan->select('', ['status' => 'VALID'])->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/selesai', $data);
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
	
    public function selesainow($id)
    {
        $arr = array(
            'status'    => 'SELESAI',
            'id'        => $id
        );

        $cekData = $this->M_pemeriksaan->select('', ['tbl_pemeriksaan.id' => $id]);
        if ($cekData->num_rows() > 0){
            $result = $this->M_pemeriksaan->update($arr);

            if ($result){
                $this->session->set_flashdata('msg', swal("succ", "Data berhasil diselesaikan."));
            }else{
                $this->session->set_flashdata('msg', swal("err", "Data gagal diselesaikan."));
            }
        }else{
            $this->session->set_flashdata('msg', swal("err", "Data gagal diselesaikan."));
        }
		redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }
}
