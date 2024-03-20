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

    public function delete($id){
        $result = $this->M_user->delete($id);

        if ($result){
            echo "ini sukses";
        }else{
            echo "ini gagal";
        }

        redirect('admin/user');
    }
}
