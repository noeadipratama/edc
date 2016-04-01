<?php
	//File products_model.php
	class Model_menu_details extends CI_Model  {
	

	function getAllmenu_details() 
	{
		//Variable pendukung query	
		$this->db->select('a.id_menu_details, a.kd_menu_details, a.nm_menu_details, a.url, a.position, c.nm_menu_groups as nm_groups, c.id_menu_groups, a.active');
		$this->db->from('ref_menu_details a');
		$this->db->join('ref_menu_groups c','a.id_menu_groups = c.id_menu_groups');
		$this->db->order_by("id_menu_groups", "asc");
		$this->db->order_by("id_menu_details", "asc"); 
		$this->db->order_by("position", "asc");  
		
		//select semua data yang ada pada table
		
	 
		return $this->db->get();
	}

    function Insertmenu_details($data) 
    {
    	$this->db->insert('ref_menu_details', $data);
    }

     function Deletetmenu_details($id_menu_details) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_details', $id_menu_details);
		$this->db->delete('ref_menu_details');
	}
	
	function getAllmenu_detailsselect($id_menu_details) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_details");
	
		$this->db->where('id_menu_details', $id_menu_details); 
		return $this->db->get();
	}

	 function Updatemenu_details($id_menu_details, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_details', $id_menu_details);
		$this->db->update('ref_menu_details', $data);
	}
	
	function combobox_menu_groups() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_groups");
	 
		return $this->db->get();
	}
}
