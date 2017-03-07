<?php
	//File products_model.php
	class Model_payment extends CI_Model  {
	
	function getAllpayment($status) 
	{
		$this->db->select('a.id_order, a.pnote, a.payment, a.ppn, a.pay, a.methodpay, a.note, a.pdate, b.nm_supplier, c.nm_user, a.cdate, (select sum(f.qty * (f.price - f.discount)) from tr_order_detail f where f.id_order = a.id_order) as totsum');
		
		$this->db->from("tr_order a");
		$this->db->join("ref_supplier b","a.id_supplier = b.id_supplier","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('a.status', $status);
		$this->db->where('a.payment <=', 1);		
		return $this->db->get();
	}

	function getAllpaymentdetail($id_order) 
	{
		//select semua data yang ada pada table
		//$this->db->select('a.id_order, a.note, b.nm_supplier, c.nm_user, a.cdate');
		$this->db->from("tr_order_detail a");
		$this->db->join("ref_barang b","a.kd_barang = b.kd_barang","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->join("ref_uom d","b.id_uom = d.id_uom","left");
		$this->db->where('a.id_order', $id_order); 
		return $this->db->get();
	}
	
	function getAllpaymentdetailselect($id_order_detail) 
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

	function combobox_barang()
	{
		$this->db->from("ref_barang");
		return $this->db->get();
	}
	
	function getAllpaymentselect($id_order) 
	{
		//select semua data yang ada pada table
		$this->db->from("tr_order");
		$this->db->where('id_order', $id_order); 
		return $this->db->get();
	}

	 function Updatepayment($id_order, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_order', $id_order);
		$this->db->update('tr_order', $data);
	}
	
	function Updatepaymentdetail($id_order_detail, $data) 
	{
		
		$this->db->where('id_order_detail', $id_order_detail);
		$this->db->update('tr_order_detail', $data);
	}
} 