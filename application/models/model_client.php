<?php
	//File products_model.php
	class Model_client extends CI_Model  {
	
	function getAllclient() 
	{
		//$this->db->select('a.id_client, a.nm_client, b.nm_kota, a.status');
		$this->db->from("ref_client a");
		
		return $this->db->get();
	}

	

    function Insertclient($data) 
    {
    	$this->db->insert('ref_client', $data);
    }

    function Deleteclient($id_client) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_client', $id_client);
		$this->db->delete('ref_client');
	}
	
	function getAllclientselect($id_client) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_client");
		$this->db->where('id_client', $id_client); 
		return $this->db->get();
	}

	 function Updateclient($id_client, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_client', $id_client);
		$this->db->update('ref_client', $data);
	}
} 