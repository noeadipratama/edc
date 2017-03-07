<?php
	//File products_model.php
	class Model_inbound extends CI_Model  {
	
	function getAllinbound($status) 
	{
		
		$this->db->from("tr_inbound a");
		$this->db->join("ref_supplier b","a.id_supplier = b.id_supplier","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->join("ref_warehouse d","a.id_warehouse = d.id_warehouse","left");
		$this->db->where('a.status', $status);
		return $this->db->get();
	}

	function getAllinbounddetail($id_inbound) 
	{
		
		$this->db->from("tr_inbound_detail a");
		$this->db->join("ref_barang b","a.kd_barang = b.kd_barang","left");
		$this->db->join("ref_location c","a.id_location = c.id_location","left");
		$this->db->join("ref_user e","a.cuser = e.id_user","left");
		$this->db->join("ref_uom d","b.id_uom = d.id_uom","left");
		$this->db->where('id_inbound', $id_inbound);
		return $this->db->get();
	}

	function combobox_supplier()
	{
		$this->db->from("ref_supplier");
		return $this->db->get();
	}

	function combobox_barang()
	{
		$this->db->from("ref_barang");
		return $this->db->get();
	}

	function combobox_location()
	{
		$this->db->from("ref_location");
		return $this->db->get();
	}

	function combobox_warehouse()
	{
		$this->db->from("ref_warehouse");
		return $this->db->get();
	}

    function Insertinbound($data) 
    {
    	$this->db->insert('tr_inbound', $data);
    }

    function Insertinbounddetail($data) 
    {
    	$this->db->insert('tr_inbound_detail', $data);
    }

    function Deleteinbound($id_inbound) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_inbound', $id_inbound);
		$this->db->delete('tr_inbound');
	}

	function Deleteinbounddetail($id_inbound_detail) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_inbound_detail', $id_inbound_detail);
		$this->db->delete('tr_inbound_detail');
	}
	
	function getAllinboundselect($id_inbound) 
	{
		//select semua data yang ada pada table
		$this->db->from("tr_inbound");
		$this->db->where('id_inbound', $id_inbound); 
		return $this->db->get();
	}

	 function Updateinbound($id_inbound, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_inbound', $id_inbound);
		$this->db->update('tr_inbound', $data);
	}
	
	function getAllorderrpt($id_inbound) 
	{
		//select semua data yang ada pada table
		$this->db->from("tr_inbound a");
		$this->db->join("ref_supplier b","a.id_supplier = b.id_supplier","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('a.id_inbound', $id_inbound); 
		return $this->db->get();
	}
} 