<?php
	//File products_model.php
	class Model_location extends CI_Model  {
	
	function getAlllocation() 
	{
		//$this->db->select('a.id_location, a.nm_location, b.nm_warehouse, a.status');
		$this->db->from("ref_location a");
		$this->db->join("ref_warehouse b","a.id_warehouse = b.id_warehouse","left");
		return $this->db->get();
	}

	function combobox_warehouse()
	{
		$this->db->from("ref_warehouse");
		return $this->db->get();
	}

    function Insertlocation($data) 
    {
    	$this->db->insert('ref_location', $data);
    }

    function Deletelocation($id_location) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_location', $id_location);
		$this->db->delete('ref_location');
	}
	
	function getAlllocationselect($id_location) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_location");
		$this->db->where('id_location', $id_location); 
		return $this->db->get();
	}

	 function Updatelocation($id_location, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_location', $id_location);
		$this->db->update('ref_location', $data);
	}
} 