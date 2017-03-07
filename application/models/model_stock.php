<?php
	//File products_model.php
	class Model_stock extends CI_Model  {
	
	function getAllstock($id_cabang, $id_level) 
	{
		$this->db->select("a.kd_barang, b.nm_barang, d.nm_uom, sum(a.qty) as qty, b.min_stock, a.price,");
		$this->db->select("(select f.price from tr_stock f where f.kd_barang = a.kd_barang order by f.id_stock DESC limit 1 ) as price");
		$this->db->from("tr_stock a");
		$this->db->join("ref_barang b","a.kd_barang = b.kd_barang","left");
		$this->db->join("ref_uom d","d.id_uom = b.id_uom","left");
		$this->db->join("ref_location c","a.id_location = c.id_location","left");
		$this->db->join("ref_warehouse e","c.id_warehouse = e.id_warehouse","left");
		$this->db->where('a.qty !=', 0);
		
		if ($id_level != 1){
		$this->db->where('e.id_cabang', $id_cabang);}
		//$this->db->order_by('a a.qty - b.min_stock DESC');
		$this->db->group_by('a.kd_barang','asc');
		return $this->db->get();
	}

	
} 