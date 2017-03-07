<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class so extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_so");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_client'] = $this->model_so->combobox_client();
		$data['listso'] = $this->model_so->getAllso(1);
		$this->load->view('so/index', $data);
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
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_client'] = $this->model_so->combobox_client();
		$data['listso'] = $this->model_so->getAllso(2);
		$this->load->view('so/index_list', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	public function detail($id_so)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        $data['id_so'] = $id_so;
		$this->load->model("model_outbound");
        $data['combobox_barang'] = $this->model_so->combobox_barang();
		$data['listsodetail'] = $this->model_so->getAllsodetail($id_so);
		$this->load->view('so/detail', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	public function detail_list($id_so)
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        $data['id_so'] = $id_so;
		$this->load->model("model_outbound");
        $data['combobox_barang'] = $this->model_so->combobox_barang();
		$data['listsodetail'] = $this->model_so->getAllsodetail($id_so);
		$this->load->view('so/detail_list', $data);
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
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_client');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		'id_client' => $this->input->post ('id_client'),
		'etd' => $this->input->post ('etd'),
		'ppn' => $this->input->post ('ppn'),
		'no_po' => $this->input->post ('no_po'),
		'pay' => $this->input->post ('pay'),
		'methodpay' => $this->input->post ('methodpay'),
		'note' => $this->input->post ('note'),
		
   		'status' => 1,
   		'cuser' => $session['id_user']
   		
		);	
		$id_ret = $this->model_so->Insertso($data);
		redirect('so/detail/'.$id_ret);
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
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_so');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		
		'id_so' => $this->input->post ('id_so'),
		'kd_barang' => $this->input->post ('kd_barang'),
		'qty' => $this->input->post ('qty'),
		'price' => $this->input->post ('price'),
		
   		'status' => 1,
   		'cuser' => $session['id_user']
   		
		);	
		$this->model_so->Insertsodetail($data);
		redirect('so/detail/'.$a);
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($id_so) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_so->Deleteso($id_so);
		redirect('so');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Deletedetail($id_so_detail, $id_so) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_so->Deletesodetail($id_so_detail);
		redirect('so/detail/'. $id_so);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_so) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_client'] = $this->model_so->combobox_client();
		$data['listsoselect'] = $this->model_so->getAllsoselect($id_so);
		$this->load->view('so/update', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdatedetail($id_so_detail) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_barang'] = $this->model_so->combobox_barang();
		$data['listsoselect'] = $this->model_so->getAllsodetailselect($id_so_detail);
		$this->load->view('so/update_detail', $data);
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
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_so');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_so = $this->input->post ('id_so');
		$data = array(
		'id_client' => $this->input->post ('id_client'),
		'etd' => $this->input->post ('etd'),
		'ppn' => $this->input->post ('ppn'),
		'no_po' => $this->input->post ('no_po'),
		'pay' => $this->input->post ('pay'),
		'methodpay' => $this->input->post ('methodpay'),
		'note' => $this->input->post ('note'),	
		);	
		$this->model_so->Updateso($id_so, $data);
		redirect('so');
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
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_so');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_so_detail = $this->input->post ('id_so_detail');
		$id_so = $this->input->post ('id_so');
		$data = array(
		'kd_barang' => $this->input->post ('kd_barang'),
		'price' => $this->input->post ('price'),
		
		'qty' => $this->input->post ('qty'),
   			
		);	
		$this->model_so->Updatesodetail($id_so_detail, $data);
		redirect('so/Detail/'.$id_so);
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function send($id_so) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $id_so;
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		
		$data = array(
		
   		'status' => 2,
   		'suser' => $session['id_user']		
		);	
		$this->model_so->Updateso($id_so, $data);
		redirect('so');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function printso($id_so) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "T08";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['id_so'] = $id_so;
		$data['listsoselect'] = $this->model_so->getAllsorpt($id_so);
		$data['listsodetail'] = $this->model_so->getAllsodetail($id_so);
		$this->load->view('so/printso', $data);
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
} 