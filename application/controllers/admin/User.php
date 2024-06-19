<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends AUTH_Controller {
	function __construct()
	{
		parent::__construct();
        $this->load->model('M_user');
	}
	

	public function index()
	{
        $data = [
            'title' => "Data Admin",
            'data'  => $this->M_user->select()->result()
        ];
        $this->load->view('admin/partials/header', $data);
        $this->load->view('admin/partials/sidenav', $data);
        $this->load->view('admin/partials/navbar', $data);
        $this->load->view('admin/admin', $data);
        $this->load->view('admin/partials/footer', $data);
	}

    public function prosesadd(){
        $data = $this->input->post();

        $result = $this->M_user->insert($data);

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
		$data['id_user'] = $id;
        if (@$data['password'] == ""){
            unset($data['password']);
        }else{
            $data['password'] = md5($data['password']);
        }

		$result = $this->M_user->update($data);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil diubah."));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal diubah."));
		}

		redirect($this->uri->segment(1)."/".$this->uri->segment(2));
	}
	
    public function delete($id){
        $result = $this->M_user->delete($id);

		if ($result){
			$this->session->set_flashdata('msg', swal("succ", "Data berhasil dihapus"));
		}else{
			$this->session->set_flashdata('msg', swal("err", "Data gagal dihapus"));
		}

        redirect($this->uri->segment(1)."/".$this->uri->segment(2));
    }
}
