<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {
	
	 function __construct(){
        parent::__construct();
        $this->load->model("model_user");
        $this->load->model("model_menu");

       
        
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }
	public function index()
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "S05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		
		$data['combobox_atasan'] = $this->model_user->combobox_atasan();
		$data['combobox_level'] = $this->model_user->combobox_level();
		$data['combobox_cabang'] = $this->model_user->combobox_cabang();
		$data['combobox_perusahaan'] = $this->model_user->combobox_perusahaan();
		$data['listuser'] = $this->model_user->getAllUser();
		$this->load->view('user/index', $data);
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
		$menu_kd_menu_details = "S05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        
        $b = $this->input->post ('nm_user');
        $c = $this->input->post ('username');
        $d = $this->input->post ('password');
        if ((empty($b)or (empty($c)or (empty($d))))){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table

		$data = array(
		
<<<<<<< HEAD
   		
=======
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
   		'nm_user' => $this->input->post ('nm_user'),
   		'username' => $this->input->post ('username'),
   		'password' => do_hash($this->input->post ('password'), 'md5'),
   		'id_level' => $this->input->post ('id_level'),
   		'id_atasan' => $this->input->post ('id_atasan'),
   		'id_cabang' => $this->input->post ('id_cabang'),
   		'id_perusahaan' => $this->input->post ('id_perusahaan'),
   		'active' => $this->input->post ('active')	
		);	
		$this->model_user->InsertUser($data);

		redirect('user');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	

	Public function Delete($id_user) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "S05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_user->DeletetUser($id_user);
		redirect('user');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_user) 
	{
		if($this->session->userdata('login'))
        {
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "S05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['combobox_atasan'] = $this->model_user->combobox_atasan();
		$data['combobox_level'] = $this->model_user->combobox_level();
		$data['combobox_cabang'] = $this->model_user->combobox_cabang();
		$data['combobox_perusahaan'] = $this->model_user->combobox_perusahaan();
		$data['listuserselect'] = $this->model_user->getAllUserselect($id_user);
		$this->load->view('user/update', $data);
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
		$menu_kd_menu_details = "S05";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $a = $this->input->post ('id_user');
        $b = $this->input->post ('nm_user');
        $c = $this->input->post ('username');
        $d = $this->input->post ('password');
        if (empty($a) or empty($b) or empty($c) ){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_user = $this->input->post ('id_user');
		if(empty($d)){
		$data = array(
<<<<<<< HEAD
	
=======
		
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
   		'nm_user' => $this->input->post ('nm_user'),
   		'username' => $this->input->post ('username'),
   		'id_level' => $this->input->post ('id_level'),
   		'id_atasan' => $this->input->post ('id_atasan'),
   		'id_cabang' => $this->input->post ('id_cabang'),
<<<<<<< HEAD
   		
=======
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
   		'id_perusahaan' => $this->input->post ('id_perusahaan'),
   		'active' => $this->input->post ('active')	
		);

		} else {
		$data = array(
		
   		'nm_user' => $this->input->post ('nm_user'),
   		'username' => $this->input->post ('username'),
   		'password' => do_hash($this->input->post ('password'), 'md5'),
   		'id_level' => $this->input->post ('id_level'),
   		'id_atasan' => $this->input->post ('id_atasan'),
   		'id_cabang' => $this->input->post ('id_cabang'),
<<<<<<< HEAD
   		
=======
>>>>>>> bfcce828bb17041a2e0fcf450e0b00b79ae7835c
   		'id_perusahaan' => $this->input->post ('id_perusahaan'),
   		'active' => $this->input->post ('active')	
		);	}
		$this->model_user->UpdateUser($id_user, $data);
		redirect('user');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}


}