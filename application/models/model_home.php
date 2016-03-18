<?php
	//File products_model.php
	class Model_home extends CI_Model  {
	
	

	function status_resi($id_cabang)
	{
            $this->db->from('v_status_resi');
			$this->db->where('id_cabang', $id_cabang);
			$this -> db -> limit(1);
			$query = $this -> db -> get();
			if($query -> num_rows() == 1)
			{
				$result = $query->row_array();
				return $result;
			}
			else
			{
				return false;
			}
	}

	function penghasilan_cabang($id_cabang)
	{
            $this->db->from('v_penghasilan_cabang');
			$this->db->where('id_cabang', $id_cabang);
			$this -> db -> limit(1);
			$query = $this -> db -> get();
			if($query -> num_rows() == 1)
			{
				$result = $query->row_array();
				return $result;
			}
			else
			{
				return false;
			}
	}

	function UpdateUser($id_user, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_user', $id_user);
		$this->db->update('ref_user', $data);
	}

}