<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AUTH_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('M_user');
		$this->load->model('M_parameter');
		$this->load->model('M_jenis_pemeriksaan');
		$this->load->model('M_hasil_pemeriksaan');
		date_default_timezone_set('asia/jakarta');

		$this->session->set_flashdata('segment', explode('/', $this->uri->uri_string()));
		if ($this->session->userdata('status') == '') {
			redirect('Login');
		}else{
			$data = $this->db->get_where('tbl_user', ['username' => $this->session->userdata('userdata')->username]);

			if ($data->num_rows() > 0){
				$data = $data->row();
				$this->userdata = $data;

			}else{
				redirect('Login/signout');
				
			}
			
		}
	}

}

/* End of file MY_Auth.php */
/* Location: ./application/core/MY_Auth.php */