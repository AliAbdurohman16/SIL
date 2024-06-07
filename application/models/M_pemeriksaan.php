<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemeriksaan extends CI_Model {

	public function select($select = '', $where = ''){
		if ($select != ''){
			$this->db->select($select);
		}
		if ($where != ''){
			$this->db->where($where);
		}
		
					$this->db->select('tbl_pemeriksaan.*, tbl_customers.nama, tbl_status.*');
					$this->db->join('tbl_customers', 'tbl_customers.no_rekam_medis = tbl_pemeriksaan.no_rekam_medis', 'left');
					$this->db->join('tbl_status', 'tbl_status.code = tbl_pemeriksaan.status');
					$this->db->order_by('tbl_pemeriksaan.isCito', 'DESC');
					$this->db->order_by('tbl_pemeriksaan.tanggal', 'ASC');
					$this->db->from('tbl_pemeriksaan');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'no_rekam_medis'		=> @$data['no_rekam_medis'],
			'kode_registrasi'		=> @$data['kode_registrasi'],
			'jenis_pemeriksaan'		=> @$data['jenis_pemeriksaan'],
			'catatan'				=> @$data['catatan'],
			'isCito'				=> @$data['isCito'],
			'status'				=> @$data['status'] ?? 'AKTIF',
			'tanggal'				=> date('Y-m-d H:i:s')
		);

		$response = $this->db->insert('tbl_pemeriksaan', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_pemeriksaan', $data, ['id' => $data['id']]);
		return $response;
	}


	public function delete($id){
        $arr = array(
            'id' => $id
        );

		return $this->db->delete('tbl_pemeriksaan', $arr);
	}

	public function generateCode()
	{
		$getData = $this->db->order_by('kode_registrasi', 'DESC')->get('tbl_pemeriksaan');
		if ($getData->num_rows() > 0){
			$getData = $getData->row();
			$getNumber = substr($getData->kode_registrasi, 0, 4) + 1;
			if (strlen($getNumber) == 1){
				$nol = "000";
			}else if(strlen($getNumber) == 2){
				$nol = "00";
			}else if(strlen($getNumber) == 3){
				$nol = "0";
			}else if(strlen($getNumber) == 4){
				$nol = "";
			}
			$autoGen = $nol.$getNumber."/REG/SIL/".date('m')."/".date('Y');
		}else{
			$autoGen = "0001/REG/SIL/".date('m')."/".date('Y');
		}

		return $autoGen;
	}

	public function jmlPasien() {
		$currentMonth = date('m');
		$currentYear = date('Y');
		
		$this->db->where('MONTH(tanggal)', $currentMonth);
		$this->db->where('YEAR(tanggal)', $currentYear);
		$this->db->from('tbl_pemeriksaan');
		return $this->db->count_all_results();
	}

	public function jmlPemeriksaan() {
		$date = date('Y-m-d');
		
		$this->db->where('DATE(tanggal)', $date);
		$this->db->from('tbl_pemeriksaan');
		return $this->db->count_all_results();
	}

	public function jmlPemeriksaanSelesai() {
		$date = date('Y-m-d');
		
		$this->db->where('DATE(tanggal)', $date);
		$this->db->where('status', 'SELESAI');
		$this->db->from('tbl_pemeriksaan');
		return $this->db->count_all_results();
	}


	public function jmlGrafik() {
		$currentMonth = date('m');
		$currentYear = date('Y');

        $this->db->select('MONTH(tanggal) as bulan, 
                           SUM(CASE WHEN tbl_customers.jenis_kelamin = "Laki-laki" THEN 1 ELSE 0 END) as laki_laki,
                           SUM(CASE WHEN tbl_customers.jenis_kelamin = "Perempuan" THEN 1 ELSE 0 END) as perempuan');
        $this->db->from('tbl_pemeriksaan');
        $this->db->join('tbl_customers', 'tbl_customers.no_rekam_medis = tbl_pemeriksaan.no_rekam_medis', 'left');
		$this->db->where('MONTH(tanggal)', $currentMonth);
        $this->db->where('YEAR(tanggal)', $currentYear);
        $this->db->group_by('MONTH(tanggal)');
        $this->db->order_by('MONTH(tanggal)', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */