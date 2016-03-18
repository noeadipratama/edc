<?php
	//File products_model.php
	class Model_kota extends CI_Model  {
	
	function getAllkota() 
	{
		$this->db->from("ref_kota a");
	
		return $this->db->get();
	}

	
    function Insertkota($data) 
    {
    	$this->db->insert('ref_kota', $data);
    }

    function Deletekota($id_kota) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_kota', $id_kota);
		$this->db->delete('ref_kota');
	}
	
	function getAllkotaselect($id_kota) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_kota");
		$this->db->where('id_kota', $id_kota); 
		return $this->db->get();
	}

	 function Updatekota($id_kota, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_kota', $id_kota);
		$this->db->update('ref_kota', $data);
	}
}