<?php
	//File products_model.php
	class Model_warehouse extends CI_Model  {
	
	function getAllwarehouse() 
	{
		//$this->db->select('a.id_warehouse, a.nm_warehouse, b.nm_kota, a.status');
		$this->db->from("ref_warehouse a");
		$this->db->join('ref_cabang d','a.id_cabang = d.id_cabang','left');
		return $this->db->get();
	}

	function combobox_cabang() 
	{
		//Variable pendukung query	
	
		//select semua data yang ada pada table
		$this->db->from("ref_cabang");
	 
		return $this->db->get();
	}

    function Insertwarehouse($data) 
    {
    	$this->db->insert('ref_warehouse', $data);
    }

    function Deletewarehouse($id_warehouse) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_warehouse', $id_warehouse);
		$this->db->delete('ref_warehouse');
	}
	
	function getAllwarehouseselect($id_warehouse) 
	{
		//select semua data yang ada pada table
		$this->db->from("ref_warehouse");
		$this->db->where('id_warehouse', $id_warehouse); 
		return $this->db->get();
	}

	 function Updatewarehouse($id_warehouse, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_warehouse', $id_warehouse);
		$this->db->update('ref_warehouse', $data);
	}
} 