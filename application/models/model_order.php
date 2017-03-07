<?php
	//File products_model.php
	class Model_order extends CI_Model  {
	
	function getAllorder($status) 
	{
		$this->db->select('a.id_order, a.eta, a.pay, a.note, b.nm_supplier, d.nm_client, c.nm_user, a.ppn, a.methodpay, a.delivery, a.waranty, a.reference, a.cdate');
		$this->db->from("tr_order a");
		$this->db->join("ref_supplier b","a.id_supplier = b.id_supplier","left");
		$this->db->join("ref_client d","a.id_client = d.id_client","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('a.status', $status); 
		return $this->db->get();
	}

	function getAllorderdetail($id_order, $stat) 
	{
		//select semua data yang ada pada table
		$this->db->select('a.id_order, a.id_order_detail, a.kd_barang, a.qty, a.price, a.discount, c.nm_user,  b.nm_barang, d.nm_uom, a.cdate');
		$this->db->from("tr_order_detail a");
		$this->db->join("ref_barang b","a.kd_barang = b.kd_barang","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->join("ref_uom d","b.id_uom = d.id_uom","left");
		$this->db->join("tr_order e","a.id_order = e.id_order","left");
		$this->db->where('a.id_order', $id_order);
		if($stat != 2){
		$this->db->where('e.editstat', $stat);
		}
		return $this->db->get();
	}
	
	function getAllorderdetailselect($id_order_detail) 
	{
		//select semua data yang ada pada table
		//$this->db->select('a.id_order, a.note, b.nm_supplier, c.nm_user, a.cdate');
		$this->db->from("tr_order_detail a");
		$this->db->where('a.id_order_detail', $id_order_detail); 
		return $this->db->get();
	}


	function combobox_supplier()
	{
		$this->db->from("ref_supplier");
		return $this->db->get();
	}

	function combobox_client()
	{
		$this->db->from("ref_client");
		return $this->db->get();
	}
	
	function combobox_barang()
	{
		$this->db->from("ref_barang");
		return $this->db->get();
	}

    function Insertorder($data) 
    {
    	$this->db->insert('tr_order', $data);
		$return = $this->db->insert_id();
		return $return;
    }

    function Insertorderdetail($data) 
    {
    	$this->db->insert('tr_order_detail', $data);
    }

    function Deleteorder($id_order) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_order', $id_order);
		$this->db->delete('tr_order');
	}

	function Deleteorderdetail($id_order_detail) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_order_detail', $id_order_detail);
		$this->db->delete('tr_order_detail');
	}
	
	function getAllorderselect($id_order) 
	{
		//select semua data yang ada pada table
		$this->db->from("tr_order");
		$this->db->where('id_order', $id_order); 
		return $this->db->get();
	}

	function getAllorderrpt($id_order) 
	{
		//select semua data yang ada pada table
		$this->db->select('a.id_order, a.note, b.nm_supplier, c.nm_user, a.cdate, b.tlp_supplier, b.pic_supplier, b.addr_supplier, a.ppn, a.eta, a.methodpay, a.delivery, a.waranty, a.reference	');
		$this->db->from("tr_order a");
		$this->db->join("ref_supplier b","a.id_supplier = b.id_supplier","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('a.id_order', $id_order); 
		return $this->db->get();
	}
	 function Updateorder($id_order, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_order', $id_order);
		$this->db->update('tr_order', $data);
	}
	
	function Updateorderdetail($id_order_detail, $data) 
	{
		
		$this->db->where('id_order_detail', $id_order_detail);
		$this->db->update('tr_order_detail', $data);
	}
} 