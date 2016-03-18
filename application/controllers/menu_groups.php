<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu_groups extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->model("model_menu_groups");
        $this->load->model("model_menu");
        ///constructor yang dipanggil ketika memanggil ro.php untuk melakukan pemanggilan pada model : ro.php yang ada di folder models
    }

	public function index()
	{
		if($this->session->userdata('login'))
        {
		//$this->load->model("model_menu");
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "S01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['listmenu_groups'] = $this->model_menu_groups->getAllmenu_groups();
		$this->load->view('menu_groups/index', $data);
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
		$menu_kd_menu_details = "S01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){

        $a = $this->input->post ('nm_menu_groups');
        $b = $this->input->post ('position');
        if (empty($a)or (empty($b))){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		//insert semua data yang ada pada table
		$data = array(
		
   		'nm_menu_groups' => $this->input->post ('nm_menu_groups'),
		'icon' => $this->input->post ('icon'),
		'active' => $this->input->post ('active'),
		'position' => $this->input->post ('position')	
		);	
		$this->model_menu_groups->Insertmenu_groups($data);

		redirect('menu_groups');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}

	Public function Delete($id_menu_groups) 
	{
		if($this->session->userdata('login'))
        {
        $session = $this->session->userdata('login');
		$menu_kd_menu_details = "S01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
		//delete data yang ada pada table
		$this->model_menu_groups->Deletetmenu_groups($id_menu_groups);
		redirect('menu_groups');
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
	
	Public function FormUpdate($id_menu_groups) 
	{
		if($this->session->userdata('login'))
        {
		//$this->load->model("model_menu");
		$session = $this->session->userdata('login');
		$menu_kd_menu_details = "S01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){
        $data['nm_user'] = $session['nm_user'];
        $data['id_user'] = $session['id_user'];
        $data['session_level'] = $session['id_level'];
		$data['combo_menu_groups'] = $this->model_menu_groups->combobox_menu_groups();
		$data['listmenu_groupsselect'] = $this->model_menu_groups->getAllmenu_groupsselect($id_menu_groups);
		$this->load->view('menu_groups/update', $data);
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
		$menu_kd_menu_details = "S01";  //custom by database
		$access = $this->model_menu->selectaccess($session['id_level'], $menu_kd_menu_details);
        if(!empty($access['id_menu_details'])){

        $a = $this->input->post ('nm_menu_groups');
        $b = $this->input->post ('position');
        if (empty($a)or (empty($b))){
			echo "<script>alert('Data Masih Ada Yang Kosong');window.location.href='javascript:history.back(-1);'</script>";
		}else{
		$id_menu_groups = $this->input->post ('id_menu_groups');
		$data = array(
		
   		'nm_menu_groups' => $this->input->post ('nm_menu_groups'),
		'icon' => $this->input->post ('icon'),
		'active' => $this->input->post ('active'),
		'position' => $this->input->post ('position')
		);	
		$this->model_menu_groups->Updatemenu_groups($id_menu_groups, $data);
		redirect('menu_groups');
		}
		}else{
		echo "<script>alert('Anda tidak mendapatkan access menu ini');window.location.href='javascript:history.back(-1);'</script>";	
		}
		}else{
		redirect('welcome/relogin','refresh');	
		}
	}
}