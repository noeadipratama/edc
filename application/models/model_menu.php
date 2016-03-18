<?php
	//File products_model.php
	class Model_menu extends CI_Model  {
	

	

	function getAllMenugroups($level) 
	{
		//Variable pendukung query	
		$active = 1;
		//select semua data yang ada pada table
		$this->db->from("ref_menu_groups_access a");
		$this->db->join('ref_menu_groups b', 'a.id_menu_groups = b.id_menu_groups', 'left');
		$this->db->where('a.id_level', $level);
		$this->db->where('a.active', $active);
		$this->db->where('b.active', $active);
		$this->db->order_by("b.position","asc");
		
		return $this->db->get();
	}

	function getAllMenudetails($id, $level) 
	{
		//Variable pendukung query	
		$active = 1;
		//select semua data yang ada pada table
		$this->db->from("ref_menu_details_access a");
		$this->db->join('ref_menu_details b', 'a.id_menu_details = b.id_menu_details', 'left');
		$this->db->where('a.id_level', $level);
		$this->db->where('a.active', $active);
		$this->db->where('b.active', $active);
		$this->db->order_by("b.position","asc");
		if($id == 0)
		{}
		else
		{ $this->db->where('b.id_menu_groups', $id); }
		return $this->db->get();
	}

	function selectaccess($id_level, $kd_menu_details)
	{
            //$this->db->select('jam');
            $this->db->from('ref_menu_details_access a');
            $this->db->join('ref_menu_details b', 'a.id_menu_details = b.id_menu_details', 'left');
			$this->db->where('a.id_level', $id_level);
			$this->db->where('b.kd_menu_details', $kd_menu_details);
			$this->db->where('a.active', 1);
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

	function selectcabang($id_cabang)
	{
            $this->db->from('ref_cabang');
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

	function selectperusahaan($id_perusahaan)
	{
            $this->db->from('ref_perusahaan');
			$this->db->where('id_perusahaan', $id_perusahaan);
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

	}
?>