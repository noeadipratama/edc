<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class order extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_order");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_supplier'] = $this->model_order->combobox_supplier();
		$data['combobox_client'] = $this->model_order->combobox_client();
		$data['listorder'] = $this->model_order->getAllorder(1);
		$this->load->view('order/index', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	public function lists()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T06";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_supplier'] = $this->model_order->combobox_supplier();
		$data['listorder'] = $this->model_order->getAllorder(2);
		$this->load->view('order/index_list', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	public function detail($id_order)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        $data['id_order'] = $id_order;
		$this->load->model("model_outbound");
        $data['combobox_barang'] = $this->model_order->combobox_barang();
		$data['listorderdetail'] = $this->model_order->getAllorderdetail($id_order, 0);
		$this->load->view('order/detail', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	public function detail_list($id_order)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T06";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        $data['id_order'] = $id_order;
		$this->load->model("model_outbound");
        $data['combobox_barang'] = $this->model_order->combobox_barang();
		$data['listorderdetail'] = $this->model_order->getAllorderdetail($id_order, 1);
		$this->load->view('order/detail_list', $data);
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
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_supplier');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		'ppn' => $this->input->post ('ppn'),
		'eta' => $this->input->post ('eta'),
		'pay' => $this->input->post ('pay'),
		'methodpay' => $this->input->post ('methodpay'),
		'delivery' => $this->input->post ('delivery'),
		'waranty' => $this->input->post ('waranty'),
		'reference' => $this->input->post ('reference'),
		'note' => $this->input->post ('note'),
		'id_supplier' => $this->input->post ('id_supplier'),
		'id_client' => $this->input->post ('id_client'),
   		'status' => 1,
   		'cuser' => $session['id_user']
   		
		);	
		$id_ret = $this->model_order->Insertorder($data);
		redirect('order/detail/'.$id_ret);
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
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_order');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		
		'id_order' => $this->input->post ('id_order'),
		'kd_barang' => $this->input->post ('kd_barang'),
		'qty' => $this->input->post ('qty'),
		'price' => $this->input->post ('price'),
		'discount' => $this->input->post ('discount'),
   		'status' => 1,
   		'cuser' => $session['id_user']
   		
		);	
		$this->model_order->Insertorderdetail($data);
		redirect('order/detail/'.$a);
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($id_order) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_order->Deleteorder($id_order);
		redirect('order');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Deletedetail($id_order_detail, $id_order) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_order->Deleteorderdetail($id_order_detail);
		redirect('order/detail/'. $id_order);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_order) 
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
        $data['combobox_client'] = $this->model_order->combobox_client();
        $data['combobox_supplier'] = $this->model_order->combobox_supplier();
		$data['listorderselect'] = $this->model_order->getAllorderselect($id_order);
		$this->load->view('order/update', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdatedetail($id_order_detail) 
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
        
        $data['combobox_barang'] = $this->model_order->combobox_barang();
		$data['listorderselect'] = $this->model_order->getAllorderdetailselect($id_order_detail);
		$this->load->view('order/update_detail', $data);
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
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_order');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_order = $this->input->post ('id_order');
		$data = array(
		'ppn' => $this->input->post ('ppn'),
		'eta' => $this->input->post ('eta'),
		'pay' => $this->input->post ('pay'),
		'methodpay' => $this->input->post ('methodpay'),
		'delivery' => $this->input->post ('delivery'),
		'waranty' => $this->input->post ('waranty'),
		'reference' => $this->input->post ('reference'),
		'note' => $this->input->post ('note'),
		'id_supplier' => $this->input->post ('id_supplier'),
		'id_client' => $this->input->post ('id_client'),
   		'status' => 1,
   		'cuser' => $session['id_user']		
		);	
		$this->model_order->Updateorder($id_order, $data);
		redirect('order');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function Updatedetail() 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_order');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_order_detail = $this->input->post ('id_order_detail');
		$id_order = $this->input->post ('id_order');
		$data = array(
		'kd_barang' => $this->input->post ('kd_barang'),
		'price' => $this->input->post ('price'),
		'discount' => $this->input->post ('discount'),
		'qty' => $this->input->post ('qty'),
   			
		);	
		$this->model_order->Updateorderdetail($id_order_detail, $data);
		redirect('order/Detail/'.$id_order);
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function send($id_order) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $id_order;
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		
		$data = array(
		
   		'status' => 2,
		'editstat' => 1,
   		'suser' => $session['id_user']		
		);	
		$this->model_order->Updateorder($id_order, $data);
		redirect('order');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function printorder($id_order) 
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
		$data['listorderselect'] = $this->model_order->getAllorderrpt($id_order);
		$data['listorderdetail'] = $this->model_order->getAllorderdetail($id_order, 2);
		$this->load->view('order/printorder', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
} 