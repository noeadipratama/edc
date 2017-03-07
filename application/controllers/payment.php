<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class payment extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_payment");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T10";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
  
		$data['listpayment'] = $this->model_payment->getAllpayment(2);
		$this->load->view('payment/index', $data);
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
		$menu_kd_menu_details = "T10";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        $data['id_order'] = $id_order;
        
		$data['listpaymentdetail'] = $this->model_payment->getAllpaymentdetail($id_order);
		$this->load->view('payment/detail', $data);
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
		$menu_kd_menu_details = "T10";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_supplier'] = $this->model_payment->combobox_supplier();
		$data['listpaymentselect'] = $this->model_payment->getAllpaymentselect($id_order);
		$this->load->view('payment/update', $data);
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
		$menu_kd_menu_details = "T10";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_barang'] = $this->model_payment->combobox_barang();
		$data['listpaymentselect'] = $this->model_payment->getAllpaymentdetailselect($id_order_detail);
		$this->load->view('payment/update_detail', $data);
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
		$menu_kd_menu_details = "T10";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_order');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_order = $this->input->post ('id_order');
		$data = array(
		'pnote' => $this->input->post ('pnote'),
		'pdate' => $this->input->post ('pdate'),
		'payment' => 1,
		'puser' => $session['id_user']	
   				
		);	
		$this->model_payment->Updatepayment($id_order, $data);
		redirect('payment');
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
		$menu_kd_menu_details = "T10";  //custom by database
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
		'qty' => $this->input->post ('qty'),
   			
		);	
		$this->model_payment->Updatepaymentdetail($id_order_detail, $data);
		redirect('payment/Detail/'.$id_order);
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function send($id_order, $payment) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T10";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $payment;
        if ($a == 0){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		
		$data = array(
		
   		'payment' => 2,
   		'cpuser' => $session['id_user']		
		);	
		$this->model_payment->Updatepayment($id_order, $data);
		redirect('payment');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
} 