<?php
	//File products_model.php
	class Model_supplier extends CI_Model  {
	
	function getAllsupplier() 
	{
		//$this->db->select('a.id_supplier, a.nm_supplier, b.nm_kota, a.status');
		$this->db->from("ref_supplier a");
		
		return $this->db->get();
	}

	

    function Insertsupplier($data) 
    {
    	$this->db->insert('ref_supplier', $data);
    }

    function Deletesupplier($id_supplier) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_supplier', $id_supplier);
		$this->db->delete('ref_supplier');
	}
	
	function getAllsupplierselect($id_supplier) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_supplier");
		$this->db->where('id_supplier', $id_supplier); 
		return $this->db->get();
	}

	 function Updatesupplier($id_supplier, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_supplier', $id_supplier);
		$this->db->update('ref_supplier', $data);
	}
} 