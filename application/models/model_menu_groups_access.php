<?php
	//File products_model.php
	class Model_menu_groups_access extends CI_Model  {
	

	function getAllmenu_groups_access() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->select('a.id_menu_groups_access, c.nm_menu_groups, c.id_menu_groups, b.nm_level, a.id_level, a.active');
		$this->db->from('ref_menu_groups_access a');
		$this->db->join('ref_level b','a.id_level = b.id_level', 'left');
		$this->db->join('ref_menu_groups c','a.id_menu_groups = c.id_menu_groups','left');
		return $this->db->get();
	}

    function Insertmenu_groups_access($data) 
    {
    	$this->db->insert('ref_menu_groups_access', $data);
    }

     function Deletetmenu_groups_access($id_menu_groups_access) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_groups_access', $id_menu_groups_access);
		$this->db->delete('ref_menu_groups_access');
	}
	
	function getAllmenu_groups_accessselect($id_menu_groups_access) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_groups_access");
	
		$this->db->where('id_menu_groups_access', $id_menu_groups_access); 
		return $this->db->get();
	}

	 function Updatemenu_groups_access($id_menu_groups_access, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_menu_groups_access', $id_menu_groups_access);
		$this->db->update('ref_menu_groups_access', $data);
	}

	
	function combobox_menu_level() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_level");
	 
		return $this->db->get();
	}
	
	function combobox_menu_groups() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_menu_groups");
	 
		return $this->db->get();
	}
	
	function tampillevel($id_level)
	{
	$this->db->from("ref_level");
	$this->db->where("id_level",$id_level);
	}
	}
