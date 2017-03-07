<?php
	//File products_model.php
	class Model_user extends CI_Model  {


	function getAllUser() 
	{
		//Variable pendukung query	
		$this->db->select('a.id_user, a.nm_user, a.username, a.password, b.nm_level , c.nm_perusahaan, d.nm_cabang, e.nm_user as nm_atasan, a.active');
		$this->db->from('ref_user a');
		$this->db->join('ref_level b','a.id_level = b.id_level','left');
		$this->db->join('ref_perusahaan c','a.id_perusahaan = c.id_perusahaan','left');
		$this->db->join('ref_cabang d','a.id_cabang = d.id_cabang','left');
		$this->db->join('ref_user e','a.id_atasan = e.id_user','left');
		//select semua data yang ada pada table
		
	 
		return $this->db->get();
	}

	function combobox_atasan() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_user");
		//$this->db->where("id_user !=", $id_user);
	 
		return $this->db->get();
	}


	function combobox_level() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_level");
	 
		return $this->db->get();
	}

<<<<<<< HEAD
	

=======
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
	function combobox_cabang() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_cabang");
	 
		return $this->db->get();
	}

	function combobox_perusahaan() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_perusahaan");
	 
		return $this->db->get();
	}


    function InsertUser($data) 
    {
    	$this->db->insert('ref_user', $data);
    }

	
	
     function DeletetUser($id_user) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_user', $id_user);
		$this->db->delete('ref_user');
	}
	
	function getAllUserselect($id_user) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_user");
	
		$this->db->where('id_user', $id_user); 
		return $this->db->get();
	}

	 function UpdateUser($id_user, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_user', $id_user);
		$this->db->update('ref_user', $data);
	}


}
