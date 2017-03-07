<?php
	//File products_model.php
	class Model_barang extends CI_Model  {
	
	function getAllbarang() 
	{
		//$this->db->select('a.id_barang, a.nm_barang, b.nm_uom, a.status');
		$this->db->from("ref_barang a");
		$this->db->join("ref_uom b","a.id_uom = b.id_uom","left");
		return $this->db->get();
	}

	function combobox_uom()
	{
		$this->db->from("ref_uom");
		return $this->db->get();
	}

    function Insertbarang($data) 
    {
    	$this->db->insert('ref_barang', $data);
    }

    function Deletebarang($id_barang) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_barang', $id_barang);
		$this->db->delete('ref_barang');
	}
	
	function getAllbarangselect($id_barang) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_barang");
		$this->db->where('id_barang', $id_barang); 
		return $this->db->get();
	}

	 function Updatebarang($id_barang, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_barang', $id_barang);
		$this->db->update('ref_barang', $data);
	}
} 