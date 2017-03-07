<?php
	//File products_model.php
	class Model_penyaluran extends CI_Model  {
	

	function getAllpenyaluran() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("tr_penyaluran");
	 
		return $this->db->get();
	}

    function Insertpenyaluran($data) 
    {
    	$this->db->insert('tr_penyaluran', $data);
    }

     function Deletetpenyaluran($no_penyaluran) 
	{
		//delete data yang ada pada table	
		$this->db->where('no_penyaluran', $no_penyaluran);
		$this->db->delete('tr_penyaluran');
	}
	
	function getAllpenyaluranselect($no_penyaluran) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("tr_penyaluran");
	
		$this->db->where('no_penyaluran', $no_penyaluran); 
		return $this->db->get();
	}

	 function Updatepenyaluran($no_penyaluran, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('no_penyaluran', $no_penyaluran);
		$this->db->update('tr_penyaluran', $data);
	}
}