<?php
	//File products_model.php
	class Model_outbound extends CI_Model  {
	
	function getAlloutbound($status) 
	{
		$this->db->select("a.id_outbound, a.no_po, a.id_so, a.note, a.no_do, a.id_client, a.type, a.status, a.cdate, a.cuser, a.sdate, a.suser, c.nm_user, b.nm_client");
		$this->db->from("tr_outbound a");
		$this->db->join("ref_client b","a.id_client = b.id_client","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('a.status', $status);
		return $this->db->get();
	}
	
	function getoutbound($id_outbound) 
	{
		$this->db->select("a.id_outbound, a.id_so, a.note, a.no_po, a.no_do, a.id_client, a.type, a.status, a.cdate, a.cuser, a.sdate, a.suser, c.nm_user, b.nm_client, b.addr_client, b.tlp_client");
		$this->db->from("tr_outbound a");
		$this->db->join("ref_client b","a.id_client = b.id_client","left");
		$this->db->join("ref_user c","a.cuser = c.id_user","left");
		$this->db->where('id_outbound', $id_outbound);
		return $this->db->get();
	}

	function getAlloutbounddetail($id_outbound) 
	{
		
		$this->db->from("tr_outbound_detail a");
		$this->db->join("ref_barang b","a.kd_barang = b.kd_barang","left");
		$this->db->join("ref_user e","a.cuser = e.id_user","left");
		$this->db->join("ref_uom d","b.id_uom = d.id_uom","left");
		$this->db->where('id_outbound', $id_outbound);
		return $this->db->get();
	}
	


	function getAlloutboundallocation($id_outbound_detail) 
	{
		
		$this->db->from("tr_outbound_allocation a");
		$this->db->join("ref_barang b","a.kd_barang = b.kd_barang","left");
		
		$this->db->join("ref_uom d","b.id_uom = d.id_uom","left");
		$this->db->join("ref_location c","a.id_location = c.id_location","left");
		$this->db->where('id_outbound_detail', $id_outbound_detail);
		return $this->db->get();
	}

	function getstock($kd_barang)
	{
        $this->load->database();
        $this->db->select_sum('qty');
        $this->db->from('tr_stock');
		$this->db->where('kd_barang', $kd_barang);

		$query = $this->db->get();
			
		if($query -> num_rows() == 1)
		{
			$result = $query->row_array();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function getallocationprocedure($id) {
        $sql = "CALL p_stock_aloc_exe(?);";
      	$parameters = array($id);
        $query = $this->db->query($sql, $parameters);
		return $query->result();
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

    function Insertoutbound($data) 
    {
    	$this->db->insert('tr_outbound', $data);
    }

    function Insertoutbounddetail($data) 
    {
    	$this->db->insert('tr_outbound_detail', $data);
    }


    function Deleteoutbound($id_outbound) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_outbound', $id_outbound);
		$this->db->delete('tr_outbound');
	}

	function Deleteoutbounddetail($id_outbound_detail) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_outbound_detail', $id_outbound_detail);
		$this->db->delete('tr_outbound_detail');
	}

	function Deleteoutboundallocation($id_outbound_allocation) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_outbound_allocation', $id_outbound_allocation);
		$this->db->delete('tr_outbound_allocation');
	}
	
	function getAlloutboundselect($id_outbound) 
	{
		//select semua data yang ada pada table
		$this->db->from("tr_outbound");
		$this->db->where('id_outbound', $id_outbound); 
		return $this->db->get();
	}

	 function Updateoutbound($id_outbound, $data) 
	{
		//delete data yang ada pada table	
		$this->db->where('id_outbound', $id_outbound);
		$this->db->update('tr_outbound', $data);
	}
} 