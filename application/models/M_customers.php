<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_customers extends CI_Model {

	public function select($select = '', $where = ''){
		if ($select != ''){
			$this->db->select($select);
		}
		if ($where != ''){
			$this->db->where($where);
		}
					$this->db->from('tbl_customers');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'no_rekam_medis'	=> @$data['no_rekam_medis'],
			'nik'				=> @$data['nik'],
			'nama'				=> @$data['nama'],
			'email'				=> @$data['email'],
			'alamat'			=> $data['alamat'],
			'tempat_lahir'		=> @$data['tempat_lahir'],
			'tanggal_lahir'		=> @$data['tanggal_lahir'],
			'jenis_kelamin'		=> @$data['jenis_kelamin'],
			'no_hp'				=> @$data['no_hp']
		);

		$response = $this->db->insert('tbl_customers', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_customers', $data, ['id' => $data['id']]);
		return $response;
	}


	public function delete($id){
        $arr = array(
            'id' => $id
        );

		return $this->db->delete('tbl_customers', $arr);
	}

	public function generateCode()
	{
		$getData = $this->db->order_by('no_rekam_medis', 'DESC')->get('tbl_customers');
		if ($getData->num_rows() > 0){
			$getData = $getData->row();
			$getNumber = substr($getData->no_rekam_medis, 0, 4) + 1;
			if (strlen($getNumber) == 1){
				$nol = "000";
			}else if(strlen($getNumber) == 2){
				$nol = "00";
			}else if(strlen($getNumber) == 3){
				$nol = "0";
			}else if(strlen($getNumber) == 4){
				$nol = "";
			}
			$autoGen = $nol.$getNumber."/SIL/RM/".date('m')."/".date('Y');
		}else{
			$autoGen = "0001/SIL/RM/".date('m')."/".date('Y');
		}

		return $autoGen;
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */