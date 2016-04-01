<?php
	//File products_model.php
	class Model_menu_groups extends CI_Model  {
	

	function getAllmenu_groups() 
	{
		
		$this->db->from("ref_menu_groups");
	 
		return $this->db->get();
	}

    function Insertmenu_groups($data) 
    {
    	$this->db->insert('ref_menu_groups', $data);
    }

     function Deletetmenu_groups($id_menu_groups) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_groups', $id_menu_groups);
		$this->db->delete('ref_menu_groups');
	}
	
	function getAllmenu_groupsselect($id_menu_groups) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_groups");
	
		$this->db->where('id_menu_groups', $id_menu_groups); 
		return $this->db->get();
	}

	 function Updatemenu_groups($id_menu_groups, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_groups', $id_menu_groups);
		$this->db->update('ref_menu_groups', $data);
	}
		
	function combobox_menu_groups() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_groups");
	 
		return $this->db->get();
	}
}
