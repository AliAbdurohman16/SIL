<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hasil_pemeriksaan extends CI_Model {

	public function select($select = '', $where = ''){
		if ($select != ''){
			$this->db->select($select);
		}
		if ($where != ''){
			$this->db->where($where);
		}
		
					$this->db->from('tbl_hasil_pemeriksaan');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'kode_registrasi'	=> @$data['kode_registrasi'],
			'parameter'			=> @$data['parameter'],
			'hasil'				=> @$data['hasil'] ?? 0.0,
		);

		$response = $this->db->insert('tbl_hasil_pemeriksaan', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_hasil_pemeriksaan', $data, ['hasil_id' => $data['hasil_id']]);
		return $response;
	}


	public function delete($id){
        $arr = array(
            'hasil_id' => $id
        );

		return $this->db->delete('tbl_hasil_pemeriksaan', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */