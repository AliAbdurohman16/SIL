<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Pembayaran extends CI_Model {

	public function select($select = '', $where = ''){
		if ($select != ''){
			$this->db->select($select);
		}
		if ($where != ''){
			$this->db->where($where);
		}
					$this->db->from('tbl_pembayaran');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'invoice'					=> @$data['invoice'],
			'kode_registrasi'			=> @$data['kode_registrasi'],
            'nama'                      => @$data['nama'],
			'jenis_pemeriksaan'			=> @$data['jenis_pemeriksaan'],
			'tanggal'		            => @$data['tanggal'],
            'total'                     => @$data['total']
		);

		$response = $this->db->insert('tbl_pembayaran', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_pembayaran', $data, ['id' => $data['id']]);
		return $response;
	}


	public function delete($id){
        $arr = array(
            'id' => $id
        );

		return $this->db->delete('tbl_pembayaran', $arr);
	}

    public function report($start_date, $end_date){
        $this->db->select('*');
        $this->db->from('tbl_pembayaran');
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $response = $this->db->get();
        return $response;
    }
    
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */