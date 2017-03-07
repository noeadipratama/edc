<?php
	//File products_model.php
	class Model_report extends CI_Model  {
	

	function getalloutboundrpt($tgl_awal, $tgl_akhir) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("v_rpt_outbound a");
		$this->db->where('a.tgl >=', $tgl_awal);
		$this->db->where('a.tgl <=', $tgl_akhir);	

		return $this->db->get();
	}

	function getallinboundrpt($tgl_awal, $tgl_akhir) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("v_rpt_inbound a");
		$this->db->where('a.tgl >=', $tgl_awal);
		$this->db->where('a.tgl <=', $tgl_akhir);	

		return $this->db->get();
	}

	function getallorderrpt($tgl_awal, $tgl_akhir) 
	{
	
		//select semua data yang ada pada table
		$this->db->from("v_rpt_order a");
		$this->db->where('a.tgl >=', $tgl_awal);
		$this->db->where('a.tgl <=', $tgl_akhir);	

		return $this->db->get();
	}
	
	function getallstock() 
	{
	
		//select semua data yang ada pada table
		$this->db->select("a.id_stock, a.id_inbound_detail, a.kd_barang, a.qty,  a.price, b.nm_barang , c.nm_location, f.nm_supplier, e.id_inbound, e.ext_no, e.sdate, g.nm_uom, h.nm_user");
		$this->db->from("tr_stock a");
		$this->db->join("ref_barang b", "a.kd_barang = b.kd_barang", "left");
		$this->db->join("ref_location c", "a.id_location = c.id_location", "left");
		$this->db->join("tr_inbound_detail d", "a.id_inbound_detail = d.id_inbound_detail", "left");
		$this->db->join("tr_inbound e", "d.id_inbound = e.id_inbound", "left");
		$this->db->join("ref_supplier f", "f.id_supplier = e.id_supplier", "left");
		$this->db->join("ref_uom g", "b.id_uom = g.id_uom", "left");
		$this->db->join("ref_user h", "e.suser = h.id_user", "left");
		$this->db->where('a.qty !=', 0);	

		return $this->db->get();
	}

	
}