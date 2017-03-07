<?php
	//File products_model.php
	class Model_uom extends CI_Model  {
	
	function getAlluom() 
	{
		//$this->db->select('a.id_uom, a.nm_uom, b.nm_kota, a.status');
		$this->db->from("ref_uom a");
	
		return $this->db->get();
	}



    function Insertuom($data) 
    {
    	$this->db->insert('ref_uom', $data);
    }

    function Deleteuom($id_uom) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_uom', $id_uom);
		$this->db->delete('ref_uom');
	}
	
	function getAlluomselect($id_uom) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_uom");
		$this->db->where('id_uom', $id_uom); 
		return $this->db->get();
	}

	 function Updateuom($id_uom, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_uom', $id_uom);
		$this->db->update('ref_uom', $data);
	}
} 