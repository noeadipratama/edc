<?php
	//File products_model.php
	class Model_so extends CI_Model  {
	
	function getAllso($status) 
	{
		//$this->db->select('a.id_so, a.eta, a.note, b.nm_client, c.nm_user, a.ppn, a.methodpay, a.delivery, a.waranty, a.reference, a.cdate');
		$this->db->from("tr_so a");
		$this->db->join("ref_client b","a.id_client = b.id_client","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('a.status', $status); 
		return $this->db->get();
	}

	function getAllsodetail($id_so) 
	{
		//select semua data yang ada pada table
		$this->db->select('a.id_so,  a.id_so_detail, a.kd_barang, a.qty, a.price,  c.nm_user,  b.nm_barang, d.nm_uom, a.cdate');
		$this->db->from("tr_so_detail a");
		$this->db->join("ref_barang b","a.kd_barang = b.kd_barang","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->join("ref_uom d","b.id_uom = d.id_uom","left");
		$this->db->where('a.id_so', $id_so); 
		return $this->db->get();
	}
	
	function getAllsodetailselect($id_so_detail) 
	{
		//select semua data yang ada pada table
		//$this->db->select('a.id_so, a.note, b.nm_client, c.nm_user, a.cdate');
		$this->db->from("tr_so_detail a");
		$this->db->where('a.id_so_detail', $id_so_detail); 
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

    function Insertso($data) 
    {
    	$this->db->insert('tr_so', $data);
		$return = $this->db->insert_id();
		return $return;
    }

    function Insertsodetail($data) 
    {
    	$this->db->insert('tr_so_detail', $data);
    }

    function Deleteso($id_so) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_so', $id_so);
		$this->db->delete('tr_so');
	}

	function Deletesodetail($id_so_detail) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_so_detail', $id_so_detail);
		$this->db->delete('tr_so_detail');
	}
	
	function getAllsoselect($id_so) 
	{
		//select semua data yang ada pada table
		$this->db->from("tr_so");
		$this->db->where('id_so', $id_so); 
		return $this->db->get();
	}

	function getAllsorpt($id_so) 
	{
		//select semua data yang ada pada table
		$this->db->select('a.id_so, a.ppn, a.note, b.nm_client, c.nm_user, a.cdate, b.tlp_client, b.pic_client, b.addr_client, a.ppn, a.eta, a.methodpay, a.delivery, a.waranty, a.reference	');
		$this->db->from("tr_so a");
		$this->db->join("ref_client b","a.id_client = b.id_client","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('a.id_so', $id_so); 
		return $this->db->get();
	}
	 function Updateso($id_so, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_so', $id_so);
		$this->db->update('tr_so', $data);
	}
	
	function Updatesodetail($id_so_detail, $data) 
	{
		
		$this->db->where('id_so_detail', $id_so_detail);
		$this->db->update('tr_so_detail', $data);
	}
} 