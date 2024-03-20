<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {

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
		
					$this->db->from('tbl_user');
		$response = $this->db->get();
		return $response;
	}

	public function insert($data){
		date_default_timezone_set('asia/jakarta');
		$arr = array(
			'username'		=> $data['username'],
			'password'		=> sha1($data['password']),
			'role'		=> $data['role'],
		);

		$response = $this->db->insert('tbl_user', $arr);
		return $response;
	}

	public function update($data){
		date_default_timezone_set('asia/jakarta');

		$response = $this->db->update('tbl_user', $data, ['id_user' => $data['id_user']]);
		return $response;
	}


	public function delete($id_user){
        $arr = array(
            'id_user' => $id_user
        );

		return $this->db->delete('tbl_user', $arr);
	}
}

/* End of file M_admin.php */
/* Location: ./application/models/M_admin.php */