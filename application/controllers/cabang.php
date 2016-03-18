<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cabang extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_cabang");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "M04";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		$data['id_user'] = $session['id_user'];
        $data['nm_user'] = $session['nm_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_kota'] = $this->model_cabang->combobox_kota();
		$data['listcabang'] = $this->model_cabang->getAllcabang();
		$this->load->view('cabang/index', $data);
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
		$menu_kd_menu_details = "M04";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('nm_cabang');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		
		'kd_cabang' => $this->input->post ('kd_cabang'),
		'id_kota' => $this->input->post ('id_kota'),
   		'nm_cabang' => $this->input->post ('nm_cabang'),
   		'cuser' => $session['id_user'],
   		'active' => $this->input->post ('active')	
		);	
		$this->model_cabang->Insertcabang($data);
		redirect('cabang');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($id_cabang) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "M04";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_cabang->Deletecabang($id_cabang);
		redirect('cabang');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_cabang) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "M04";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
        
        $data['combobox_kota'] = $this->model_cabang->combobox_kota();
		$data['listcabangselect'] = $this->model_cabang->getAllcabangselect($id_cabang);
		$this->load->view('cabang/update', $data);
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
		$menu_kd_menu_details = "M04";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('nm_cabang');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_cabang = $this->input->post ('id_cabang');
		$data = array(
		'kd_cabang' => $this->input->post ('kd_cabang'),
		'id_kota' => $this->input->post ('id_kota'),
   		'nm_cabang' => $this->input->post ('nm_cabang'),
   		'cuser' => $session['id_user'],
		'active' => $this->input->post ('active')		
		);	
		$this->model_cabang->Updatecabang($id_cabang, $data);
		redirect('cabang');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
} 