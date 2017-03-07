<?php
	//File products_model.php
	class Model_department extends CI_Model  {
	
	function getAlldepartment() 
	{
		//$this->db->select('a.id_department, a.nm_department, b.nm_perusahaan, a.status');
		$this->db->from("ref_department a");
		$this->db->join("ref_perusahaan b","a.id_perusahaan = b.id_perusahaan","left");
		return $this->db->get();
	}

	function combobox_perusahaan()
	{
		$this->db->from("ref_perusahaan");
		return $this->db->get();
	}

    function Insertdepartment($data) 
    {
    	$this->db->insert('ref_department', $data);
    }

    function Deletedepartment($id_department) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_department', $id_department);
		$this->db->delete('ref_department');
	}
	
	function getAlldepartmentselect($id_department) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_department");
		$this->db->where('id_department', $id_department); 
		return $this->db->get();
	}

	 function Updatedepartment($id_department, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_department', $id_department);
		$this->db->update('ref_department', $data);
	}
} 