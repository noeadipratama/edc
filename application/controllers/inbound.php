<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Inbound extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_inbound");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_supplier'] = $this->model_inbound->combobox_supplier();
        $data['combobox_warehouse'] = $this->model_inbound->combobox_warehouse();
		$data['listinbound'] = $this->model_inbound->getAllinbound(1);
		$this->load->view('inbound/index', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	public function grn()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T07";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_supplier'] = $this->model_inbound->combobox_supplier();
        $data['combobox_warehouse'] = $this->model_inbound->combobox_warehouse();
		$data['listinbound'] = $this->model_inbound->getAllinbound(2);
		$this->load->view('inbound/index_grn', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	public function detail($id_inbound)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        $data['id_inbound'] = $id_inbound;
        $data['combobox_barang'] = $this->model_inbound->combobox_barang();
        $data['combobox_location'] = $this->model_inbound->combobox_location();
		$data['listinbounddetail'] = $this->model_inbound->getAllinbounddetail($id_inbound);
		$this->load->view('inbound/detail', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	public function detail_grn($id_inbound)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T07";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        $data['id_inbound'] = $id_inbound;
        $data['combobox_barang'] = $this->model_inbound->combobox_barang();
        $data['combobox_location'] = $this->model_inbound->combobox_location();
		$data['listinbounddetail'] = $this->model_inbound->getAllinbounddetail($id_inbound);
		$this->load->view('inbound/detail_grn', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function Insert() 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_supplier');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		
		'ext_no' => $this->input->post ('ext_no'),
		'id_order' => $this->input->post ('id_order'),
		'id_supplier' => $this->input->post ('id_supplier'),
		'id_warehouse' => $this->input->post ('id_warehouse'),
   		'status' => 1,
   		'type_inbound' => 1,
   		'cuser' => $session['id_user']	
   		
		);	
		$this->model_inbound->Insertinbound($data);
		redirect('inbound');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Insertdetail() 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_inbound');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		
		'id_inbound' => $this->input->post ('id_inbound'),
		'kd_barang' => $this->input->post ('kd_barang'),
		'qty' => $this->input->post ('qty'),
		'price' => $this->input->post ('price'),
		'id_location' => $this->input->post ('id_location'),
   		'status' => 1,
   		'cuser' => $session['id_user']
   		
		);	
		$this->model_inbound->Insertinbounddetail($data);
		redirect('inbound/detail/'.$a);
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($id_inbound) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_inbound->Deleteinbound($id_inbound);
		redirect('inbound');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Deletedetail($id_inbound_detail, $id_inbound) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_inbound->Deleteinbounddetail($id_inbound_detail);
		redirect('inbound/detail/'.$id_inbound);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_inbound) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        $data['combobox_warehouse'] = $this->model_inbound->combobox_warehouse();
        $data['combobox_supplier'] = $this->model_inbound->combobox_supplier();
		$data['listinboundselect'] = $this->model_inbound->getAllinboundselect($id_inbound);
		$this->load->view('inbound/update', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Update() 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_inbound');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_inbound = $this->input->post ('id_inbound');
		$data = array(
		'ext_no' => $this->input->post ('ext_no'),
		'id_order' => $this->input->post ('id_order'),
		'id_supplier' => $this->input->post ('id_supplier'),
		'id_warehouse' => $this->input->post ('id_warehouse'),
   		'status' => 1,
   		'type_inbound' => 1,
   		'cuser' => $session['id_user']		
		);	
		$this->model_inbound->Updateinbound($id_inbound, $data);
		redirect('inbound');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Send($id_inbound) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T02";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $id_inbound;
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		
		$data = array(
		
   		'status' => 2,
   		'suser' => $session['id_user']
   				
		);	
		$this->model_inbound->Updateinbound($id_inbound, $data);
		redirect('inbound');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function printgrn($id_inbound) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['id_order'] = $id_order;
		$data['listorderselect'] = $this->model_inbound->getAllorderrpt($id_inbound);
		$data['listorderdetail'] = $this->model_inbound->getAllinbounddetail($id_inbound);
		$this->load->view('inbound/printgrn', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
} 