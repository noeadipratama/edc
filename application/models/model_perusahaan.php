<?php
	//File products_model.php
	class Model_perusahaan extends CI_Model  {
	

	function getAllperusahaan() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_perusahaan");
	 
		return $this->db->get();
	}

    function Insertperusahaan($data) 
    {
    	$this->db->insert('ref_perusahaan', $data);
    }

     function Deletetperusahaan($id_perusahaan) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->delete('ref_perusahaan');
	}
	
	function getAllperusahaanselect($id_perusahaan) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_perusahaan");
	
		$this->db->where('id_perusahaan', $id_perusahaan); 
		return $this->db->get();
	}

	 function Updateperusahaan($id_perusahaan, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_perusahaan', $id_perusahaan);
		$this->db->update('ref_perusahaan', $data);
	}
}