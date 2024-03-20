<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rekam_medis extends CI_Model {

	public function select($id = '', $email = '', $role = ''){
		if ($id != ''){
			$this->db->where('id_user', $id);
		}
		if ($email != ''){
			$this->db->where('email', $email);
		}
		if ($role != ''){
			$this->db->where('role', $role);
		}
					$this->db->select('tbl_rekam_medis.*, tbl_customers.nama');
					$this->db->join('tbl_customers', 'tbl_customers.nik = tbl_rekam_medis.nik', 'left');
					$this->db->from('tbl_rekam_medis');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'no_rekam_medis'		=> @$data['no_rekam_medis'],
			'nik'					=> @$data['nik'],
			'kode_registrasi'		=> @$data['kode_registrasi'],
			'jenis_pemeriksaan'		=> $data['jenis_pemeriksaan'],
			'parameter'				=> @$data['parameter'],
			'catatan'				=> @$data['catatan'],
			'status'				=> @$data['status'],
			'tanggal'				=> date('Y-m-d')
		);

		$response = $this->db->insert('tbl_rekam_medis', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_rekam_medis', $data, ['id_user' => $data['id_user']]);
		return $response;
	}


	public function delete($id){
        $arr = array(
            'id' => $id
        );

		return $this->db->delete('tbl_rekam_medis', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */