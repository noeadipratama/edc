<?php
	//File products_model.php
	class Model_level extends CI_Model  {
	

	function getAlllevel() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_level");
	 
		return $this->db->get();
	}

    function Insertlevel($data) 
    {
    	$this->db->insert('ref_level', $data);
    }

     function Deletetlevel($id_level) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_level', $id_level);
		$this->db->delete('ref_level');
	}
	
	function getAlllevelselect($id_level) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_level");
	
		$this->db->where('id_level', $id_level); 
		return $this->db->get();
	}

	 function Updatelevel($id_level, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_level', $id_level);
		$this->db->update('ref_level', $data);
	}
}