<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class penyaluran extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_penyaluran");
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
		$data['listpenyaluran'] = $this->model_penyaluran->getAllpenyaluran();
		$this->load->view('penyaluran/index', $data);
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
        $a = $this->input->post ('nm_penyaluran');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		'no_penyaluran' => $this->input->post ('no_penyaluran'),
		'no_rekening' => $this->input->post ('no_rekening'),
		'no_ktp' => $this->input->post ('no_ktp'),
   		'nm_penyaluran' => $this->input->post ('nm_penyaluran'),
   		'tgl_lahir_penyaluran' => $this->input->post ('tgl_lahir_penyaluran'),
   		'alamat_penyaluran' => $this->input->post ('alamat_penyaluran'),
   		'no_tlp' => $this->input->post ('no_tlp')	
		);	
		$this->model_penyaluran->Insertpenyaluran($data);

		redirect('penyaluran');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($no_penyaluran) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "M05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_penyaluran->Deletetpenyaluran($no_penyaluran);
		redirect('penyaluran');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($no_penyaluran) 
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
		$data['listpenyaluranselect'] = $this->model_penyaluran->getAllpenyaluranselect($no_penyaluran);
		$this->load->view('penyaluran/update', $data);
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
        $a = $this->input->post ('nm_penyaluran');
        if (empty($a)){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$no_penyaluran = $this->input->post ('no_penyaluran');
		$data = array(
		
		'no_rekening' => $this->input->post ('no_rekening'),
		'no_ktp' => $this->input->post ('no_ktp'),
   		'nm_penyaluran' => $this->input->post ('nm_penyaluran'),
   		'tgl_lahir_penyaluran' => $this->input->post ('tgl_lahir_penyaluran'),
   		'alamat_penyaluran' => $this->input->post ('alamat_penyaluran'),
   		'no_tlp' => $this->input->post ('no_tlp')		
		);	
		$this->model_penyaluran->Updatepenyaluran($no_penyaluran, $data);
		redirect('penyaluran');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
}