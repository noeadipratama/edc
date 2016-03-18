<?php
	//File products_model.php
	class Model_menu_details_access extends CI_Model  {
	

	function getAllmenu_details_access() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->select('a.id_menu_details_access, c.nm_menu_details, c.id_menu_details, b.nm_level, a.id_level, a.active');
		$this->db->from('ref_menu_details_access a');
		$this->db->join('ref_level b','a.id_level = b.id_level', 'left');
		$this->db->join('ref_menu_details c','a.id_menu_details = c.id_menu_details','left');
		return $this->db->get();
	}

    function Insertmenu_details_access($data) 
    {
    	$this->db->insert('ref_menu_details_access', $data);
    }

     function Deletetmenu_details_access($id_menu_details_access) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_details_access', $id_menu_details_access);
		$this->db->delete('ref_menu_details_access');
	}
	
	function getAllmenu_details_accessselect($id_menu_details_access) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_details_access");
	
		$this->db->where('id_menu_details_access', $id_menu_details_access); 
		return $this->db->get();
	}

	 function Updatemenu_details_access($id_menu_details_access, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_details_access', $id_menu_details_access);
		$this->db->update('ref_menu_details_access', $data);
	}

	
	function combobox_menu_level() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_level");
	 
		return $this->db->get();
	}
	
	function combobox_menu_details() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_details");
	 
		return $this->db->get();
	}
	
	function tampillevel($id_level)
	{
	$this->db->from("ref_level");
	$this->db->where("id_level",$id_level);
	}
	}
