<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class pensiun extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_pensiun");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "M05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['listpensiun'] = $this->model_pensiun->getAllpensiun();
		$this->load->view('pensiun/index', $data);
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
		$menu_kd_menu_details = "M05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('nm_pensiun');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		'no_pensiun' => $this->input->post ('no_pensiun'),
		'no_rekening' => $this->input->post ('no_rekening'),
		'no_ktp' => $this->input->post ('no_ktp'),
   		'nm_pensiun' => $this->input->post ('nm_pensiun'),
   		'tgl_lahir_pensiun' => $this->input->post ('tgl_lahir_pensiun'),
   		'alamat_pensiun' => $this->input->post ('alamat_pensiun'),
   		'no_tlp' => $this->input->post ('no_tlp')	
		);	
		$this->model_pensiun->Insertpensiun($data);

		redirect('pensiun');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($no_pensiun) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "M05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_pensiun->Deletetpensiun($no_pensiun);
		redirect('pensiun');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($no_pensiun) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "M05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['listpensiunselect'] = $this->model_pensiun->getAllpensiunselect($no_pensiun);
		$this->load->view('pensiun/update', $data);
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
		$menu_kd_menu_details = "M05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('nm_pensiun');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$no_pensiun = $this->input->post ('no_pensiun');
		$data = array(
		
		'no_rekening' => $this->input->post ('no_rekening'),
		'no_ktp' => $this->input->post ('no_ktp'),
   		'nm_pensiun' => $this->input->post ('nm_pensiun'),
   		'tgl_lahir_pensiun' => $this->input->post ('tgl_lahir_pensiun'),
   		'alamat_pensiun' => $this->input->post ('alamat_pensiun'),
   		'no_tlp' => $this->input->post ('no_tlp')		
		);	
		$this->model_pensiun->Updatepensiun($no_pensiun, $data);
		redirect('pensiun');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
}