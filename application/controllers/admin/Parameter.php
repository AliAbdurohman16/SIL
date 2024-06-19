<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parameter extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_parameter');
	}
	

	public function index()
	{
        $data = [
            'title' => "Data Parameter",
            'data'  => $this->M_parameter->select()->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/parameter', $data);
        $this->load->view('admin/partials/footer', $data);
	}

    public function prosesadd(){
        $data = $this->input->post();

        $result = $this->M_parameter->insert($data);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil ditambahkan."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal ditambahkan."));
		}

        redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }

	public function editProccess($id = '')
	{
		$data = $this->input->post();
		$data['id'] = $id;

		$result = $this->M_parameter->update($data);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect($this->uri->segment(1)."/".$this->uri->segment(2));
	}
	
    public function delete($id){
        $result = $this->M_parameter->delete($id);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

        redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }
}
