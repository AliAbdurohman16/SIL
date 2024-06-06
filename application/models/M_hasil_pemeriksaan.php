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

	public function selectJoin($select = '', $where = ''){
		if ($select != ''){
			$this->db->select($select);
		}
		if ($where != ''){
			$this->db->where($where);
		}
		
					$this->db->select('tbl_hasil_pemeriksaan.*, tbl_pemeriksaan.*, tbl_customers.*, tbl_parameter.jenis_pemeriksaan, tbl_parameter.satuan');
					$this->db->join('tbl_pemeriksaan', 'tbl_pemeriksaan.kode_registrasi = tbl_hasil_pemeriksaan.kode_registrasi');
					$this->db->join('tbl_customers', 'tbl_customers.no_rekam_medis = tbl_pemeriksaan.no_rekam_medis', 'left');
					$this->db->join('tbl_parameter', 'tbl_parameter.nama = tbl_hasil_pemeriksaan.parameter', 'left');
					$this->db->order_by('tbl_hasil_pemeriksaan.tgl_selesai', 'ASC');
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
			'tgl_pengujian'		=> @$data['tgl_pengujian'] ?? null,
			'tgl_selesai'		=> @$data['tgl_selesai'] ?? null
		);

		$response = $this->db->insert('tbl_hasil_pemeriksaan', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_hasil_pemeriksaan', $data, ['hasil_id' => $data['hasil_id']]);
		return $response;
	}


	public function delete($id, $where = ''){
		if ($where == ''){
			$arr = array(
				'hasil_id' => $id
			);
		}else{
			$arr = $where;
		}

		return $this->db->delete('tbl_hasil_pemeriksaan', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */