<?php
	//File products_model.php
	class Model_pensiun extends CI_Model  {
	

	function getAllpensiun() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_pensiun");
	 
		return $this->db->get();
	}

    function Insertpensiun($data) 
    {
    	$this->db->insert('ref_pensiun', $data);
    }

     function Deletetpensiun($no_pensiun) 
	{
		//delete data yang ada pada table	
		$this->db->where('no_pensiun', $no_pensiun);
		$this->db->delete('ref_pensiun');
	}
	
	function getAllpensiunselect($no_pensiun) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_pensiun");
	
		$this->db->where('no_pensiun', $no_pensiun); 
		return $this->db->get();
	}

	 function Updatepensiun($no_pensiun, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('no_pensiun', $no_pensiun);
		$this->db->update('ref_pensiun', $data);
	}
}