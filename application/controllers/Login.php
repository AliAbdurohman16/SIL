<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		if ($this->session->userdata('status') != null) {
			redirect('admin/home');
		} else {
			$this->load->view('auth/login');
		}
	}

	public function secure()
	{
		$data = $this->input->post();
		$username = trim($data['username']);
		$password = trim($data['password']);

		$data = $this->db->get_where('tbl_user', ['username' => $username, 'password' => md5($password)]);

		if ($data->num_rows() == 0) {
			$flash_data = [
				'error' => 'Username atau Password salah',
				'username' => $username,
			];
			$this->session->set_flashdata($flash_data);
			redirect('auth');
		} else {
			date_default_timezone_set('Asia/Jakarta');
			$session = [
				'userdata' => $data->row(),
				'status' => "Loged in"
			];


			$this->session->set_userdata('file_manager', true);
			$this->session->set_userdata($session);

			$flash_data = [
				'message' => 'Berhasil Login!',
			];
			$this->session->set_flashdata($flash_data);
			redirect('admin/home');
		}
	}

	public function signout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
}
