<?php
	
	class Model_login extends CI_Model {
		
		function __construct()
		{
			parent::__construct();
		}
		
		function login($username, $password)
		{
            $this->load->database();
			
			$this -> db -> from('ref_user');
			$this -> db -> where('username', $username);
			$str = do_hash($password, 'md5');
			$this -> db -> where('password', $str);
			$this -> db -> where('active', 1);
			$this -> db -> limit(1);
			
			$query = $this -> db -> get();
			
			if($query -> num_rows() == 1)
			{
				
				$result = $query->result();
				
				return $result;
			}
			else
			{
				return false;
			}
		}
		
	}
?>