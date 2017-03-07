<?php
	//File products_model.php
	class Model_bank extends CI_Model  {
	

	function getAllbank() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_bank");
	 
		return $this->db->get();
	}

    function Insertbank($data) 
    {
    	$this->db->insert('ref_bank', $data);
    }

     function Deletetbank($id_bank) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_bank', $id_bank);
		$this->db->delete('ref_bank');
	}
	
	function getAllbankselect($id_bank) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("ref_bank");
	
		$this->db->where('id_bank', $id_bank); 
		return $this->db->get();
	}

	 function Updatebank($id_bank, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_bank', $id_bank);
		$this->db->update('ref_bank', $data);
	}
}