<?php
	//File products_model.php
	class Model_cabang extends CI_Model  {
	
	function getAllcabang() 
	{
		//$this->db->select('a.id_cabang, a.nm_cabang, b.nm_kota, a.status');
		$this->db->from("ref_cabang a");
		$this->db->join("ref_kota b","a.id_kota = b.id_kota","left");
		return $this->db->get();
	}

	function combobox_kota()
	{
		$this->db->from("ref_kota");
		return $this->db->get();
	}

    function Insertcabang($data) 
    {
    	$this->db->insert('ref_cabang', $data);
    }

    function Deletecabang($id_cabang) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_cabang', $id_cabang);
		$this->db->delete('ref_cabang');
	}
	
	function getAllcabangselect($id_cabang) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_cabang");
		$this->db->where('id_cabang', $id_cabang); 
		return $this->db->get();
	}

	 function Updatecabang($id_cabang, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_cabang', $id_cabang);
		$this->db->update('ref_cabang', $data);
	}
} 