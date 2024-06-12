<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_detail_pembayaran extends CI_Model {

	public function select($select = '', $where = ''){
		if ($select != ''){
			$this->db->select($select);
		}
		if ($where != ''){
			$this->db->where($where);
		}
					$this->db->from('tbl_detail_pembayaran');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'invoice'		=> @$data['invoice'],
			'parameter'		=> @$data['parameter'],
            'tarif'			=> @$data['tarif']
		);

		$response = $this->db->insert('tbl_detail_pembayaran', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_detail_pembayaran', $data, ['id' => $data['id']]);
		return $response;
	}

	public function delete($id){
        $arr = array(
            'id' => $id
        );

		return $this->db->delete('tbl_detail_pembayaran', $arr);
	}

	public function report($start_date, $end_date) {
        $this->db->select('tbl_detail_pembayaran.*, tbl_pembayaran.*');
		$this->db->join('tbl_detail_pembayaran', 'tbl_detail_pembayaran.invoice = tbl_pembayaran.invoice');
        $this->db->from('tbl_pembayaran');
        $this->db->where('tanggal >=', $start_date);
        $this->db->where('tanggal <=', $end_date);
        $response = $this->db->get();
        return $response;
    }
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */